<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Transaction;
use App\Jobs\CancelExpiredTransaction; // Import Job yang sudah dibuat
use Illuminate\Support\Carbon; // Untuk manipulasi waktu
use Illuminate\Support\Facades\Log;

class CheckExpiredTransactions extends Command
{

    protected $signature = 'transactions:check-expired';


    protected $description = 'Checks for expired transactions and dispatches jobs to cancel them.';


    public function handle()
    {
        Log::info('Schedulle start');
        $this->info('Checking for expired transactions...');


        $transactionsToCancel = Transaction::where('payment_status', 'Pending')
        ->where('created_at', '<=', Carbon::now()->subHour())->get();
        Log::info($transactionsToCancel);

        if ($transactionsToCancel == null) {
            $this->info('No expired transactions found.');
            return Command::SUCCESS;
        }

         foreach ($transactionsToCancel as $transaction) {
            $this->info("Dispatching job for transaction ID: {$transaction->id}");
            CancelExpiredTransaction::dispatch($transaction->id);
        }

        Log::info( $transactionsToCancel);

        $this->info('Finished checking expired transactions.');
        return Command::SUCCESS;
    }


}
