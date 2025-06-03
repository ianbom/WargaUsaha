<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\TransactionService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    protected $transactionService;

    public function __construct(TransactionService $transactionService){
        $this->transactionService = $transactionService;
    }
    public function index(){
        $orders = $this->transactionService->getAllOrderByLoginUser();
        return view('web.seller.transaction.index', ['orders' => $orders]);
    }

    public function show(Order $transaction){
        return view('web.seller.transaction.detail', ['order'=> $transaction]);
    }


}
