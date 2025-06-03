<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use App\Services\ServiceService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request as RequestPagination;

class ServiceController extends Controller
{
    protected $serviceService;

    public function __construct(ServiceService $serviceService){
        $this->serviceService = $serviceService;
    }

    
}
