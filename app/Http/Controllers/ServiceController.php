<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::published()->ordered()->get();

        return view('pages.services.index', compact('services'));
    }

    public function show(Service $service)
    {
        abort_unless($service->is_published, 404);

        $all = Service::published()->ordered()->get();
        $others = $all->where('id', '!=', $service->id);

        return view('pages.services.show', compact('service', 'all', 'others'));
    }
}
