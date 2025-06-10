<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Order;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Services\ServiceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    protected $serviceService;
    public function __construct(ServiceService $serviceService){
        $this->serviceService = $serviceService;
    }

    public function index(){
        $services = $this->serviceService->getAllServicesByLoginUser();
        return view('web.seller.service.index', ['services' => $services]);
    }

    public function create(){
        $categories = ServiceCategory::orderBy('name', 'asc')->get();
        return view('web.seller.service.create', ['categories' => $categories]);
    }

    public function store(ServiceRequest $request){
        $data = $request->all();

        DB::beginTransaction();
        try {
            $service = $this->serviceService->createService($data);
            DB::commit();
            return redirect()->route('seller.service.index')->with('success', 'Layanan berhasil dibuat');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                             ->with('error', 'Gagal membuat layanan: ' . $e->getMessage())
                             ->withInput();
        }
    }

    public function edit(Service $service){
        $categories = ServiceCategory::orderBy('name', 'asc')->get();
        return view('web.seller.service.edit', ['service' => $service, 'categories' => $categories]);
    }

    public function update(ServiceRequest $request, Service $service){
        $data = $request->all();
        DB::beginTransaction();

        try {
            $this->serviceService->updateService($service, $data);
            DB::commit();
            return redirect()->route('seller.service.index')->with('success', 'Layanan berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                             ->with('error', 'Gagal memperbarui produk: ' . $e->getMessage())
                             ->withInput();
        }

    }

    public function acceptServiceOrder(Order $order){
        try {
            $order->update([
            'on_processed_at' => now(),
            'order_status' => 'On-Proses'
        ]);
        return redirect()->back()->with('success','Pesanan layanan disetujui');
        } catch (\Throwable $th) {
           return redirect()->back()
                             ->with('error', 'Terjadi kesalahan');

        }

    }

       public function cancelServiceOrder(Order $order){
        DB::beginTransaction();
         try {
            $order->update([
            'cancelled_at' => now(),
            'order_status' => 'Cancelled'
        ]);
        DB::commit();
        return redirect()->back()->with('success','Pesanan layanan ditolak');
        } catch (\Throwable $th) {
           DB::rollBack();
            return redirect()->back()
                             ->with('error', 'Terjadi kesalahan');
        }


    }


}
