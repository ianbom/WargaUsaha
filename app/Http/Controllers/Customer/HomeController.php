<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Review;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request as RequestPagination;
class HomeController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {   $categories = ProductCategory::all();
        $products = $this->productService->getAllProduct();
        return view('web.customer.home.index', ['products' => $products, 'categories' => $categories]);
    }

    public function showProduct(Product $product){
        try {
           $review = $this->productService->getProductReviewByProductId($product->id);
        return view('web.customer.home.product.detail', ['product'=> $product, 'review' => $review]);
        } catch (\Throwable $th) {
           return response()->json(['err' => $th->getMessage()], 500);
        }
    }

    public function indexProduct(Request $request){


        try {
        $filters = $this->productService->buildFilters($request);

        $perPage = 12;
        $page = $request->input('page', 1);

        $result = $this->productService->getListProduct($filters, $perPage, $page);
        $products = $result['data'];
        $products = new LengthAwarePaginator(
            $result['data'],
            $result['meta']['total'],
            $result['meta']['per_page'],
            $result['meta']['current_page'],
            ['path' => RequestPagination::url()]
        );
        $categories = ProductCategory::orderBy('name', 'asc')->get();


        return view('web.customer.home.product.index', ['products' => $products, 'categories' => $categories, 'filters' => $filters]);
        } catch (\Throwable $th) {
            Log::error('Error fetching products: ' . $th->getMessage());
            return response()->json(['err' => $th->getMessage()], 500);
        }

    }
}
