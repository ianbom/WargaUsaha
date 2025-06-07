<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;
    public function __construct(ProductService $productService){
        $this->productService = $productService;
    }

    public function index(){
        $products = Product::orderBy('name', 'asc')->get();
        return view( 'web.admin.product.index',['products' => $products]);
    }

    public function show(Product $product){
        $reviews = $this->productService->getProductReviewByProductId($product->id);
        return view('web.admin.product.detail', ['product' => $product, 'reviews' => $reviews]);
    }
}
