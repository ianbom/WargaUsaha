<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\ServiceCategory;
use App\Services\OrderService;
use App\Services\ServiceService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request as RequestPagination;

class ServiceController extends Controller
{
    protected $serviceService, $orderService;

    public function __construct(ServiceService $serviceService, OrderService $orderService)
    {
        $this->serviceService = $serviceService;
        $this->orderService = $orderService;
    }

    public function index(Request $request)
    {

        $orders = $this->orderService->getAllServiceOrderByLoginUser($request);

        return view('web.customer.profile.order.service.index', ['orders' => $orders]);
    }

    public function show(Order $service)
    {

        return view('web.customer.profile.order.service.detail', ['order' => $service]);
    }

    public function completeServieOrder($orderId){
        DB::beginTransaction();
        //  dd($serive);
        try {
            $order = Order::findOrFail($orderId);
            $order->update([
                'completed_at' => now(),
                'order_status' => 'Completed'
            ]);

            DB::commit();
            return redirect()->back()->with('success','Layanan diselesaikan');

        } catch (\Throwable $th) {
            DB::rollBack();
            // return response()->json(['err' => $th->getMessage()],500);
           return redirect()->back()->with('error',$th->getMessage());
        }

    }
}
