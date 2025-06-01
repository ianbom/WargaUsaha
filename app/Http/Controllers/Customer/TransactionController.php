<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Product;
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
            return response()->json([
                'message' => 'Checkout successful',
                'order' => $order,
                'product' => $product,
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();

           return response()->json(['err' => $th->getMessage()], 500);
        }
    }
}
