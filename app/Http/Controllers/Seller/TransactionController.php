<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\GroupOrder;
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


    }
    public function indexProduct(){
        $orders = $this->transactionService->getGroupOrderByLoginSeller();

        return view('web.seller.transaction.index_product', ['orders' => $orders]); // sebener e iki nde index.product ngebug

    }

    public function indexService(){
        $orders = $this->transactionService->getServiceOrderByLoginSeller();
        return view('web.seller.transaction.index_service', ['orders' => $orders]);
    }



    public function show(GroupOrder $transaction){
        return view('web.seller.transaction.detail', ['groupOrder'=> $transaction]);
    }

    public function showService(Order $order){
        return view('web.seller.transaction.detail_service', ['order'=> $order]);
    }



}
