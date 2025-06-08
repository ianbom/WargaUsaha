<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WalletTransaction;
use App\Services\WithdrawService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WithdrawController extends Controller
{
    protected $withdrawService;

    public function __construct(WithdrawService $withdrawService){
        $this->withdrawService = $withdrawService;
    }

    public function index(){
        $withdrawTransaction = $this->withdrawService->getAllWithdrawTransaction();
        return view('web.admin.withdraw.index', ['withdrawTransaction' => $withdrawTransaction]);

    }

    public function show(WalletTransaction $withdraw){
        $user = $withdraw->sellerWallet->user;
        return view('web.admin.withdraw.detail', ['withdraw' => $withdraw, 'user' => $user]);
    }

    public function update(Request $request, WalletTransaction $withdraw){

        DB::beginTransaction();
        try {
            $this->withdrawService->updateStatusWithdraw($withdraw, $request->status);
            DB::commit();
            return redirect()->back()->with('success','Berhasil diupdate');
    } catch (\Throwable $th) {
        DB::rollBack();
        return response()->json(['err' => $th->getMessage()],500);
    }
    }
}
