<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Review;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\User;
use App\Services\MartService;
use App\Services\ProductService;
use App\Services\ServiceService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request as RequestPagination;
class HomeController extends Controller
{
    protected $productService;
    protected $serviceService;
    protected $martService;

    public function __construct(ProductService $productService, ServiceService $serviceService, MartService $martService)
    {
        $this->productService = $productService;
        $this->serviceService = $serviceService;
        $this->martService = $martService;
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

    public function indexService(Request $request){

        try {
        $filters = $this->serviceService->buildFilters($request);

        $perPage = 12;
        $page = $request->input('page', 1);

        $result = $this->serviceService->getListService($filters, $perPage, $page);
        $services = $result['data'];
        $services = new LengthAwarePaginator(
            $result['data'],
            $result['meta']['total'],
            $result['meta']['per_page'],
            $result['meta']['current_page'],
            ['path' => RequestPagination::url()]
        );
        $categories = ServiceCategory::orderBy('name', 'asc')->get();

        return view('web.customer.home.service.index', ['services' => $services, 'categories' => $categories, 'filters' => $filters]);
        } catch (\Throwable $th) {
            Log::error('Error fetching products: ' . $th->getMessage());
            return response()->json(['err' => $th->getMessage()], 500);
        }

    }

    public function showService(Service $service)
    {
        try {
            $review = $this->serviceService->getServiceReviewByServiceId($service->id);
            return view('web.customer.home.service.detail', [ 'service' => $service, 'review' => $review ]);

        } catch (\Throwable $th) {
            Log::error('Error fetching service category: ' . $th->getMessage());
            return response()->json(['err' => $th->getMessage()], 500);
        }
    }

    public function showSeller(User $seller){
        try {
            $mart = $this->martService->getMartBySellerId($seller->id);
            $products = $this->productService->getAllProductByMart($mart);
            $services = $this->serviceService->getAllServiceBySeller($seller);

            return view('web.customer.seller.detail', ['seller' => $seller, 'mart' => $mart, 'products' => $products, 'services' => $services]);
        } catch (\Throwable $th) {
            return response()->json(['err' => $th->getMessage()], 500);
        }

    }
}
