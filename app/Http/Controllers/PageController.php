<?php

namespace App\Http\Controllers;

use App\Models\Page;

class PageController extends Controller
{
    public function about()
    {
        $page = Page::where('slug', 'about')->firstOrFail();

        return view('pages.about', compact('page'));
    }

    public function contact()
    {
        $page = Page::where('slug', 'contact')->firstOrFail();

        return view('pages.contact', compact('page'));
    }
}
