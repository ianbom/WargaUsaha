<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\WalletRequest;
use App\Models\SellerWallet;
use App\Services\WalletService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WalletController extends Controller
{
    protected $walletService;
    public function __construct(WalletService $walletService){
        $this->walletService = $walletService;
    }

    public function update(WalletRequest $request, SellerWallet $wallet){
        $data = $request->all();

        DB::beginTransaction();
        try {
            $this->walletService->updateWallet($wallet, $data);
        DB::commit();
        return redirect()->back()->with('success', 'Wallet updated successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to update wallet');

        }
    }
}
