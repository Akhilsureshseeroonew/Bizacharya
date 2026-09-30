<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnquiryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:150', 'regex:/^(?=.*\pL)[\pL\s.\'-]+$/u'],
            'mobile' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:150'],
            'city' => ['nullable', 'string', 'max:150', 'regex:/^(?=.*\pL)[\pL\s.\'-]+$/u'],
            'interest' => ['nullable', 'string', 'max:150'],
            'service' => ['nullable', 'array'],
            'service.*' => ['string', 'max:150'],
            'page_context' => ['nullable', 'string', 'max:150'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.regex' => 'Please enter a valid name — letters only, not numbers or symbols.',
            'city.regex' => 'Please enter a valid city name — letters only, not numbers or symbols.',
        ];
    }

    public function normalizedMobile(): string
    {
        return substr(preg_replace('/\D/', '', $this->input('mobile', '')), -10);
    }
}
