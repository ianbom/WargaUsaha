<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Review;
use App\Models\Service as ServiceModel;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ServiceService extends Service
{
    public function __construct()
    {
        //
    }

    public function getServiceByServiceId($seviceId){
        $service = ServiceModel::findOrFail($seviceId);

        return $service;
    }

    public function getAllServiceBySeller($seller){
        return ServiceModel::where('user_id', $seller->id)->get();
    }

    public function getServiceReviewByServiceId($serviceId){
        $orderId = Order::where('service_id', $serviceId)->pluck('id');

        $review = Review::whereIn('order_id', $orderId)->get();
        return $review;
    }

    public function getAllServicesByLoginUser(){
        $user = Auth::user();
        $services = ServiceModel::where('user_id', $user->id)->get();
        return $services;
    }

    public function createService($data){
        $user = Auth::user();
        $data['user_id'] = $user->id;
        $imagePath = $data['image_url']->store('service', 'public');
        $data['image_url'] = $imagePath;

        return ServiceModel::create( $data );
    }

    public function updateService($service, $data ){
        if (isset($data['image_url']) && $data['image_url']) {

        if ($service->image_url) {
            Storage::delete('public/' . $service->image_url);
        }

        $path = $data['image_url']->store('service', 'public');
        $data['image_url'] = $path;

        } else {
            unset($data['image_url']);
        }

        $service->update($data);
        return $service;

    }

    public function queryListService(array $filters = [])
    {
        $allowedFilters = [
           'services.title' => 'like',
           'services.service_category_id' => 'value',
           'services.price' => 'range',

        ];

        $selectColumns = [
           'services.*',
           'service_categories.name as category_name',


        ];

        $query = ServiceModel::select($selectColumns)
        ->join('service_categories', 'services.service_category_id', '=', 'service_categories.id')
        ->orderBy('services.id', 'desc');


        $query = $this->applyFilters($query, $filters, $allowedFilters);

        $query->with([
           'category'
        ]);

        return $query;
    }

    public function getListService(array $filters = [], int $perPage = null, int $page = null)
    {

        $query = $this->queryListService($filters);

        return $this->paginate($query, $perPage, $page);
    }

    public function buildFilters($request)
    {
        $filters = [];

        if ($request->filled('title')) {
            $filters['services.title'] = $request->input('title');
        }

        if ($request->filled('service_category_id')) {
            $filters['services.service_category_id'] = $request->input('service_category_id');
        }

        if ($request->filled('price_min') && $request->filled('price_max')) {
        $filters['services.price'] = [
            'min' => $request->input('price_min'),
            'max' => $request->input('price_max'),
        ];
        } elseif ($request->filled('price_min')) {
            // Jika hanya minimum price
            $filters['services.price'] = [
                'min' => $request->input('price_min'),
                'max' => 999999999, // atau nilai maksimum yang masuk akal
            ];
        } elseif ($request->filled('price_max')) {
            // Jika hanya maximum price
            $filters['services.price'] = [
                'min' => 0,
                'max' => $request->input('price_max'),
            ];
        }

        return $filters;
    }
}
