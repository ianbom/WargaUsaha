<?php

namespace App\Services;

use App\Models\Service;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ServiceService
{
    public function __construct()
    {
        //
    }

    public function getAllServicesByLoginUser(){
        $user = Auth::user();
        $services = Service::where('user_id', $user->id)->get();
        if ($services->isEmpty()) {
            throw new Exception('No services found for the current user.');
        }
        return $services;
    }

    public function createService($data){
        $user = Auth::user();
        $data['user_id'] = $user->id;
        $imagePath = $data['image_url']->store('service', 'public');
        $data['image_url'] = $imagePath;

        return Service::create( $data );
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
}
