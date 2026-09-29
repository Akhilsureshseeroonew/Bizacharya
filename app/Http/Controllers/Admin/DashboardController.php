<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Associate;
use App\Models\Enquiry;
use App\Models\EventRegistration;
use App\Models\JobApplication;

class DashboardController extends Controller
{
    public function index()
    {
        $counts = [
            'Enquiries' => ['total' => Enquiry::count(), 'new' => Enquiry::where('status', 'new')->count(), 'route' => 'admin.enquiries.index'],
            'Event Sign-ups' => ['total' => EventRegistration::count(), 'new' => EventRegistration::whereNull('viewed_at')->count(), 'route' => 'admin.event-registrations.index'],
            'Job Applications' => ['total' => JobApplication::count(), 'new' => JobApplication::where('status', 'new')->count(), 'route' => 'admin.job-applications.index'],
            'Associate Sign-ups' => ['total' => Associate::count(), 'new' => Associate::where('status', 'new')->count(), 'route' => 'admin.associates.index'],
        ];

        return view('admin.dashboard', compact('counts'));
    }
}
