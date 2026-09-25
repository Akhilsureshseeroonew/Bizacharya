<?php

namespace App\Http\Controllers;

use App\Models\Sector;

class SectorController extends Controller
{
    public function index()
    {
        $sectors = Sector::published()->ordered()->get();

        return view('pages.opportunities.index', compact('sectors'));
    }

    public function show(Sector $sector)
    {
        abort_unless($sector->is_published, 404);

        $others = Sector::published()->where('id', '!=', $sector->id)->ordered()->get();

        return view('pages.opportunities.show', compact('sector', 'others'));
    }
}
