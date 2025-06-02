<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;
      public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index(Request $request){
        $orders = $this->orderService->getAllOrderByLoginUser($request);
        return view('web.customer.profile.order.index', ['orders' => $orders]);
    }

    public function show(Order $order){

        return view('web.customer.profile.order.detail', ['order'=> $order]);
    }

}
