<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'order_code' => 'nullable|string|max:255',
            'buyer_id' => 'nullable',
            'seller_id' => 'nullable',
            'type' => 'nullable|string',
            'product_id' => 'nullable',
            'service_id' => 'nullable',
            'quantity' => 'nullable',
            'total_price' => 'nullable',
            'order_status' => 'nullable|string',
        ];
    }
}
