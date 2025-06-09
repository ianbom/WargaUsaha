<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\GroupOrder;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getCartByUserLogin(){
        $user = Auth::user();
        $carts = Cart::where('user_id', $user->id)->get();
        return $carts;
    }

    public function getUniqueProductCart($productId){
        $user = Auth::user();
        $carts = Cart::where('user_id', $user->id)->where('product_id', $productId)->get();

        if (!$carts || $carts->isEmpty()) {
            return true;
        } else{
            return false;
        }

    }

    public function addProductToCart($data){
        $user = Auth::user();
        $isProductUnique = $this->getUniqueProductCart($data['product_id']);
        $product = Product::findOrFail( $data['product_id'] );
        if ($isProductUnique) {
          $cart =  Cart::create([
            'user_id'=> $user->id,
            'product_id'=> $data['product_id'],
            'quantity' => 1,
            'total_price' => $product->price,
        ]);
        } else {
            throw new Exception('Product sudah dikeranjang');
        }

    }


  public function getCartData(array $cartIds): Collection
    {
        return DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->join('marts', 'products.mart_id', '=', 'marts.id')
            ->whereIn('carts.id', $cartIds)
            ->select(
                'carts.*',
                'products.name as product_name',
                'products.price as current_price',
                'products.mart_id',
                'products.stock',
                'marts.name as mart_name'
            )
            ->get();
    }


    public function groupCartsByMart(Collection $carts): Collection
    {
        return $carts->groupBy('mart_id');
    }

    public function calculateGroupOrders(Collection $groupedCarts, array $cartItems, float $defaultShippingCost): array
    {
        $grandTotal = 0;
        $allGroupOrders = [];

        foreach ($groupedCarts as $martId => $martCarts) {
            $subTotal = $this->calculateMartSubTotal($martCarts, $cartItems);
            $totalPrice = $subTotal + $defaultShippingCost;
            $grandTotal += $totalPrice;

            $allGroupOrders[] = [
                'mart_id' => $martId,
                'sub_total' => $subTotal,
                'total_price' => $totalPrice,
                'carts' => $martCarts,
                'shipping_cost' => $defaultShippingCost
            ];
        }

        return [
            'group_orders' => $allGroupOrders,
            'grand_total' => $grandTotal
        ];
    }


    private function calculateMartSubTotal(Collection $martCarts, array $cartItems): float
    {
        $subTotal = 0;
        foreach ($martCarts as $cart) {
            $cartItem = collect($cartItems)->firstWhere('cart_id', $cart->id);
            $subTotal += $cartItem['total_price'];
        }
        return $subTotal;
    }




    public function generateTransactionCode(){
    $datePart = now()->format('Ymd'); // Format: TahunBulanTanggal (contoh: 20250601)
    $unique = false;
    $orderCode = '';

    while (!$unique) {
        // Generate random 6 digit number
        $randomPart = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);

        // Format: ORD-YYYYMMDD-XXXXXX
        $orderCode = 'TRX-'  . $randomPart;

        // Check if code already exists in database
        $exists = Order::where('order_code', $orderCode)->exists();

        if (!$exists) {
            $unique = true;
        }
    }

    return $orderCode;
}



    private function generateOrderCode(){
    $datePart = now()->format('Ymd'); // Format: TahunBulanTanggal (contoh: 20250601)
    $unique = false;
    $orderCode = '';

    while (!$unique) {
        // Generate random 6 digit number
        $randomPart = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);

        // Format: ORD-YYYYMMDD-XXXXXX
        $orderCode = 'ORD-'  . $randomPart;

        // Check if code already exists in database
        $exists = Order::where('order_code', $orderCode)->exists();

        if (!$exists) {
            $unique = true;
        }
    }

    return $orderCode;
}


    public function createTransaction(string $transactionCode, float $grandTotal): int
    {
        $user = Auth::user();
        return DB::table('transactions')->insertGetId([
            'transaction_code' => $transactionCode,
            'user_id' => $user->id,
            'payment_method' => null,
            'payment_status' => 'Pending',
            'paid_amount' => $grandTotal,
            'gateway_response' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }


    public function createGroupOrder(array $groupData, int $transactionId, string $shippingMethod): int
    {
        return DB::table('group_orders')->insertGetId([
            'transaction_id' => $transactionId,
            'user_id' => Auth::id(),
            'mart_id' => $groupData['mart_id'],
            'shipping_method' => $shippingMethod,
            'shipping_cost' => $groupData['shipping_cost'],
            'sub_total' => $groupData['sub_total'],
            'total_price' => $groupData['total_price'],
            'order_status' => 'Pending',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }


    public function createOrders(array $groupData, int $groupOrderId, array $cartItems): array
    {
        $orders = [];

        foreach ($groupData['carts'] as $cart) {
            $cartItem = collect($cartItems)->firstWhere('cart_id', $cart->id);
            $orderCode = $this->generateOrderCode();

            $orderId = DB::table('orders')->insertGetId([
                'order_code' => $orderCode,
                'group_order_id' => $groupOrderId,
                'buyer_id' => Auth::id(),
                'seller_id' => null,
                'mart_id' => $cart->mart_id,
                'type' => 'Product',
                'product_id' => $cart->product_id,
                'service_id' => null,
                'quantity' => $cartItem['quantity'],
                'total_price' => $cartItem['total_price'],
                'note' => null,
                'product_name' => $cart->product_name,
                'product_price' => $cartItem['unit_price'],
                'order_status' => 'Pending',
                'created_at' => now(),
                'updated_at' => now()
            ]);

            $orders[] = [
                'id' => $orderId,
                'order_code' => $orderCode,
                'product_name' => $cart->product_name,
                'quantity' => $cartItem['quantity'],
                'unit_price' => $cartItem['unit_price'],
                'total_price' => $cartItem['total_price']
            ];

            // Update stok produk
            $this->updateProductStock($cart->product_id, $cartItem['quantity']);
        }

        return $orders;
    }


    public function updateProductStock(int $productId, int $quantity): void
    {
        DB::table('products')
            ->where('id', $productId)
            ->decrement('stock', $quantity);
    }


    public function clearCartItems(array $cartIds): void
    {
        DB::table('carts')->whereIn('id', $cartIds)->delete();
    }


    public function validateProductStock(Collection $carts, array $cartItems): array
    {
        $errors = [];

        foreach ($carts as $cart) {
            $cartItem = collect($cartItems)->firstWhere('cart_id', $cart->id);
            $requestedQuantity = $cartItem['quantity'];

            if ($cart->stock < $requestedQuantity) {
                $errors[] = [
                    'product_name' => $cart->product_name,
                    'available_stock' => $cart->stock,
                    'requested_quantity' => $requestedQuantity
                ];
            }
        }

        return $errors;
    }





}
