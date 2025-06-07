<?php

namespace App\Services;

use App\Models\Mart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;

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
        $product = $order->product;
        $mart = $order->product->mart;

        $this->countProductReview($product->id, $data['rating']);
        $this->countMartReview($mart->id, $data['rating']);

         return response()->json([
            'order' => $order,
            'product'=> $product,
            'mart' => $mart
        ]);

    }

    private function countProductReview($productId, $rating){
        $product = Product::findOrFail($productId);
        $product->review_count = $product->review_count + 1;
        $product->total_rating = $product->total_rating + $rating;
        $product->average_rating = $product->total_rating / $product->review_count;
        $product->save();
    }

    public function countMartReview($martId, $rating){
        $mart = Mart::findOrFail($martId);
        $mart->review_count = $mart->review_count + 1;
        $mart->total_rating = $mart->total_rating + $rating;
        $mart->average_rating = $mart->total_rating / $mart->review_count;
        $mart->save();
    }




}
