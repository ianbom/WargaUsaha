<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Services\ProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    protected $profileService;
    public function __construct(ProfileService $profileService){
        $this->profileService = $profileService;
    }

    public function index(){
        $user = Auth::user();
        return view('web.seller.profile.index', ['user' => $user]);
    }

    public function show(){
        $user = Auth::user();
        return view('web.seller.profile.edit', ['user'=> $user]);
    }

    public function update(ProfileRequest $request){
        $data = $request->all();
        $user = Auth::user();

        DB::beginTransaction();
        try {
            $this->profileService->updateProfile($data, $user);
            DB::commit();
            return redirect()->back()->with('success','Profile berhasil diubah');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

}
