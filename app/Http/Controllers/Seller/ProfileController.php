<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\LogWallet;
use App\Models\Ward;
use App\Services\ProfileService;
use App\Services\WalletService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    protected $profileService;
    protected $walletService;
    public function __construct(ProfileService $profileService, WalletService $walletService){
        $this->profileService = $profileService;
        $this->walletService = $walletService;
    }

    public function index(){
        $user = Auth::user();
        return view('web.seller.profile.index', ['user' => $user]);
    }

    public function show(){
        $user = Auth::user();
        $wallet = $this->walletService->getWalletByLoginUser();
        $wards = Ward::orderBy('name', 'asc')->get();
        $logWalletTransaction = LogWallet::where('user_id', $user->id)->limit(3)->orderBy('created_at','desc')->get();
        return view('web.seller.profile.edit', ['user'=> $user, 'wallet' => $wallet, 'wards' => $wards, 'logWalletTransaction' => $logWalletTransaction]);
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
