<?php

namespace App\Services;

use App\Models\SellerWallet;
use Illuminate\Support\Facades\Auth;

class WalletService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getWalletByLoginUser(){
        $user = Auth::user();
        $wallet = SellerWallet::where('user_id', $user->id)->first();
        if (!$wallet) {
            $wallet = SellerWallet::create([
                'user_id' => $user->id,
                'amount' => 0,
            ]);
        }
        return $wallet;
    }

    public function getWalletByUser($user_id){
        $wallet = SellerWallet::where('user_id', $user_id)->first();

        return $wallet;
    }

    public function updateWallet($wallet, $data)
    {
        $wallet->update($data);
        return $wallet;

    }

    public function increamentWallet($amount, $user_id)
    {
        $wallet = $this->getWalletByUser($user_id);
        $wallet->increment('amount', $amount);
        return $wallet;
    }

    public function decreamentWallet($amount, $user_id)
    {
        $wallet = $this->getWalletByUser($user_id);
        $wallet->decrement('amount', $amount);
        return $wallet;
    }
}
