<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\MartRequest;
use App\Models\Mart;
use App\Services\MartService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MartController extends Controller
{
    protected $martService;
    protected $productService;
    public function __construct(MartService $martService, ProductService $productService){
        $this->martService = $martService;
        $this->productService = $productService;
    }

    public function index(){
        $mart = $this->martService->getMartByLoginUser();
        $products = $this->productService->getAllProductByMart($mart);
        $user = Auth::user();
        return view('web.seller.mart.index', ['mart' => $mart,
        'user' => $user,
        'products' => $products]);

    }

    public function show(){
        $mart = $this->martService->getMartByLoginUser();
        $categories = $this->martService->getMartCategories();
        return view('web.seller.mart.edit', ['mart'=> $mart, 'categories' => $categories]);
    }

    public function update(MartRequest $request){
        $data = $request->all();
        $mart = $this->martService->getMartByLoginUser();

        DB::beginTransaction();
        try {
            $this->martService->updateMart($mart, $data);
            DB::commit();
            return redirect()->back()->with('success','Mart updated successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
