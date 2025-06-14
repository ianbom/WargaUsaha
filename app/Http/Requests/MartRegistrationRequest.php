<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MartRegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'nullable',
            'mart_category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'banner_url' => 'required'
        ];
    }
}
