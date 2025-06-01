<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use App\Services\ProductService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getAllProduct();
        return view('web.customer.home.index', ['products' => $products]);
    }

    public function showProduct(Product $product){
        try {
           $review = $this->productService->getProductReviewByProductId($product->id);
        return view('web.customer.home.product.detail', ['product'=> $product, 'review' => $review]);
        } catch (\Throwable $th) {
           return response()->json(['err' => $th->getMessage()], 500);
        }

    }
}
