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
use Midtrans\Config;
use Midtrans\Snap;

class CartService
{
    protected $cekOngkirService;
    public function __construct(CekOngkirSerivce $cekOngkirSerivce)
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;
        $this->cekOngkirService = $cekOngkirSerivce;
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
            'quantity' => $data['quantity'],
            'total_price' => $product->price,
        ]);
        return true;
        } else {
           return false;
        }

    }


  public function getCartData(array $cartIds): Collection
    {
        return  DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->join('marts', 'products.mart_id', '=', 'marts.id')
            ->join('users', 'marts.user_id', '=', 'users.id')
            ->join('wards', 'users.ward_id', '=', 'wards.id')
            ->whereIn('carts.id', $cartIds)
            ->select(
                'carts.*',
                'products.name as product_name',
                'products.price as current_price',
                'products.mart_id',
                'products.stock',
                'products.weight',
                'marts.name as mart_name',
                'users.name as seller_name',
                'users.id as seller_id',
                'users.ward_id as seller_ward_id',
                'wards.subdistrict_id as seller_subdistrict_id',
                'users.location_lat as seller_latitude',
                'users.location_long as seller_longitude',
            )
            ->get();


    }


    public function groupCartsByMart(Collection $carts): Collection
    {
        return $carts->groupBy('mart_id');
    }

    public function calculateGroupOrders(Collection $groupedCarts, array $cartItems, float $defaultShippingCost): array
{
    $user = Auth::user();
    $grandTotal = 0;
    $allGroupOrders = [];

    if (!$user->location_lat || !$user->location_long) {
         throw new Exception("User location is not set.");
    }

    foreach ($groupedCarts as $martId => $martCarts) {

        $quantityTotal = 0;
        $weightTotal = 0;

        foreach ($martCarts as $cartItem) {

            $quantityTotal += $cartItem->quantity;

            if ( $cartItem->weight) {
                $weightTotal += ($cartItem->weight * $cartItem->quantity);
            }
        }

        $firstItemCart = $martCarts->first();
        $sellerLat = $firstItemCart->seller_latitude;
        $sellerLong = $firstItemCart->seller_longitude;
        $subTotal = $this->calculateMartSubTotal($martCarts, $cartItems);

        $distance = $user->calculateDistance($user->location_lat, $user->location_long, $sellerLat, $sellerLong);


        if ($distance <= 2) {
            // Zona Gratis: 0 - 2 km
            $defaultShippingCost = 0;
        } elseif ($distance > 2 && $distance <= 4) {
            // Zona Dekat: > 2 - 4 km
            $shippingdefaultShippingCostCost = 5000;
        } elseif ($distance > 4 && $distance <= 6) {
            // Zona Sedang: > 4 - 6 km
            $defaultShippingCost = 12000;
        } elseif ($distance > 6 && $distance <= 10) {
            // Zona Jauh: > 6 - 10 km
            $defaultShippingCost = 18000;
        } else {
            // Zona Sangat Jauh: > 10 km
            $defaultShippingCost = 25000;
        }



        $adminFee = 2000;
        $totalPrice = $subTotal + $defaultShippingCost + $adminFee;
        $grandTotal += $totalPrice;

        $allGroupOrders[] = [
            'mart_id' => $martId,
            'quantity_total' => $quantityTotal,
            'weight_total' => $weightTotal,
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

    public function generateGroupOrderCode(){
    $datePart = now()->format('Ymd'); // Format: TahunBulanTanggal (contoh: 20250601)
    $unique = false;
    $orderCode = '';

    while (!$unique) {
        // Generate random 6 digit number
        $randomPart = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);

        // Format: ORD-YYYYMMDD-XXXXXX
        $orderCode = 'GO-'  . $randomPart;

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
         $transaction = DB::table('transactions')->insertGetId([
            'transaction_code' => $transactionCode,
            'user_id' => $user->id,
            'payment_method' => null,
            'payment_status' => 'Pending',
            'paid_amount' => $grandTotal,
            'gateway_response' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $params = [
            'transaction_details' => [
                'order_id' => $transactionCode,
                'gross_amount' =>  (int) $grandTotal
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' =>$user->email,
                'phone' => $user->phone
            ]
        ];

        $snapToken = Snap::getSnapToken($params);
        DB::table('transactions')
            ->where('id', $transaction)
            ->update([
                'snap_token' => $snapToken,
                'updated_at' => now()
            ]);
        return $transaction;
    }


    public function createGroupOrder(array $groupData, int $transactionId, string $shippingMethod): int
    {
        return DB::table('group_orders')->insertGetId([
            'code_group_order' => $this->generateGroupOrderCode(),
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
                'seller_id' => $cart->seller_id,
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
