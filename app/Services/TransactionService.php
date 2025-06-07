<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Transaction;
use Exception;
use Illuminate\Support\Facades\Auth;

class TransactionService
{
    protected $walletService;
    public function __construct(WalletService $walletService)
    {
        $this->walletService = $walletService;
    }

    public function getServiceOrderByLoginSeller(){
        $user = Auth::user();
        $order = Order::where('seller_id', $user->id)
        ->where('type', 'Service')
        ->orderBy('updated_at','desc')->get();
        return $order;
    }

    public function getProductOrderByLoginSeller(){
        $user = Auth::user();
        $order = Order::where('seller_id', $user->id)
        ->where('type', 'Product')
        ->orderBy('updated_at','desc')->get();
        return $order;
    }

    public function getAllOrderByLoginUser(){
        $user = Auth::user();
        return Order::where('seller_id', $user->id)->orderBy('updated_at', 'desc')->get();
    }

    public function getTransactionByOrderId($orderId){
        return Transaction::where('order_id', $orderId)->first();
    }

    private function generateUniqueOrderCode(){
    $datePart = now()->format('Ymd'); // Format: TahunBulanTanggal (contoh: 20250601)
    $unique = false;
    $orderCode = '';

    while (!$unique) {
        // Generate random 6 digit number
        $randomPart = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);

        // Format: ORD-YYYYMMDD-XXXXXX
        $orderCode = 'WU-'  . $randomPart;

        // Check if code already exists in database
        $exists = Order::where('order_code', $orderCode)->exists();

        if (!$exists) {
            $unique = true;
        }
    }

    return $orderCode;
}



    public function checkoutProduct($data, $product, $seller){

        // Webhook tambahkan pengurangan stock dan penambahan saldo penjual

        if ($data['quantity'] > $product->stock) {
            throw new Exception('Jumlah yang diminta melebihi stok yang tersedia.');
        }

        $user = Auth::user();
        $data['order_code'] = $this->generateUniqueOrderCode();
        $data['buyer_id'] = $user->id;
        $data['product_id'] = $product->id;
        $data['seller_id'] = $seller->id;
        $data['total_price'] = $product->price * $data['quantity'];
        $data['type'] = 'Product';
        $data['order_status'] = 'Pending';

        $order = Order::create($data);

        $product->update([
            'stock' => $product->stock - $data['quantity'],
        ]);

        Transaction::create([
            'order_id' => $order->id,
            'payment_method' => '',
            'payment_status' => 'Pending',
            'paid_amount' => $order->total_price,
            'paid_at' => now(),
        ]);

        return $order;
    }

    public function checkoutService($data, $service, $seller){

        // Webhook tambahkan pengurangan stock dan penambahan saldo penjual


        $user = Auth::user();
        $data['order_code'] = $this->generateUniqueOrderCode();
        $data['buyer_id'] = $user->id;
        $data['service_id'] = $service->id;
        $data['seller_id'] = $seller->id;
        $data['total_price'] = $service->price ;
        $data['type'] = 'Service';
        $data['order_status'] = 'Pending';

        $order = Order::create($data);

        Transaction::create([
            'order_id' => $order->id,
            'payment_method' => '',
            'payment_status' => 'Pending',
            'paid_amount' => $order->total_price,
            'paid_at' => now(),
        ]);

        return $order;
    }


}
