<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\MartRegistrationRequest;
use App\Models\Mart;
use App\Models\MartCategory;
use Exception;
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
        if($user->mart){
           throw new Exception('Anda sudah memiliki toko');
        }

        $data['user_id'] = $user->id;
        $pathBanner = $data['banner_url']->store('banner_url', 'public');
        $data['banner_url'] = $pathBanner;

        Mart::create($data);
        DB::commit();
        return redirect()->back()->with('success','Registrasi toko berhasil');
        } catch (\Exception $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
