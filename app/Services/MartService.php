<?php

namespace App\Services;

use App\Models\Mart;
use App\Models\MartCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MartService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getMartCategories()
    {
       $categories = MartCategory::orderBy('name', 'asc')->get();
       return $categories;
    }

    public function getMartByLoginUser(){
        $user =Auth::user();
        $mart = Mart::where('user_id', $user->id)->first();
        return $mart;
    }

    public function getMartBySellerId($sellerId){

        $mart = Mart::where('user_id', $sellerId)->first();
        return $mart;
    }

    public function updateMart($mart, $data){

        if (isset($data['banner_url']) && $data['banner_url']) {

        if ($mart->banner_url) {
            Storage::delete('public/' . $mart->banner_url);
        }

        $path = $data['banner_url']->store('banner_url', 'public');
        $data['banner_url'] = $path;
    } else {
        unset($data['banner_url']);
    }



    $mart->update($data);
    }
}
