<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderService
{
    protected $transactionService;
    protected $walletService;
    public function __construct(TransactionService $transactionService, WalletService $walletService)
    {
        $this->transactionService = $transactionService;
        $this->walletService = $walletService;
    }


    public function getAllOrderByLoginUser($request){
        $user = Auth::user();
         $query = Order::query()
            ->where('buyer_id', $user->id)
            ->with(['product', 'service', 'seller'])
            ->orderBy('created_at', 'desc');


        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('order_code', 'like', "%{$search}%")
                  ->orWhereHas('product', function ($productQuery) use ($search) {
                      $productQuery->where('name', 'like', "%{$search}%");
                  })
                  ->orWhereHas('service', function ($serviceQuery) use ($search) {
                      $serviceQuery->where('title', 'like', "%{$search}%");
                  });
            });
        }

        // Type filter
        if ($request->filled('type')) {
            $query->where('type', $request->input('type'));
        }

        // Status filter
        if ($request->filled('status')) {
            $query->where('order_status', $request->input('status'));
        }

        $orders = $query->paginate(10);
        return $orders;

    }

    public function paidOrder($paymentMethod, $order){

        $order->update([
            'order_status' => 'Paid',
            'paid_at' => now(),
        ]);

        $transaction = $this->transactionService->getTransactionByOrderId($order->id);
        $transaction->update([
            'payment_status' => 'Paid',
            'payment_method' => $paymentMethod,
            'paid_amount' => $order->total_price, // nanti ambil dari payment gateway
        ]);

        // $this->walletService->increamentWallet($order->total_price, $seller->id);
    }

    public function cancelOrder($order){
        $order->update([
            'order_status' => 'Cancelled',
            'cancelled_at' => now(),
        ]);

        $transaction = $this->transactionService->getTransactionByOrderId($order->id);
        $transaction->update([
            'payment_status' => 'Cancelled',
        ]);
    }

    public function completeOrder($order, $seller){
        $order->update([
            'order_status' => 'Completed',
            'completed_at' => now(),
        ]);

        $transaction = $this->transactionService->getTransactionByOrderId($order->id);
        $transaction->update([
            'payment_status' => 'Completed',
        ]);

        $this->walletService->increamentWallet($order->total_price, $seller->id);
    }

    public function updateOrderStatus($status, $order){
        switch ($status) {
            case 'Paid':
                $this->paidOrder('Qris', $order);
                return 'Pesanan telah dibayar';
            case 'Cancelled':

                $this->cancelOrder($order);
                return 'Pesanan telah dibatalkan';
            case 'Completed':
                $seller = $order->seller;
                $this->completeOrder($order, $seller);
                return 'Pesanan telah diselesaikan';
            default:
                throw new \Exception('Status tidak valid');
        }
    }
}
