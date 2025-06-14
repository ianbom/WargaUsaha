<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    private $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    /**
     * Cek status pembayaran via API
     */
    public function checkStatus(Request $request, $transactionCode)
    {
        $result = $this->paymentService->checkPaymentStatus($transactionCode);

        return response()->json($result);
    }

    /**
     * Halaman setelah pembayaran (return URL)
     */
    public function paymentReturn($transactionCode)
    {
        $transaction = $this->paymentService->getTransactionWithLatestStatus($transactionCode);

        if (!$transaction) {
            return redirect()->route('home')->with('error', 'Transaction not found');
        }

        switch ($transaction->payment_status) {
            case 'paid':
                return redirect()->route('payment.success', $transactionCode);
            case 'pending':
                return redirect()->route('payment.pending', $transactionCode);
            case 'failed':
            case 'cancelled':
            case 'expired':
                return redirect()->route('payment.failed', $transactionCode);
            default:
                return redirect()->route('payment.pending', $transactionCode);
        }
    }

    /**
     * Polling status untuk AJAX
     */
    public function pollStatus($transactionCode)
    {
        $result = $this->paymentService->checkPaymentStatus($transactionCode);

        return response()->json([
            'status' => $result['data']->payment_status ?? 'unknown',
            'paid_at' => $result['data']->paid_at ?? null,
            'payment_method' => $result['data']->payment_method ?? null,
        ]);
    }

      public function updatePaymentStatus(Request $request)
    {
        try {
            // Validasi input
            $validated = $request->validate([
                'order_id' => 'required|string',
                'transaction_id' => 'required|string',
                'transaction_status' => 'required|string',
                'payment_type' => 'nullable|string',
                'gross_amount' => 'nullable|string'
            ]);

            // Cari transaksi berdasarkan order_id
            $transaction = Transaction::where('transaction_code', $validated['order_id'])->first();

            if (!$transaction) {
                return response()->json([
                    'success' => false,
                    'message' => 'Transaction not found'
                ], 404);
            }

            // Update payment status jika transaction_status adalah 'settlement'
            if ($validated['transaction_status'] === 'settlement') {
                $transaction->update([
                    'payment_status' => 'Paid',
                    // 'transaction_id' => $validated['transaction_id'],
                    'payment_type' => $validated['payment_type'] ?? null,
                    'paid_at' => now()
                ]);

                // Log untuk tracking
                Log::info('Payment status updated', [
                    'transaction_code' => $validated['order_id'],
                    // 'transaction_id' => $validated['transaction_id'],
                    'status' => 'Paid'
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Payment status updated successfully',
                    'data' => [
                        'transaction_code' => $validated['order_id'],
                        'payment_status' => 'Paid'
                    ]
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Transaction status is not settlement'
            ], 400);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error updating payment status', [
                'error' => $e->getMessage(),
                'request_data' => $request->all()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Internal server error'
            ], 500);
        }
    }
}
