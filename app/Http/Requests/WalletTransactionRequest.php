<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WalletTransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'seller_wallet_id' => 'nullable',
            'amount' => 'required',
            'withdraw_accepted_date' => 'nullable',
            'withdraw_rejected_date' => 'nullable',
            'reason' => 'nullable',
            'status' => 'nullable',
            'bank_name' => 'nullable',
            'account_number' => 'nullable',
            'account_name' => 'nullable'
        ];
    }
}
