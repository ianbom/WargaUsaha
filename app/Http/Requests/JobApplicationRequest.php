<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobApplicationRequest extends FormRequest
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
            'job_vacancy_id' => 'required',
            // 'user_id' => 'required',
            'proposed_salary' => 'required|numeric|min:0',
            'cv_document' => 'nullable|file|mimes:pdf|max:2048',
            'portfolio_document' => 'nullable|file|mimes:pdf|max:2048',
            'supporting_document' => 'nullable|file|mimes:pdf|max:2048',
        ];
    }
}
