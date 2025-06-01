<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    protected $martService;
    public function __construct(MartService $martService){
        $this->martService = $martService;
    }

    public function getAllProductByLoginUser(): Collection{
        $mart = $this->martService->getMartByLoginUser();
        $product = Product::where('mart_id', $mart->id)->get();

        // if ($product->isEmpty()) {
        //    throw new Exception('No products found for the current user\'s mart.');
        // }

        return $product;
    }

    public function getAllProduct(){
        $product = Product::all();
        return $product;
    }

    public function getProductById($id){
        $product = Product::findOrFail($id);
        if (!$product) {
            return null; // or throw an exception
        }
        return $product;
    }

    public function getProductReviewByProductId($productId){
        $orderId = Order::where('product_id', $productId)->pluck('id');

        $review = Review::whereIn('order_id', $orderId)->get();
        return $review;
    }

    public function updateProduct($product, $data){

        if (isset($data['image_url']) && $data['image_url']) {

        if ($product->image_url) {
            Storage::delete('public/' . $product->image_url);
        }

        $path = $data['image_url']->store('products', 'public');
        $data['image_url'] = $path;

        } else {
            unset($data['image_url']);
        }

        $product->update($data);
        return $product;

    }

     public function createProduct(array $data)
    {
        $imagePath = $data['image_url']->store('products', 'public');

        $mart = $this->martService->getMartByLoginUser();
        $data['image_url'] = $imagePath;
        $data['mart_id'] = $mart->id;

        return Product::create( $data );
    }


}
