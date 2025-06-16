<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::orderBy('created_at', 'desc')->get();
        return view('web.admin.service.index', ['services' => $services]);
    }

    public function show(Service $service){
        return view('web.admin.service.detail', ['service' => $service]);
    }
}
