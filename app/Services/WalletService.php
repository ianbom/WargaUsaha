<?php

namespace App\Services;

use App\Models\LogWallet;
use App\Models\SellerWallet;
use App\Models\WalletTransaction;
use Exception;
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
        $adminFee = 2000;
        $wallet = $this->getWalletByUser($user_id);
        $wallet->increment('amount', $amount);
        $wallet->decrement('amount', $adminFee);
        return $wallet;
    }

    public function decreamentWallet($amount, $user_id)
    {
        $wallet = $this->getWalletByUser($user_id);
        $wallet->decrement('amount', $amount);
        return $wallet;
    }

    public function createWithdrawTransaction($data){
        $user = Auth::user();
        $wallet = $this->getWalletByUser($user->id);

        if ($wallet->amount < $data['amount']) {
            throw new Exception('Jumlah penarikan melebihi saldo');
        }

        $wallet->update([
            'amount' => $wallet->amount - $data['amount']
        ]);

        $data['seller_wallet_id'] = $wallet->id;
        $data['bank_name'] = $wallet->bank_name;
        $data['account_number'] = $wallet->account_number;
        $data['account_name'] = $wallet->account_name;
        $data['status'] = 'Pending';

        $walletTransaction = WalletTransaction::create($data);

        LogWallet::create([
            'user_id' => $user->id,
            'seller_walet_id' => $wallet->id,
            'amount' => $walletTransaction->amount,
            'type' => 'decreament',
            'status' => 'Success',
            'title' => 'Penarikan Uang'
        ]);
        return $walletTransaction;
    }

    public function getAllWithdrawTransactionByLoginUser(){
        $user = Auth::user();
        $wallet = $user->sellerWallet;
        $withdrawTransacton = WalletTransaction::where('seller_wallet_id', $wallet->id)->get();
        return $withdrawTransacton;
    }

}
