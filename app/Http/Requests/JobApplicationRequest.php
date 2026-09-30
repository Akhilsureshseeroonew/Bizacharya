<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobApplicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:150', 'regex:/^(?=.*\pL)[\pL\s.\'-]+$/u'],
            'email' => ['required', 'email', 'max:150'],
            'phone' => ['required', 'string', 'max:20'],
            // Capped at 2MB to match this server's actual upload_max_filesize (2M) —
            // a larger limit here would pass Laravel's own validation but still get
            // silently truncated/rejected by PHP itself before the request even arrives.
            'cv' => ['required', 'file', 'mimes:pdf,doc,docx', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.regex' => 'Please enter a valid name — letters only, not numbers or symbols.',
        ];
    }
}
