<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mart;
use App\Models\User;
use App\Services\MartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MartController extends Controller
{
    protected $martService;

    public function __construct(MartService $martService)
    {
        $this->martService = $martService;
    }

    public function index(){
        $marts = Mart::orderBy('name', 'asc')->where('is_verified', true)->get();
        return view('web.admin.mart.index', ['marts' => $marts]);
    }

    public function registration(){
        $martRegistrations = $this->martService->getAllMartRegistration();
        return view('web.admin.mart.registration', ['martRegistrations' => $martRegistrations]);
    }

    public function show(Mart $mart){

        return view('web.admin.mart.detail', ['mart' => $mart]);
    }

    public function acceptMartRegistration(Mart $mart){
       DB::beginTransaction();

        try {
            $this->martService->acceptOrRejectMartRegistration($mart, true, false);
            DB::commit();
            return redirect()->back()->with('success','Toko berhasil diverifikasi');
       } catch (\Throwable $th) {
        DB::rollBack();
        return redirect()->back()->with('error', $th->getMessage());
       }

    }

    public function rejectMartRegistration(Mart $mart){
       DB::beginTransaction();
        try {
            $this->martService->acceptOrRejectMartRegistration($mart, false, null);
            DB::commit();
            return redirect()->back()->with('success','Verifikasi toko ditolak');
       } catch (\Throwable $th) {
        DB::rollBack();
        return redirect()->back()->with('error', $th->getMessage());
       }

    }


}
