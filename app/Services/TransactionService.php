<?php

namespace App\Services;

use App\Models\GroupOrder;
use App\Models\LogWallet;
use App\Models\Mart;
use App\Models\Order;
use App\Models\Product;
use App\Models\SellerWallet;
use App\Models\Transaction;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Snap;
use Illuminate\Http\Request;

class TransactionService
{
    protected $walletService;
    public function __construct(WalletService $walletService)
    {
        $this->walletService = $walletService;

        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function getServiceOrderByLoginSeller()
    {
        $user = Auth::user();
        $order = Order::where('seller_id', $user->id)
            ->where('type', 'Service')
            ->orderBy('updated_at', 'desc')->get();
        return $order;
    }
    public function getAllTransactionByLoginUser($request)
    {
        $user = Auth::user();

        $query = Transaction::where('user_id', $user->id)
            ->orderBy('created_at', 'desc');
        if ($request->filled('search')) {
            $query->where('transaction_code', 'like', '%' . $request->get('search') . '%');
        }
        if ($request->filled('status')) {
            $query->where('payment_status', $request->get('status'));
        }

        return $query->paginate(10);
    }

    public function getGroupOrderByLoginSeller()
    {
        $user = Auth::user();
        $groupOrder = GroupOrder::where('mart_id', $user->mart->id)->get();
        return $groupOrder;
    }

    public function getProductOrderByLoginSeller()
    {
        $user = Auth::user();
        $order = Order::where('seller_id', $user->id)
            ->where('type', 'Product')
            ->orderBy('updated_at', 'desc')->get();
        return $order;
    }

    public function getAllOrderByLoginUser()
    {
        $user = Auth::user();
        return Order::where('seller_id', $user->id)->orderBy('updated_at', 'desc')->get();
    }

    public function getTransactionByOrderId($orderId)
    {
        return Transaction::where('order_id', $orderId)->first();
    }

    private function generateUniqueOrderCode()
    {
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

    public function checkoutKeranjang() {}




    public function checkoutProduct($data, $product, $seller)
    {

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

    public function checkoutService($data, $service, $seller)
    {

        // Webhook tambahkan pengurangan stock dan penambahan saldo penjual


        $user = Auth::user();
        $data['order_code'] = $this->generateUniqueOrderCode();
        $data['buyer_id'] = $user->id;
        $data['service_id'] = $service->id;
        $data['seller_id'] = $seller->id;
        $data['total_price'] = $service->price;
        $data['type'] = 'Service';
        $data['order_status'] = 'Pending';
        $data['mart_id'] = $seller->mart->id;

        $order = Order::create($data);

        // Transaction::create([
        //     'order_id' => $order->id,
        //     'payment_method' => '',
        //     'payment_status' => 'Pending',
        //     'paid_amount' => $order->total_price,
        //     'paid_at' => now(),
        // ]);

        return $order;
    }

    public function payTransactionMidtrans($transaction)
    {

        if ($transaction->payment_status !== 'Pending') {
            throw new Exception('Transaction is not in pending status');
        }
        $params = [
            'transaction_details' => [
                'order_id' => $transaction->transaction_code,
                'gross_amount' => $transaction->paid_amount
            ],
            'customer_details' => [
                'first_name' => $transaction->user->name,
                'email' => $transaction->user->email,
                'phone' => $transaction->user->phone
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        return [
            'transaction' => $transaction,
            'snap_token' => $snapToken
        ];
    }

    public function callBackAfterPayment(Request $request)
    {
        Log::info('Webhook berjalan coy');
        // Mengambil konfigurasi Server Key

        try {
            $serverKey = config('midtrans.server_key');

            // Validasi signature key dari Midtrans
            $signatureKey = hash(
                "sha512",
                $request->order_id .
                    $request->status_code .
                    $request->gross_amount .
                    $serverKey
            );

            if ($signatureKey !== $request->signature_key) {
                return response()->json(['message' => 'Invalid signature key'], 403);
            }

            // Cek status transaksi
            $transaction = Transaction::where('transaction_code', $request->order_id)->first();
            $user = User::findOrFail($transaction->user_id);


            if (!$transaction) {
                return response()->json(['message' => 'Transaction not found'], 404);
            }
            if ($request->transaction_status == 'settlement' || $request->transaction_status == 'capture') {
                $transaction->payment_status = 'Paid'; // Status pembayaran berhasil
                $this->payTransaction($transaction);
            } elseif ($request->transaction_status == 'cancel' || $request->transaction_status == 'expire') {
                $transaction->payment_status = 'Failed'; // Status pembayaran gagal atau kadaluarsa
            } elseif ($request->transaction_status == 'pending') {
                $transaction->payment_status = 'Pending'; // Status menunggu pembayaran
            }

            $transaction->save();
            Log::info($request);
            return response()->json(['message' => 'Webhook processed successfully']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()]);
        }
    }

    public function payTransaction($transaction)
    {
        // Update transaction status
        $transaction->update([
            'payment_status' => 'Paid',
            // 'payment_method' => 'Qris',
            'updated_at' => now(),
        ]);

        // Get group order IDs and mart IDs
        $groupOrderIds = $transaction->groupOrders->pluck('id');
        $martIds = $transaction->groupOrders->pluck('mart_id');

        // Update group orders status
        GroupOrder::whereIn('id', $groupOrderIds)->update([
            'order_status' => 'Paid',
            'paid_at' => now(),
            'updated_at' => now()
        ]);

        // Update orders status
        $orderIds = Order::whereIn('group_order_id', $groupOrderIds)->pluck('id');
        Order::whereIn('id', $orderIds)->update([
            'order_status' => 'Paid',
            'paid_at' => now(),
            'updated_at' => now()
        ]);

        // Update seller wallets
        $this->updateSellerWallets($groupOrderIds, $martIds);
    }

    private function updateSellerWallets($groupOrderIds, $martIds)
    {
        // Dapatkan semua order yang terkait dengan group orders
        $orders = Order::whereIn('group_order_id', $groupOrderIds)->get();

        // Group orders berdasarkan mart_id untuk menghitung total per seller
        $sellerEarnings = [];

        foreach ($orders as $order) {
            $martId = $order->mart_id;

            if (!isset($sellerEarnings[$martId])) {
                $sellerEarnings[$martId] = 0;
            }

            $sellerEarnings[$martId] += $order->total_price;
        }

        // Update seller wallet untuk setiap mart/seller
        foreach ($sellerEarnings as $martId => $totalEarning) {
            // Dapatkan user_id dari mart
            $mart = Mart::find($martId);

            if ($mart) {
                $sellerId = $mart->user_id;

                // Cari atau buat seller wallet
                $sellerWallet = SellerWallet::firstOrCreate(
                    ['user_id' => $sellerId],
                    [
                        'amount' => 0,
                        'bank_name' => null,
                        'account_number' => null,
                        'account_name' => null,
                    ]
                );

                // Update amount wallet
                $sellerWallet->increment('amount', $totalEarning);

                // Buat log wallet
                LogWallet::create([
                    'user_id' => $sellerId,
                    'title' => 'Pembayaran product',
                    'seller_walet_id' => $sellerWallet->id, // Sesuai dengan nama kolom di schema
                    'type' => 'Credit',
                    'amount' => $totalEarning,
                    'status' => 'Success',
                ]);
            }
        }
    }

    public function cancelTransaction($transaction, $reason = null)
    {
        if ($transaction->payment_status !== 'Pending') {
            throw new \Exception('Cannot cancel transaction with status: ' . $transaction->payment_status);
        }

        $transaction->update([
            'payment_status' => 'Cancelled',
            'updated_at' => now()
        ]);


        $groupOrderIds = $transaction->groupOrders->pluck('id');
        GroupOrder::whereIn('id', $groupOrderIds)->update([
            'order_status' => 'Cancelled',
            'cancelled_at' => now(),
            'updated_at' => now()
        ]);


        // Get orders for stock return
        $orders = Order::whereIn('group_order_id', $groupOrderIds)
            ->where('type', 'Product') // Only products need stock return
            ->whereNotNull('product_id')
            ->whereNotNull('quantity')
            ->get();

        // Update orders status
        Order::whereIn('group_order_id', $groupOrderIds)->update([
            'order_status' => 'Cancelled',
            'cancelled_at' => now(),
            'updated_at' => now()
        ]);

        foreach ($orders as $order) {
            if ($order->product_id && $order->quantity > 0) {
                // Increment stock back
                Product::where('id', $order->product_id)
                    ->increment('stock', $order->quantity);

                // Log stock return for audit
                Log::info('Stock returned due to order cancellation', [
                    'product_id' => $order->product_id,
                    'quantity_returned' => $order->quantity,
                    'order_id' => $order->id,
                    'transaction_id' => $transaction->id
                ]);
            }
        }
    }
}
