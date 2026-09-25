<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobApplicationRequest;
use App\Models\JobOpening;

class CareerController extends Controller
{
    public function index()
    {
        $jobs = JobOpening::open()->orderByDesc('posted_at')->get();

        return view('pages.careers.index', compact('jobs'));
    }

    public function show(JobOpening $job)
    {
        return view('pages.careers.show', compact('job'));
    }

    public function apply(JobApplicationRequest $request, JobOpening $job)
    {
        abort_unless($job->is_open, 404);

        $cv = $request->file('cv');
        $path = $cv->store("cvs/{$job->slug}", 'local');

        $job->applications()->create([
            'job_title' => $job->title,
            'name' => $request->string('name'),
            'email' => $request->string('email'),
            'phone' => $request->string('phone'),
            'cv_path' => $path,
            'cv_name' => $cv->getClientOriginalName(),
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Your application has been submitted.']);
        }

        return back()->with('application_sent', true);
    }
}
