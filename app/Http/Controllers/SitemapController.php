<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\JobOpening;
use App\Models\Page;
use App\Models\Post;
use App\Models\Sector;
use App\Models\Service;
use Illuminate\Support\Facades\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $urls = collect([
            ['loc' => url('/'), 'priority' => '1.0'],
            ['loc' => route('about'), 'priority' => '0.8'],
            ['loc' => route('contact'), 'priority' => '0.8'],
            ['loc' => route('opportunities.index'), 'priority' => '0.8'],
            ['loc' => route('services.index'), 'priority' => '0.8'],
            ['loc' => route('success-stories'), 'priority' => '0.6'],
            ['loc' => route('community.index'), 'priority' => '0.6'],
            ['loc' => route('careers.index'), 'priority' => '0.6'],
            ['loc' => route('learning-hub.index'), 'priority' => '0.6'],
        ])
            ->concat(Sector::published()->get()->map(fn ($s) => ['loc' => $s->url(), 'priority' => '0.7']))
            ->concat(Service::published()->get()->map(fn ($s) => ['loc' => $s->url(), 'priority' => '0.7']))
            ->concat(Event::published()->get()->map(fn ($e) => ['loc' => $e->url(), 'priority' => '0.5']))
            ->concat(JobOpening::open()->get()->map(fn ($j) => ['loc' => $j->url(), 'priority' => '0.5']))
            ->concat(Post::published()->category('blog')->get()->map(fn ($p) => ['loc' => $p->url(), 'priority' => '0.5']))
            ->concat(Page::published()->generic()->get()->map(fn ($p) => ['loc' => $p->url(), 'priority' => '0.4']));

        $xml = view('sitemap', compact('urls'))->render();

        return Response::make($xml, 200, ['Content-Type' => 'application/xml']);
    }
}
