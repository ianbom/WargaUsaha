<?php

namespace App\Jobs;

use App\Models\Transaction;
use App\Models\Product; // Asumsikan Anda punya model Product
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB; // Untuk transaksi database

class CancelExpiredTransaction implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $transactionId;

    /**
     * Create a new job instance.
     *
     * @param int $transactionId
     * @return void
     */
    public function __construct(int $transactionId)
    {
        $this->transactionId = $transactionId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        // Temukan transaksi berdasarkan ID
        $transaction = Transaction::find($this->transactionId);

        // Periksa apakah transaksi ditemukan dan belum dibayar atau dibatalkan
        if (!$transaction || $transaction->payment_status === 'paid' || $transaction->payment_status === 'cancelled') {
            Log::info("Transaction {$this->transactionId} is not eligible for cancellation (not found, already paid, or cancelled).");
            return;
        }

        // Lakukan pembatalan dan pengembalian stok dalam satu transaksi database
        DB::transaction(function () use ($transaction) {
            try {
                // Perbarui status transaksi menjadi 'cancelled'
                $transaction->update([
                    'payment_status' => 'Cancelled',
                    'cancelled_at' => now(),
                    'fraud_status' => 'expire', // Opsional, bisa disesuaikan
                ]);

                foreach ($transaction->groupOrders as $groupOrder) {

                    $groupOrder->update([
                        'order_status' => 'Cancelled',
                        'cancelled_at' => now(),
                    ]);

                    foreach ($groupOrder->orders as $order) {

                        $order->update([
                        'order_status' => 'Cancelled',
                        'cancelled_at' => now(),
                        ]);

                        $product = Product::find($order->product_id);
                        if ($product) {
                            $product->increment('stock', $order->quantity);
                            Log::info("Stock for Product ID {$product->id} incremented by {$order->quantity} (Transaction {$transaction->id}).");
                        }
                    }
            }

                Log::info("Transaction {$transaction->id} cancelled and stock returned successfully.");

            } catch (\Exception $e) {

                Log::error("Failed to cancel transaction {$transaction->id} or return stock: " . $e->getMessage());
                throw $e;
            }
        });
    }

    /**
     * Handle a job failure.
     *
     * @param  \Throwable  $exception
     * @return void
     */
    public function failed(\Throwable $exception): void
    {
        Log::error("CancelExpiredTransaction Job failed for transaction ID {$this->transactionId}: " . $exception->getMessage());
        // Anda bisa menambahkan notifikasi (misal ke Slack atau email admin) di sini
    }
}
