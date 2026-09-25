<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssociateRequest;
use App\Models\Associate;

class AssociateController extends Controller
{
    public function store(AssociateRequest $request)
    {
        Associate::create([
            ...$request->validated(),
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Thank you for registering as a Business Associate.']);
        }

        return back()->with('associate_sent', true);
    }
}
