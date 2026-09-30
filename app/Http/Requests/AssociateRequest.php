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
            'name' => ['required', 'string', 'max:150', 'regex:/^(?=.*\pL)[\pL\s.\'-]+$/u'],
            'mobile' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:150'],
            'district' => ['required', 'string', 'max:100', 'regex:/^(?=.*\pL)[\pL\s.\'-]+$/u'],
            // Occupation may mix letters, numbers and symbols (e.g. "Co-Founder & CEO",
            // "Level 2 Manager") — it just can't be entirely numeric or entirely symbols.
            'occupation' => ['required', 'string', 'max:150', 'regex:/^(?=.*\pL).+$/u'],
            // organization/why are genuinely optional. A whitespace-only value isn't
            // rejected here on purpose: Laravel's global TrimStrings + ConvertEmptyStringsToNull
            // middleware already turns "   " into null before validation runs, so a
            // server-side "not blank" rule would never actually fire. The real guard
            // against someone submitting only spaces is client-side — see main.js's
            // validateField(), which rejects an optional field with whitespace-only
            // input before the request is even sent.
            'organization' => ['nullable', 'string', 'max:150'],
            'why' => ['nullable', 'string', 'max:2000'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.regex' => 'Please enter a valid name — letters only, not numbers or symbols.',
            'district.regex' => 'Please enter a valid district name — letters only, not numbers or symbols.',
            'occupation.regex' => 'Please enter a valid occupation — it can\'t be only numbers or symbols.',
        ];
    }
}
