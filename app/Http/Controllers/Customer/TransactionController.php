<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequest;
use App\Http\Requests\OrderRequest;
use App\Models\Product;
use App\Models\Service;
use App\Models\Transaction;
use App\Services\CartService;
use App\Services\TransactionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            return response()->json(['err' => $th->getMessage()],500);
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

        return view('web.customer.transaction.detail', ['transaction' => $transaction]);
    }

    public function payTransaction(Request $request, Transaction $transaction){

        DB::beginTransaction();
        try {
        $this->transactionService->payTransaction($transaction);
        DB::commit();
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
        return response()->json(['success', 'Pembayaran dibatalkan']);
    } catch (\Throwable $th) {
        return response()->json([
            'err' => $th->getMessage()
        ]);
    }



}

}
