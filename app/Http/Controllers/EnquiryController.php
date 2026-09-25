<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnquiryRequest;
use App\Models\Enquiry;

class EnquiryController extends Controller
{
    public function store(EnquiryRequest $request)
    {
        Enquiry::create([
            'name' => $request->string('name'),
            'mobile' => $request->normalizedMobile(),
            'email' => $request->string('email'),
            'city' => $request->input('city'),
            'interest' => $request->input('interest'),
            'service' => $request->input('service', []),
            'source_url' => $request->input('source_url'),
            'page_context' => $request->input('page_context'),
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Thank you — your enquiry has been received.']);
        }

        return back()->with('enquiry_sent', true);
    }
}
