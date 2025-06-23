<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Review;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\User;
use App\Models\JobVacancy;
use App\Models\JobVacancyCategory;
use App\Models\Ward;
use App\Services\MartService;
use App\Services\ProductService;
use App\Services\ServiceService;
use App\Services\JobVacancyService;
use Illuminate\Contracts\Queue\Job;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request as RequestPagination;

class HomeController extends Controller
{
    protected $productService;
    protected $serviceService;
    protected $martService;
    protected $jobVacancyService;

    public function __construct(ProductService $productService, ServiceService $serviceService, MartService $martService, JobVacancyService $jobVacancyService)
    {
        $this->productService = $productService;
        $this->serviceService = $serviceService;
        $this->martService = $martService;
        $this->jobVacancyService = $jobVacancyService;
    }

    public function index()
    {
        $categories = ProductCategory::all();
        $products = $this->productService->getAllProduct();

        $user = Auth::user();




        return view('web.customer.home.index', ['products' => $products, 'categories' => $categories]);
    }
    public function indexProduct(Request $request)
    {
        $user = Auth::user();
        try {
            $filters = $this->productService->buildFilters($request);
            $perPage = 12;
            $page = $request->input('page', 1);

            $userLat = $user->location_lat;
            $userLong = $user->location_long;

            $result = $this->productService->getListProduct($filters, $perPage, $page);
            $products = $result['data'];
            // dd($products);
            $products = new LengthAwarePaginator(
                $result['data'],
                $result['meta']['total'],
                $result['meta']['per_page'],
                $result['meta']['current_page'],
                ['path' => RequestPagination::url()]
            );
            $categories = ProductCategory::orderBy('name', 'asc')->get();
            $wards = Ward::orderBy('name', 'asc')->get();
            return view('web.customer.home.product.index', [
                'products' => $products, 'categories' => $categories, 'filters' => $filters, 'wards' => $wards]);
        } catch (\Throwable $th) {
            Log::error('Error fetching products: ' . $th->getMessage());
            return response()->json(['err' => $th->getMessage()], 500);
        }
    }
    public function showProduct(Product $product)
    {
        try {
            $review = $this->productService->getProductReviewByProductId($product->id);
            return view('web.customer.home.product.detail', ['product' => $product, 'review' => $review]);
        } catch (\Throwable $th) {
            return response()->json(['err' => $th->getMessage()], 500);
        }
    }

    public function indexService(Request $request)
    {

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
            $wards = Ward::orderBy('name', 'asc')->get();
            return view('web.customer.home.service.index', ['services' => $services, 'categories' => $categories, 'filters' => $filters, 'wards' => $wards]);
        } catch (\Throwable $th) {
            Log::error('Error fetching products: ' . $th->getMessage());
            return response()->json(['err' => $th->getMessage()], 500);
        }
    }

    public function showService(Service $service)
    {
        try {
            $review = $this->serviceService->getServiceReviewByServiceId($service->id);
            // return response()->json(['rev' => $review]);
            return view('web.customer.home.service.detail', ['service' => $service, 'review' => $review]);
        } catch (\Throwable $th) {
            Log::error('Error fetching service category: ' . $th->getMessage());
            return response()->json(['err' => $th->getMessage()], 500);
        }
    }
    public function indexJobVacancy(Request $request)
    {
        try {
            $filters = $this->jobVacancyService->buildFilters($request);
            $perPage = 12;
            $page = $request->input('page', 1);
            $result = $this->jobVacancyService->getListJobVacancy($filters, $perPage, $page);
            $job = $result['data'];
            $job = new LengthAwarePaginator(
                $result['data'],
                $result['meta']['total'],
                $result['meta']['per_page'],
                $result['meta']['current_page'],
                ['path' => RequestPagination::url()]
            );
            $job_categories = JobVacancyCategory::orderBy('category_name', 'asc')->get();
            return view('web.customer.home.job.index', [
                'job' => $job,
                'job_categories' => $job_categories,
                'filters' => $filters
            ]);
        } catch (\Throwable $th) {
            Log::error('Error fetching job vacancies: ' . $th->getMessage());
            return response()->json(['err' => $th->getMessage()], 500);
        }
    }
    public function showJobVacancy(JobVacancy $job)
    {
        $job->load('jobApplications');
        return view('web.customer.home.job.detail', ['job' => $job]);
    }
    public function showSeller(User $seller)
    {
        try {
            $mart = $this->martService->getMartBySellerId($seller->id);
            $products = $this->productService->getAllProductByMart($mart);
            $services = $this->serviceService->getAllServiceBySeller($seller);
            $jobs = $this->jobVacancyService->getAllJobByEmployer($seller);
            return view('web.customer.seller.detail', [
                'seller' => $seller,
                'mart' => $mart,
                'products' => $products,
                'services' => $services,
                'jobs' => $jobs
            ]);
        } catch (\Throwable $th) {
            // return redirect()->back()->with('error', $th->getMessage());
            return response()->json(['err' => $th->getMessage()], 500);
        }
    }

    public function showSellerProduct(User $seller)
    {
        try {
            $mart = $this->martService->getMartBySellerId($seller->id);
            $products = $this->productService->getAllProductByMart($mart);
            $services = $this->serviceService->getAllServiceBySeller($seller);

            return view('web.customer.seller.product', ['seller' => $seller, 'mart' => $mart, 'products' => $products, 'services' => $services]);
        } catch (\Throwable $th) {
            return response()->json(['err' => $th->getMessage()], 500);
        }
    }

    public function showSellerService(User $seller)
    {
        try {
            $mart = $this->martService->getMartBySellerId($seller->id);
            $products = $this->productService->getAllProductByMart($mart);
            $services = $this->serviceService->getAllServiceBySeller($seller);

            return view('web.customer.seller.service', ['seller' => $seller, 'mart' => $mart, 'products' => $products, 'services' => $services]);
        } catch (\Throwable $th) {
            return response()->json(['err' => $th->getMessage()], 500);
        }
    }
    public function showSellerJob(User $seller)
    {
        try {
            $mart = $this->martService->getMartBySellerId($seller->id);
            $products = $this->productService->getAllProductByMart($mart);
            $jobs = $this->jobVacancyService->getAllJobByEmployer($seller);
            return view('web.customer.seller.job', [
                'seller' => $seller,
                'mart' => $mart,
                'products' => $products,
                'jobs' => $jobs
            ]);
        } catch (\Throwable $th) {
            return response()->json(['err' => $th->getMessage()], 500);
        }
    }
    public function showCart()
    {
        return view('web.customer.cart.index');
    }
}
