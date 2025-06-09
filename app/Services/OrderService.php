<?php

namespace App\Services;

use App\Models\GroupOrder;
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


   public function getAllOrderByLoginUser($request)
{
    $user = Auth::user();

    $query = GroupOrder::with(['orders.product', 'orders.service', 'mart', 'transaction'])
        ->where('user_id', $user->id)
        ->orderBy('created_at', 'desc');

    // Search functionality
    if ($request->filled('search')) {
        $search = $request->get('search');
        $query->where(function ($q) use ($search) {
            // Search by mart name
            $q->whereHas('mart', function ($martQuery) use ($search) {
                $martQuery->where('name', 'like', '%' . $search . '%');
            })
            // Search by product name
            ->orWhereHas('orders.product', function ($productQuery) use ($search) {
                $productQuery->where('name', 'like', '%' . $search . '%');
            })
            // Search by service title
            ->orWhereHas('orders.service', function ($serviceQuery) use ($search) {
                $serviceQuery->where('title', 'like', '%' . $search . '%');
            })
            // Search by order product_name (snapshot)
            ->orWhereHas('orders', function ($orderQuery) use ($search) {
                $orderQuery->where('product_name', 'like', '%' . $search . '%');
            });
        });
    }

    // Filter by type
    if ($request->filled('type')) {
        $type = $request->get('type');
        $query->whereHas('orders', function ($orderQuery) use ($type) {
            $orderQuery->where('type', $type);
        });
    }

    // Filter by status
    if ($request->filled('status')) {
        $status = $request->get('status');
        $query->where('order_status', $status);
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

    public function prosesOrder($order){
        $order->update([
            'order_status' => 'On-Proses',
            'on_processed_at' => now(),
        ]);

        $transaction = $this->transactionService->getTransactionByOrderId($order->id);
        $transaction->update([
            'payment_status' => 'On-Proses',
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
            case 'On-Proses':
                $this->prosesOrder($order);
                return 'Pesanan telah dibatalkan';
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
