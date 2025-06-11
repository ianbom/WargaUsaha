<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\ServiceCategory;
use App\Services\OrderService;
use App\Services\ServiceService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
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
}
