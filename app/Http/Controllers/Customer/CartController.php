<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequest;
use App\Jobs\WhatsappJob;
use App\Models\Cart;
use App\Services\CartService;
use App\Services\CekOngkirSerivce;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Str;

class CartController extends Controller
{
    protected $cartService;
    protected $cekOngkirService;

    public function __construct(CartService $cartService, CekOngkirSerivce $cekOngkirService){
        $this->cartService = $cartService;
        $this->cekOngkirService = $cekOngkirService;
    }


    public function index(){
        $carts = $this->cartService->getCartByUserLogin();
        return view('web.customer.cart.index', ['carts' => $carts]);
    }

    public function store(CartRequest $request){
        $data = $request->all();
        // dd($data);
        DB::beginTransaction();
        try {
            $result = $this->cartService->addProductToCart($data);
            DB::commit();

            if($result == true){
                 return redirect()->back()->with('success','Product ditambahkan ke keranjang');
            } else{  return redirect()->back()->with('success','Product sudah berada di keranjang'); }

        } catch (\Exception $th) {
           DB::rollBack();
           return redirect()->back()->with('error', $th->getMessage());
        }
    }

      public function destroy($cartId){
        try {
            $cart = Cart::where('id', $cartId)
                ->where('user_id', Auth::id())
                ->firstOrFail();

            $cart->delete();

            return response()->json([
                'success' => true,
                'message' => 'Item berhasil dihapus dari keranjang',
                'cart_count' => Cart::where('user_id', Auth::id())->sum('quantity')
            ]);

        } catch (\Exception $e) {
            Log::error('Error removing from cart: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus item'
            ], 500);
        }
    }

    public function update(Request $request, $cartId){
        $request->validate([
            'quantity' => 'nullable|integer'
        ]);
        DB::beginTransaction();
        try {
            $cart = Cart::with('product')
                ->where('id', $cartId)
                ->where('user_id', Auth::id())
                ->firstOrFail();

            if($request->quantity == null){
                $request->quantity = 1;
            }

            $cart->update([
                'quantity' => $request->quantity,
                'total_price' => $request->quantity * $cart->product->price
            ]);

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Jumlah product berhasil diperbarui',
                'price' => $cart->product->price,
                'quantity' => $cart->quantity,
                'total' => $cart->product->price * $cart->quantity
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating cart: ' . $e->getMessage());

            return redirect()->back()->with('error',''. $e->getMessage());
        }
    }


 public function checkoutCart(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'selected_carts' => 'required|array',
            'selected_carts.*.cart_id' => 'required|exists:carts,id',
            'selected_carts.*.quantity' => 'required|integer|min:1',
            'selected_carts.*.unit_price' => 'required|numeric|min:0',
            'selected_carts.*.total_price' => 'required|numeric|min:0',
            'shipping_method' => 'nullable|string',
            'shipping_cost' => 'nullable|numeric|min:0'
        ]);

        $cartItems = $validatedData['selected_carts'];
        $shippingMethod = $validatedData['shipping_method'] ?? 'Diantar';
        $validatedData['shipping_cost'] = 5000;
        $defaultShippingCost = $validatedData['shipping_cost'] ?? 0;

        try {
            DB::beginTransaction();
            $user = Auth::user();


            $cartIds = collect($cartItems)->pluck('cart_id')->toArray();
            $carts = $this->cartService->getCartData($cartIds); //join cart, product, mart

            $stockErrors = $this->cartService->validateProductStock($carts, $cartItems); // cek stock
            if (!empty($stockErrors)) {
              throw new Exception('Permintaan melebihi stock');
            }

            $groupedCarts = $this->cartService->groupCartsByMart($carts); // grouping cart by mart_id

            $calculationResult = $this->cartService->calculateGroupOrders( // hitung price total per mart group
                $groupedCarts,
                $cartItems,
                $defaultShippingCost
            );

            $transactionCode = $this->cartService->generateTransactionCode();
            $transactionId = $this->cartService->createTransaction(
                $transactionCode,
                $calculationResult['grand_total']
            );

            $createdGroupOrders = $this->createGroupOrdersAndOrders(
                $calculationResult['group_orders'],
                $transactionId,
                $shippingMethod,
                $cartItems
            );

            $this->cartService->clearCartItems($cartIds);
           WhatsappJob::dispatch($user->phone, "🎉 Hai {$user->name}, terima kasih telah berbelanja di *WargaUsaha*!🛍️
           \n\n📦 Transaksi kamu berhasil dibuat dengan *Kode Transaksi*: {$transactionCode}.
           \n\nMohon segera selesaikan pembayaran dalam waktu *1 jam* agar pesananmu bisa segera kami proses. 🕒
           \n\nSalam sukses,\nTim WargaUsaha 💼
           \n\nhttps://wargausaha.ianianale.shop");

            DB::commit();
            return redirect()->route('customer.transaction.show', $transactionId);


        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    private function createGroupOrdersAndOrders(array $allGroupOrders, int $transactionId, string $shippingMethod, array $cartItems): array{
        $createdGroupOrders = [];

        foreach ($allGroupOrders as $groupData) {

            $groupOrderId = $this->cartService->createGroupOrder(
                $groupData,
                $transactionId,
                $shippingMethod
            );


            $orders = $this->cartService->createOrders(
                $groupData,
                $groupOrderId,
                $cartItems
            );

            $createdGroupOrders[] = [
                'group_order_id' => $groupOrderId,
                'mart_id' => $groupData['mart_id'],
                'sub_total' => $groupData['sub_total'],
                'shipping_cost' => $groupData['shipping_cost'],
                'total_price' => $groupData['total_price'],
                'orders' => $orders
            ];
        }

        return $createdGroupOrders;
    }


    public function getCheckoutSummary(Request $request){
        $request->validate([
            'selected_carts' => 'required|array',
            'selected_carts.*.cart_id' => 'required|exists:carts,id',
            'selected_carts.*.quantity' => 'required|integer|min:1',
            'selected_carts.*.unit_price' => 'required|numeric|min:0',
            'selected_carts.*.total_price' => 'required|numeric|min:0',
            'shipping_cost' => 'nullable|numeric|min:0'
        ]);

        try {
            $cartItems = $request->selected_carts;
            $defaultShippingCost = $request->shipping_cost ?? 0;


            $cartIds = collect($cartItems)->pluck('cart_id')->toArray();
            $carts = $this->cartService->getCartData($cartIds);


            $stockErrors = $this->cartService->validateProductStock($carts, $cartItems);


            $groupedCarts = $this->cartService->groupCartsByMart($carts);


            $calculationResult = $this->cartService->calculateGroupOrders(
                $groupedCarts,
                $cartItems,
                $defaultShippingCost
            );


            $summary = $this->buildSummaryResponse($groupedCarts, $cartItems, $defaultShippingCost);

            return response()->json([
                'success' => true,
                'summary' => $summary,
                'grand_total' => $calculationResult['grand_total'],
                'stock_errors' => $stockErrors
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mendapatkan summary: ' . $e->getMessage()
            ], 500);
        }
    }


    private function buildSummaryResponse($groupedCarts, array $cartItems, float $defaultShippingCost): array{
        $summary = [];

        foreach ($groupedCarts as $martId => $martCarts) {
            $items = [];
            $martTotal = 0;

            foreach ($martCarts as $cart) {
                $cartItem = collect($cartItems)->firstWhere('cart_id', $cart->id);
                $totalPrice = $cartItem['total_price'];
                $martTotal += $totalPrice;

                $items[] = [
                    'cart_id' => $cart->id,
                    'product_name' => $cart->product_name,
                    'quantity' => $cartItem['quantity'],
                    'unit_price' => $cartItem['unit_price'],
                    'total_price' => $totalPrice,
                    'available_stock' => $cart->stock ?? 0
                ];
            }

            $summary[] = [
                'mart_id' => $martId,
                'mart_name' => $martCarts->first()->mart_name,
                'items' => $items,
                'subtotal' => $martTotal,
                'shipping_cost' => $defaultShippingCost,
                'total' => $martTotal + $defaultShippingCost
            ];
        }

        return $summary;
    }

    public function checkOngkir(){
        $oriLat = -7.330202;
        $oriLong = 112.744858;
        $desLat = -7.326925;
        $desLong = 112.741581;
        $items = ['name' => 'Bomm xxx',
                    'value' => 50000,
                    'quantity' => 1,
                    'weight' => 100];

        try {
        $harga = $this->cekOngkirService->getGojekRates($oriLat, $oriLong, $desLat, $desLong, $items);
        return response()->json(['harga' => $harga['price']]);
        } catch (Exception $th) {
        return response()->json(['err' => $th->getMessage()]);
        }

    }

}
