<?php

namespace App\Http\Requests\backend;

use Illuminate\Foundation\Http\FormRequest;

class SellerRequest extends FormRequest
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
            'business_name' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',

            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'proprietor' => 'nullable|string|max:255',
            'other_email' => 'nullable|email|max:255',

            'address' => 'nullable',
            'desc' => 'nullable',
        ];
    }
}
