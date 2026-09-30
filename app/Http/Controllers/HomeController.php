<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Page;
use App\Models\Sector;
use App\Models\Service;
use App\Models\SuccessStory;

class HomeController extends Controller
{
    public function index()
    {
        $page = Page::where('slug', 'home')->firstOrFail();

        $upcomingEvents = Event::published()->where('status', 'upcoming')->orderBy('event_date')->take(3)->get();
        $sectors = Sector::published()->ordered()->get();
        $services = Service::published()->ordered()->get();
        $featuredStories = SuccessStory::published()->featured()->ordered()->get();

        $storiesJson = json_encode($featuredStories->map(fn ($s) => [
            'image' => null,
            'name' => $s->headline,
            'designation' => trim($s->name.($s->location ? ', '.$s->location : '')),
            'company' => '',
            'testimonial' => $s->quote,
            'category' => $s->sector_tag ?: 'Success Story',
            'storyLink' => route('success-stories').'#story-'.$s->id,
        ])->values());

        return view('pages.home', compact('page', 'upcomingEvents', 'sectors', 'services', 'featuredStories', 'storiesJson'));
    }
}
