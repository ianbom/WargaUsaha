<?php

namespace App\Service;

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
    }
}
