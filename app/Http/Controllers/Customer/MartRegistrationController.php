<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\MartRegistrationRequest;
use App\Models\Mart;
use App\Models\MartCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MartRegistrationController extends Controller
{
    public function create(){
        $categories = MartCategory::orderBy('name', 'asc')->get();
        return view('web.customer.mart_registration.create', ['categories' => $categories]);
    }

    public function store(MartRegistrationRequest $request){
        $data = $request->all();
        $user = Auth::user();
        DB::beginTransaction();
        try {
             $data['user_id'] = $user->id;
        Mart::create($data);
        DB::commit();
        return redirect()->back()->with('success','Registrasi toko berhasil');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan');
        }
    }
}
