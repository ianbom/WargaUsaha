<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function update(Request $request, Order $order){
        DB::beginTransaction();

        try {
            $result = $this->orderService->updateOrderStatus($request->order_status, $order);
            DB::commit();
            return redirect()->back()->with('success', $result);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

}
