<?php

namespace App\Services;

use App\Models\LogWallet;
use App\Models\WalletTransaction;

class WithdrawService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getAllWithdrawTransaction(){
        $withdrawTransactions = WalletTransaction::orderBy("created_at","desc")->get();
        return $withdrawTransactions;
    }

    public function updateStatusWithdraw($withdraw, $status){

        if ($status == 'Accepted') {
            $withdraw->update([
                'status' => 'Accepted',
                'withdraw_accepted_date' => now(),
            ]);
        }

        if ($status == 'Rejected') {
            $withdraw->update([
                'status' => 'Rejected',
                'withdraw_rejected_date' => now(),
            ]);
        }

    }
}
