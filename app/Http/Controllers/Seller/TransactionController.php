<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Jobs\WhatsappJob;
use App\Models\GroupOrder;
use App\Models\Order;
use App\Services\TransactionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    protected $transactionService;

    public function __construct(TransactionService $transactionService){
        $this->transactionService = $transactionService;
    }

    public function index(){


    }
    public function indexProduct(){
        $orders = $this->transactionService->getGroupOrderByLoginSeller();

        return view('web.seller.transaction.index_product', ['orders' => $orders]); // sebener e iki nde index.product ngebug

    }

    public function indexService(){
        $orders = $this->transactionService->getServiceOrderByLoginSeller();
        return view('web.seller.transaction.index_service', ['orders' => $orders]);
    }



    public function show(GroupOrder $transaction){
        return view('web.seller.transaction.detail', ['groupOrder'=> $transaction]);
    }

    public function shipOrder(GroupOrder $groupOrder){
        DB::beginTransaction();
        try {
            $groupOrder->update([
                'order_status' => 'Shipped',
                'shipped_at' => now()
            ]);

        WhatsappJob::dispatch(
    $groupOrder->user->phone, // Nomor telepon pembeli
    "🚚 *Pesanan Kamu Sedang Dikirim!* 🎉

    Halo *{$groupOrder->user->name}*, ada kabar gembira! Pesanan kamu dengan kode *{$groupOrder->code_group_order}* sedang dalam perjalanan.

    🛍️ *Detail Pesanan:*
       Kode Order: *{$groupOrder->code_group_order}*
       Total Pembayaran: *Rp " . number_format($groupOrder->total_price, 0, ',', '.') . "*
       Mart: *{$groupOrder->mart->name }*

    Kami akan segera memberikan pembaruan jika pesanan sudah mendekati lokasi kamu. Mohon bersabar ya!

    Terima kasih telah berbelanja di *WargaUsaha*! 🌟
    Lacak pesanan kamu atau cek riwayat pembelian di: https://wargausaha.ianianale.shop/my-orders

    Salam hangat,
    Tim WargaUsaha 💼"
    );
            DB::commit();
            return redirect()->back()->with('success','Pesanan diantarkan');
        } catch (\Exception $th) {
            DB::rollBack();
           return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function showService(Order $order){

        // dd($order->service);
        return view('web.seller.transaction.detail_service', ['order'=> $order]);
    }



}
