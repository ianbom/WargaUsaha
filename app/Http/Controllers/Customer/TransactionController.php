<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Product;
use App\Models\Service;
use App\Services\TransactionService;
use Illuminate\Http\Request;
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
}
