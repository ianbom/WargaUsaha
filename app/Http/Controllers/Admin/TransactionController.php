<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){
        $order = Order::orderBy("created_at","desc")->get();
        return view('web.admin.transaction.index', ['order' => $order]);
    }
}
