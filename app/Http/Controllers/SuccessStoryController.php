<?php

namespace App\Http\Controllers;

use App\Models\SuccessStory;

class SuccessStoryController extends Controller
{
    public function index()
    {
        $stories = SuccessStory::published()->ordered()->get();

        return view('pages.success-stories', [
            'featured' => $stories->where('featured', true)->values(),
            'stories' => $stories,
        ]);
    }
}
