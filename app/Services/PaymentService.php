<?php

namespace App\Services;

use App\Models\Transaction;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class PaymentService
{
    private $serverKey;
    private $isProduction;

    public function __construct()
    {
        $this->serverKey = config('midtrans.server_key');
        $this->isProduction = config('midtrans.is_production', false);
    }

    /**
     * Cek status pembayaran dari Midtrans API
     */
    public function checkPaymentStatus($transactionCode)
    {
        try {
            $transaction = Transaction::where('transaction_code', $transactionCode)->first();

            if (!$transaction) {
                return [
                    'success' => false,
                    'message' => 'Transaction not found',
                    'data' => null
                ];
            }

            // Jika sudah paid, tidak perlu cek lagi
            if ($transaction->payment_status === 'paid') {
                return [
                    'success' => true,
                    'message' => 'Payment already completed',
                    'data' => $transaction
                ];
            }

            // Panggil API Midtrans untuk cek status
            $midtransResponse = $this->getMidtransStatus($transactionCode);

            if (!$midtransResponse['success']) {
                return $midtransResponse;
            }

            // Update status berdasarkan response Midtrans
            $updatedTransaction = $this->updateTransactionStatus($transaction, $midtransResponse['data']);

            return [
                'success' => true,
                'message' => 'Status checked successfully',
                'data' => $updatedTransaction
            ];

        } catch (\Exception $e) {
            Log::error('Error checking payment status: ' . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Error checking payment status',
                'data' => null
            ];
        }
    }

    /**
     * Panggil API Midtrans untuk mendapatkan status transaksi
     */
    private function getMidtransStatus($transactionCode)
    {
        try {
            $baseUrl = $this->isProduction
                ? 'https://api.midtrans.com/v2'
                : 'https://api.sandbox.midtrans.com/v2';

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => 'Basic ' . base64_encode($this->serverKey . ':')
            ])->get("{$baseUrl}/{$transactionCode}/status");

            if ($response->successful()) {
                return [
                    'success' => true,
                    'data' => $response->json()
                ];
            }

            return [
                'success' => false,
                'message' => 'Failed to get status from Midtrans',
                'data' => null
            ];

        } catch (\Exception $e) {
            Log::error('Midtrans API Error: ' . $e->getMessage());
            return [
                'success' => false,
                'message' => 'Midtrans API connection error',
                'data' => null
            ];
        }
    }

    /**
     * Update status transaksi berdasarkan response Midtrans
     */
    private function updateTransactionStatus($transaction, $midtransData)
    {
        $transactionStatus = $midtransData['transaction_status'] ?? '';
        $fraudStatus = $midtransData['fraud_status'] ?? '';
        $paymentType = $midtransData['payment_type'] ?? '';
        $acquirer = $midtransData['acquirer'] ?? '';

        $updateData = [
            'gateway_response' => $midtransData,
            'payment_method' => $paymentType,
            'acquirer' => $acquirer,
            'fraud_status' => $fraudStatus,
        ];

        // Tentukan status pembayaran berdasarkan transaction_status
        switch ($transactionStatus) {
            case 'capture':
                if ($fraudStatus == 'challenge') {
                    $updateData['payment_status'] = 'challenge';
                } else if ($fraudStatus == 'accept') {
                    $updateData['payment_status'] = 'paid';
                    $updateData['paid_at'] = Carbon::now();
                }
                break;

            case 'settlement':
                $updateData['payment_status'] = 'paid';
                $updateData['paid_at'] = Carbon::now();
                break;

            case 'pending':
                $updateData['payment_status'] = 'pending';
                break;

            case 'deny':
                $updateData['payment_status'] = 'failed';
                break;

            case 'expire':
                $updateData['payment_status'] = 'expired';
                $updateData['expired_at'] = Carbon::now();
                break;

            case 'cancel':
                $updateData['payment_status'] = 'cancelled';
                $updateData['cancelled_at'] = Carbon::now();
                break;

            case 'failure':
                $updateData['payment_status'] = 'failed';
                break;

            default:
                $updateData['payment_status'] = 'unknown';
        }

        $transaction->update($updateData);
        return $transaction->fresh();
    }

    /**
     * Cek multiple transactions yang masih pending
     */
    public function checkPendingTransactions($limit = 50)
    {
        $pendingTransactions = Transaction::where('payment_status', 'pending')
            ->where('created_at', '>=', Carbon::now()->subHours(24))
            ->limit($limit)
            ->get();

        $results = [];

        foreach ($pendingTransactions as $transaction) {
            $result = $this->checkPaymentStatus($transaction->transaction_code);
            $results[] = [
                'transaction_code' => $transaction->transaction_code,
                'old_status' => $transaction->payment_status,
                'new_status' => $result['data']->payment_status ?? 'unknown',
                'success' => $result['success']
            ];

            // Delay untuk menghindari rate limiting
            usleep(100000); // 0.1 detik
        }

        return $results;
    }

    /**
     * Cek apakah transaksi sudah dibayar
     */
    public function isPaid($transactionCode)
    {
        $transaction = Transaction::where('transaction_code', $transactionCode)->first();
        return $transaction && $transaction->payment_status === 'paid';
    }

    /**
     * Get transaction details dengan status terbaru
     */
    public function getTransactionWithLatestStatus($transactionCode)
    {
        $statusCheck = $this->checkPaymentStatus($transactionCode);

        if ($statusCheck['success']) {
            return $statusCheck['data'];
        }

        // Fallback ke database jika API gagal
        return Transaction::where('transaction_code', $transactionCode)->first();
    }
}

