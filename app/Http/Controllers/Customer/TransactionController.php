<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Product;
use App\Models\Service;
use App\Models\Transaction;
use App\Services\TransactionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    protected $transactionService;
    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function checkoutProduct(Product $product, OrderRequest $request){

        $data = $request->all();
        DB::beginTransaction();
        $seller = $product->mart->user;
        try {
            $order = $this->transactionService->checkoutProduct($data, $product, $seller);
            DB::commit();
            return redirect()->route('customer.order.show', $order->id)->with('success', 'Order placed successfully');
        } catch (\Throwable $th) {
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
            return redirect()->route('customer.order.show', $order->id)->with('success', 'Order placed successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
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
        return response()->json([
            'oke' => 'hmm'
        ]);
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
        return response()->json(['success', true]);
    } catch (\Throwable $th) {
        return response()->json([
            'err' => $th->getMessage()
        ]);
    }



}

}
