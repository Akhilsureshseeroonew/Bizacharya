<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRegistrationRequest;
use App\Models\Event;

class CommunityController extends Controller
{
    public function index()
    {
        $events = Event::published()->orderByDesc('event_date')->get();

        return view('pages.community.index', [
            'upcoming' => $events->where('status', 'upcoming'),
            'infoOnly' => $events->where('status', 'info_only'),
            'completed' => $events->where('status', 'completed'),
        ]);
    }

    public function show(Event $event)
    {
        abort_unless($event->is_published, 404);

        $related = Event::published()->where('id', '!=', $event->id)->orderByDesc('event_date')->take(3)->get();

        return view('pages.community.show', compact('event', 'related'));
    }

    public function register(EventRegistrationRequest $request, Event $event)
    {
        $event->registrations()->create([
            ...$request->validated(),
            'event_title' => $event->title,
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        if ($request->wantsJson()) {
            return response()->json(['message' => 'You are registered for this event.']);
        }

        return back()->with('registration_sent', true);
    }
}
