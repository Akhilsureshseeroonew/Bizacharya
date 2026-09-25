<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssociateRequest extends FormRequest
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
            'district' => ['required', 'string', 'max:100'],
            'occupation' => ['required', 'string', 'max:150'],
            'organization' => ['nullable', 'string', 'max:150'],
            'why' => ['nullable', 'string', 'max:2000'],
        ];
    }
}
