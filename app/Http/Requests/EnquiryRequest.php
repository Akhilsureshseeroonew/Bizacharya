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
            'name' => ['required', 'string', 'max:150'],
            'mobile' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:150'],
            'city' => ['nullable', 'string', 'max:150'],
            'interest' => ['nullable', 'string', 'max:150'],
            'service' => ['nullable', 'array'],
            'service.*' => ['string', 'max:150'],
            'page_context' => ['nullable', 'string', 'max:150'],
        ];
    }

    public function normalizedMobile(): string
    {
        return substr(preg_replace('/\D/', '', $this->input('mobile', '')), -10);
    }
}
