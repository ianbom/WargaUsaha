<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getAllOrderByLoginUser($request){
        $user = Auth::user();
         $query = Order::query()
            ->where('buyer_id', $user->id)
            ->with(['product', 'service', 'seller'])
            ->orderBy('created_at', 'desc');


        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('order_code', 'like', "%{$search}%")
                  ->orWhereHas('product', function ($productQuery) use ($search) {
                      $productQuery->where('name', 'like', "%{$search}%");
                  })
                  ->orWhereHas('service', function ($serviceQuery) use ($search) {
                      $serviceQuery->where('title', 'like', "%{$search}%");
                  });
            });
        }

        // Type filter
        if ($request->filled('type')) {
            $query->where('type', $request->input('type'));
        }

        // Status filter
        if ($request->filled('status')) {
            $query->where('order_status', $request->input('status'));
        }

        $orders = $query->paginate(10);
        return $orders;

    }
}
