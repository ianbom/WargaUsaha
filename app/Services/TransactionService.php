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

    public function checkoutProduct($data, $product, $seller){

        // Webhook tambahkan pengurangan stock dan penambahan saldo penjual

        if ($data['quantity'] > $product->stock) {
            throw new Exception('Jumlah yang diminta melebihi stok yang tersedia.');
        }

        $user = Auth::user();
        $data['order_code'] = rand();
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
            'payment_method' => 'Wallet',
            'payment_status' => 'Pending',
            'paid_amount' => $order->total_price,
            'paid_at' => now(),
        ]);

        return $order;
    }


}
