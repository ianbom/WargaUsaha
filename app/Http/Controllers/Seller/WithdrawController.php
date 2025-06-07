<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\WalletTransaction;
use App\Services\WalletService;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    protected $walletService;

    public function __construct(WalletService $walletService){
        $this->walletService = $walletService;
    }
    public function index(){
        $withdrawTransaction = $this->walletService->getAllWithdrawTransactionByLoginUser();
        return view('web.seller.withdraw.index', ['withdrawTransaction' => $withdrawTransaction]);
    }

    public function show(WalletTransaction $withdraw){
        return view('web.seller.withdraw.detail',['withdraw' => $withdraw]);
    }
}
