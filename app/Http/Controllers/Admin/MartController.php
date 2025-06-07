<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mart;
use App\Models\User;
use App\Services\MartService;
use Illuminate\Http\Request;

class MartController extends Controller
{
    protected $martService;

    public function __construct(MartService $martService)
    {
        $this->martService = $martService;
    }

    public function index(){
        $marts = Mart::orderBy('name', 'asc')->where('is_active', true)->get();
        return view('web.admin.mart.index', ['marts' => $marts]);
    }

    public function registration(){
        $martRegistrations = $this->martService->getAllMartRegistration();
        return view('web.admin.mart.registration', ['martRegistrations' => $martRegistrations]);
    }

    public function show(Mart $mart){

        return view('web.admin.mart.detail', ['mart' => $mart]);
    }


}
