<?php

namespace App\Services;

use App\Models\Mart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use App\Models\Service;

class ReviewService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function createReview($data){
        Review::create($data);
        $order = Order::findOrFail($data['order_id']);

        if ($order->type == 'Product') {
            $product = $order->product;
            $mart = $order->product->mart;
            $this->countProductReview($product->id, $data['rating']);
            $this->countMartReview($mart->id, $data['rating']);
        } else {
            $service = $order->service;
            $mart = $order->service->user->mart;
            $this->countServiceReview($service->id, $data['rating']);
            $this->countMartReview($mart->id, $data['rating']);
        }





    }

    private function countProductReview($productId, $rating){
        $product = Product::findOrFail($productId);
        $product->review_count = $product->review_count + 1;
        $product->total_rating = $product->total_rating + $rating;
        $product->average_rating = $product->total_rating / $product->review_count;
        $product->save();
    }

    private function countServiceReview($serviceId, $rating){
        $service = Service::findOrFail($serviceId);
        $service->review_count = $service->review_count + 1;
        $service->total_rating = $service->total_rating + $rating;
        $service->average_rating = $service->total_rating / $service->review_count;
        $service->save();
    }

    public function countMartReview($martId, $rating){
        $mart = Mart::findOrFail($martId);
        $mart->review_count = $mart->review_count + 1;
        $mart->total_rating = $mart->total_rating + $rating;
        $mart->average_rating = $mart->total_rating / $mart->review_count;
        $mart->save();
    }




}
