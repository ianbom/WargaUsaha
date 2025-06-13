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

     public function checkoutProduct(CartRequest $request){
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

    public function checkoutService(Service $service, OrderRequest $request){
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

    public function index(){
        try {
        $user = Auth::user();
        $transaction = Transaction::where('user_id', $user->id)->get();

        return view('web.customer.transaction.index', ['transaction' => $transaction]);
        } catch (\Throwable $th) {
          return response()->json(['err' => $th->getMessage()],404);
        }

    }

    public function show(Transaction $transaction){
        $snapToken = $transaction->snap_token;
        return view('web.customer.transaction.detail', ['transaction' => $transaction, 'snapToken' => $snapToken]);
    }

    public function payTransaction(Request $request, Transaction $transaction){

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
        return redirect()->back()->with('success','Transaksi dibatalkan');
    } catch (\Throwable $th) {
        return response()->json([
            'err' => $th->getMessage()
        ]);
    }

}

  public function callBackAfterPayment(Request $request){
        Log::info('Webhook berjalan coy');
        // Mengambil konfigurasi Server Key

        try {
            $serverKey = config('midtrans.server_key');

        // Validasi signature key dari Midtrans
        $signatureKey = hash("sha512",
            $request->order_id .
            $request->status_code .
            $request->gross_amount .
            $serverKey
        );

        if ($signatureKey !== $request->signature_key) {
            return response()->json(['message' => 'Invalid signature key'], 403);
        }
        $transaction = Transaction::where('transaction_code', $request->order_id)->first();
        $user = User::findOrFail($transaction->user_id);

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }
        $transaction->gateway_response = $request->all();
        if ($request->transaction_status == 'settlement' || $request->transaction_status == 'capture') {

            $transaction->payment_status = 'Paid'; // Status pembayaran berhasil
            $transaction->payment_method = $request->payment_type;
            $transaction->acquirer = $request->acquirer;
            $this->transactionService->payTransaction( $transaction);

        } elseif ($request->transaction_status == 'cancel' || $request->transaction_status == 'expire') {
            $transaction->payment_status = 'Failed'; // Status pembayaran gagal atau kadaluarsa
        } elseif ($request->transaction_status == 'pending') {
            $transaction->payment_status = 'Pending'; // Status menunggu pembayaran
        }

        $transaction->save();
        Log::info($request);
        return response()->json(['message' => 'Webhook processed successfully']);
        } catch (\Throwable $th) {
            return response()->json(['message'=> $th->getMessage()]);
        }
    }

}
