<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequest;
use App\Http\Requests\OrderRequest;
use App\Models\Product;
use App\Models\Service;
use App\Models\Transaction;
use App\Models\User;
use App\Services\CartService;
use App\Services\TransactionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{
    protected $transactionService;
    protected $cartService;
    public function __construct(TransactionService $transactionService, CartService $cartService)
    {
        $this->transactionService = $transactionService;
        $this->cartService = $cartService;
    }

    public function checkoutProduct(CartRequest $request)
    {
        $data = $request->all();
        // dd($data);
        DB::beginTransaction();
        try {
            $this->cartService->addProductToCart($data);
            DB::commit();
            return redirect()->route('customer.cart.index');
        } catch (\Exception $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function checkoutService(Service $service, OrderRequest $request)
    {
        $data = $request->all();
        DB::beginTransaction();
        $seller = $service->user;
        try {
            $order = $this->transactionService->checkoutService($data, $service, $seller);
            DB::commit();
            return redirect()->route('customer.service.show', $order->id)->with('success', 'Order placed successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            // return response()->json(['err' => $th->getMessage()],500);
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    // public function index(){
    //     try {
    //     $user = Auth::user();
    //     $transaction = Transaction::where('user_id', $user->id)->get();

    //     return view('web.customer.transaction.index', ['transaction' => $transaction]);
    //     } catch (\Throwable $th) {
    //       return response()->json(['err' => $th->getMessage()],404);
    //     }

    // }
    public function index(Request $request)
    {
        try {
            $transaction = $this->transactionService->getAllTransactionByLoginUser($request);
            return view('web.customer.transaction.index', ['transaction' => $transaction]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
    public function show(Transaction $transaction)
    {
        $snapToken = $transaction->snap_token;
        return view('web.customer.transaction.detail', ['transaction' => $transaction, 'snapToken' => $snapToken]);
    }

    public function payTransaction(Request $request, Transaction $transaction)
    {

        DB::beginTransaction();
        try {
            $this->transactionService->payTransaction($transaction);
            // $snapToken = $result['snap_token'];
            // $transaction = $result['transaction'];

            DB::commit();
            // return view('web.customer.transaction.detail');

            return redirect()->back()->with(['success', 'Pembayaran berhasil']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'err' => $th->getMessage()
            ]);
        }
    }

    public function cancelTransaction(Transaction $transaction, Request $request)
    {
        try {
            $reason = $request->input('reason', 'Cancelled by customer');
            $this->transactionService->cancelTransaction($transaction, $reason);
            return redirect()->back()->with('success', 'Transaksi dibatalkan');
        } catch (\Throwable $th) {
            return response()->json([
                'err' => $th->getMessage()
            ]);
        }
    }



  public function callBackAfterPayment(Request $request){
    Log::info('Webhook berjalan coy');


    // Ambil raw JSON body
    $rawBody = $request->getContent();
    $requestData = json_decode($rawBody, true);

    Log::info('Request data:', $requestData); // Log semua data request

    try {
        $serverKey = config('midtrans.server_key');

        // Pastikan server key tidak kosong
        if (empty($serverKey)) {
            Log::error('Server key tidak ditemukan di config');
            return response()->json(['message' => 'Server configuration error'], 500);
        }

        // Ambil data dari JSON yang sudah di-decode
        $orderId = $requestData['order_id'] ?? null;
        $statusCode = $requestData['status_code'] ?? null;
        $grossAmount = $requestData['gross_amount'] ?? null;
        $signatureKeyFromMidtrans = $requestData['signature_key'] ?? null;

        // Log data untuk debugging
        Log::info("Order ID: {$orderId}");
        Log::info("Status Code: {$statusCode}");
        Log::info("Gross Amount: {$grossAmount}");
        Log::info("Signature from Midtrans: {$signatureKeyFromMidtrans}");

        // Pastikan semua data yang diperlukan ada
        if (empty($orderId) || empty($statusCode) || empty($grossAmount) || empty($signatureKeyFromMidtrans)) {
            Log::error('Data tidak lengkap untuk validasi signature');
            return response()->json(['message' => 'Incomplete webhook data'], 400);
        }

        // Buat signature key sesuai dokumentasi Midtrans
        $signatureKey = hash("sha512", $orderId . $statusCode . $grossAmount . $serverKey);

        Log::info("Generated signature: {$signatureKey}");
        Log::info("Midtrans signature: {$signatureKeyFromMidtrans}");

        // Validasi signature key
        if ($signatureKey !== $signatureKeyFromMidtrans) {
            Log::error('Signature key tidak valid');
            Log::error("Expected: {$signatureKey}");
            Log::error("Received: {$signatureKeyFromMidtrans}");
            return response()->json(['message' => 'Invalid signature key'], 403);
        }

        // Cari transaksi
        $transaction = Transaction::where('transaction_code', $orderId)->first();

        if (!$transaction) {
            Log::error("Transaction tidak ditemukan untuk order_id: {$orderId}");
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        $user = User::findOrFail($transaction->user_id);

        // Simpan response dari gateway
        $transaction->gateway_response = $requestData;

        // Update status berdasarkan transaction_status dari Midtrans
        $transactionStatus = $requestData['transaction_status'] ?? null;

        if (in_array($transactionStatus, ['settlement', 'capture'])) {
            $transaction->payment_status = 'Paid';
            $transaction->payment_method = $requestData['payment_type'] ?? null;
            $transaction->acquirer = $requestData['acquirer'] ?? null;
            $this->transactionService->payTransaction($transaction);

        } elseif (in_array($transactionStatus, ['cancel', 'expire', 'failure'])) {
            $transaction->payment_status = 'Failed';

        } elseif ($transactionStatus === 'pending') {
            $transaction->payment_status = 'Pending';
        }

        $transaction->save();

        Log::info("Transaction updated successfully for order_id: {$orderId}");
        Log::info('Final transaction status: ' . $transaction->payment_status);

        return response()->json(['message' => 'Webhook processed successfully']);

    } catch (\Throwable $th) {
        Log::error('Error in webhook callback: ' . $th->getMessage());
        Log::error('Stack trace: ' . $th->getTraceAsString());
        return response()->json(['message' => $th->getMessage()], 500);
    }
}

    public function payNoCallBack($id){

        $transaction = Transaction::findOrFail($id);
           if (!$transaction) {
                return response()->json(['error' => 'Transaksi tidak ditemukan']);
            }
        try {

        } catch (\Throwable $th) {
            //throw $th;

        }
    }
}
