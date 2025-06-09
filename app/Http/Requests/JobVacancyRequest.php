<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobVacancyRequest extends FormRequest
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
            'job_category_id' => 'required',
            'job_title' => 'required|string|max:255',
            'job_description' => 'required|string',
            'skill_requirement' => 'required|string',
            'salary_min' => 'required|numeric|min:0',
            'salary_max' => 'required|numeric|min:0',
            'job_document' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ];
    }
}
