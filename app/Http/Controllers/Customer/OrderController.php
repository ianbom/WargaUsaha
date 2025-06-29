<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\GroupOrder;
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

    public function show(GroupOrder $order){

        return view('web.customer.profile.order.detail', ['groupOrder'=> $order]);
    }

    public function update(Request $request, Order $order){ // iki ga kanggo
        DB::beginTransaction();

        try {
            $result = $this->orderService->updateOrderStatus($request->order_status, $order);
            DB::commit();
            return redirect()->back()->with('success', $result);
        } catch (\Exception $e) {
            DB::rollBack();
            // return response()->json(['err' => $e->getMessage()],500);
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function completingOrder(GroupOrder $groupOrder){
        DB::beginTransaction();
        try {
            $this->orderService->completeOrder( $groupOrder, $groupOrder->mart->user );
            DB::commit();
            return redirect()->back()->with('success', 'Pesanan berhasil diselesaikan');
        } catch (\Exception $th) {
            DB::rollBack();
            // return response()->json(['error'=> $th->getMessage()]);
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

}
