<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        $user = Auth::user();
        $wards = Ward::orderBy('name', 'asc')->get();
        return view('web.customer.profile.index', ['user' => $user, 'wards' => $wards]);
    }
}
