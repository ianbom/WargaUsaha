<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductService extends Service
{
    protected $martService;
    public function __construct(MartService $martService)
    {
        $this->martService = $martService;
    }

    public function getAllProductByLoginUser(): Collection
    {
        $mart = $this->martService->getMartByLoginUser();
        $product = Product::where('mart_id', $mart->id)->get();
        return $product;
    }

    public function getAllProductByMart($mart)
    {

        return Product::where('mart_id', $mart->id)->get();
    }

    public function getAllProduct()
    {
        $product = Product::all();
        return $product;
    }

    public function getProductById($id)
    {
        $product = Product::findOrFail($id);
        if (!$product) {
            return null; // or throw an exception
        }
        return $product;
    }

    public function getProductReviewByProductId($productId)
    {
        $orderId = Order::where('product_id', $productId)->pluck('id');

        $review = Review::whereIn('order_id', $orderId)->get();
        return $review;
    }

    public function updateProduct($product, $data)
    {

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

        return Product::create($data);
    }

   public function queryListProduct(array $filters = [])
{
    $allowedFilters = [
        'products.name' => 'like',
        'products.product_category_id' => 'value',
        'products.price' => 'range',
        'marts.is_active' => 'value',
        'users.ward_id' => 'value',
        'users.id' => 'not_value',
    ];

    $selectColumns = [
        'products.*',
        'product_categories.name as category_name',
        'marts.name as mart_name',
        'users.name as user_name',
        'users.id as user_id',
        'ward_id'
    ];

    $query = Product::select($selectColumns)
        ->join('product_categories', 'products.product_category_id', '=', 'product_categories.id')
        ->join('marts', 'products.mart_id', '=', 'marts.id')
        ->join('users', 'marts.user_id', '=', 'users.id') // Perbaikan di sini
        ->orderBy('products.id', 'desc');

    $query = $this->applyFilters($query, $filters, $allowedFilters);

    $query->with([
        'category'
    ]);

    return $query;
}

    public function getListProduct(array $filters = [], int $perPage = null, int $page = null)
    {

        $query = $this->queryListProduct($filters);

        return $this->paginate($query, $perPage, $page);
    }

    public function buildFilters($request)
    {
        $filters = [];
        $user = Auth::user();

        if ($user && $user->id) {
        $filters['users.id'] = $user->id; // <-- Perubahan di sini
    }

        if ($request->filled('name')) {
            $filters['products.name'] = $request->input('name');
        }



        if ($request->filled('ward_id')) {
            $filters['users.ward_id'] = $request->input('ward_id');
        }

        if ($request->filled('product_category_id')) {
            $filters['products.product_category_id'] = $request->input('product_category_id');
        }

        if ($request->filled('price_min') && $request->filled('price_max')) {
            $filters['products.price'] = [
                'min' => $request->input('price_min'),
                'max' => $request->input('price_max'),
            ];
        } elseif ($request->filled('price_min')) {
            // Jika hanya minimum price
            $filters['products.price'] = [
                'min' => $request->input('price_min'),
                'max' => 999999999, // atau nilai maksimum yang masuk akal
            ];
        } elseif ($request->filled('price_max')) {
            // Jika hanya maximum price
            $filters['products.price'] = [
                'min' => 0,
                'max' => $request->input('price_max'),
            ];
        }

        $filters['marts.is_active'] = true;

        return $filters;
    }
}
