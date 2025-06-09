<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getAllProductByLoginUser();
        return view('web.seller.product.index', ['products' => $products]);
    }

    public function show() {}

    public function create()
    {
        $categories = ProductCategory::orderBy('name', 'asc')->get();
        return view('web.seller.product.create', ['categories' => $categories]);
    }

    public function edit(Product $product)
    {
        $categories = ProductCategory::orderBy('name', 'asc')->get();
        return view('web.seller.product.edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->all();
        DB::beginTransaction();

        try {
            $this->productService->updateProduct($product, $data);
            DB::commit();
            return redirect()->route('seller.product.index')->with('success', 'Produk berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal memperbarui produk: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();
        DB::beginTransaction();
        try {
            DB::commit();
            $this->productService->createProduct($data);
            return redirect()->route('seller.product.index')->with('success', 'Produk berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Gagal menambahkan produk: ' . $e->getMessage())
                ->withInput();
        }
    }
}
