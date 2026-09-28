@extends('layouts.site')

@section('title', "Kerala's Entrepreneurship Community | Bizacharya")
@section('description', 'Upcoming events, networking meetups, mentoring sessions, workshops and bootcamps from Bizacharya, happening across Kerala.')

@section('content')
<section class="page-banner page-banner--center">
  <div class="container">
    <ol class="breadcrumb" aria-label="Breadcrumb"><li><a href="{{ url('/') }}">Home</a></li><li aria-current="page">Community</li></ol>
    <p class="eyebrow">Community</p>
    <h1>Kerala&rsquo;s Entrepreneurship Community</h1>
    <p>Upcoming events, networking meetups, mentoring sessions, workshops and bootcamps from Bizacharya, happening across Kerala.</p>
  </div>
</section>

<section class="section cm-events">
  <span class="cm-events__deco cm-events__deco--dots" aria-hidden="true"></span>
  <span class="cm-events__deco cm-events__deco--ring" aria-hidden="true"></span>
  <span class="cm-events__deco cm-events__deco--ring-sm" aria-hidden="true"></span>
  <div class="container">
    <div class="cm-tabs" data-reveal>
      <div class="filter-tabs filter-tabs--pro" data-filter-group="event-grid" role="group" aria-label="Filter events">
        <span class="filter-tabs__indicator" aria-hidden="true"></span>
        <button class="filter-tab is-active" type="button" data-filter="all" aria-pressed="true"><span class="filter-tab__icon" aria-hidden="true"><svg class="icon" viewBox="0 0 24 24" focusable="false"><rect width="7" height="7" x="3" y="3" rx="1.5"/><rect width="7" height="7" x="14" y="3" rx="1.5"/><rect width="7" height="7" x="14" y="14" rx="1.5"/><rect width="7" height="7" x="3" y="14" rx="1.5"/></svg></span><span class="filter-tab__label">All</span></button>
        <button class="filter-tab" type="button" data-filter="upcoming" aria-pressed="false"><span class="filter-tab__icon" aria-hidden="true"><svg class="icon" viewBox="0 0 24 24" focusable="false"><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/><path d="m9 16 2 2 4-4"/></svg></span><span class="filter-tab__label">Upcoming Events</span></button>
        <button class="filter-tab" type="button" data-filter="meetup" aria-pressed="false"><span class="filter-tab__icon" aria-hidden="true"><svg class="icon" viewBox="0 0 24 24" focusable="false"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></span><span class="filter-tab__label">Networking Meetups</span></button>
        <button class="filter-tab" type="button" data-filter="mentoring" aria-pressed="false"><span class="filter-tab__icon" aria-hidden="true"><svg class="icon" viewBox="0 0 24 24" focusable="false"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/><path d="M8 9h8"/><path d="M8 13h5"/></svg></span><span class="filter-tab__label">Mentoring Sessions</span></button>
        <button class="filter-tab" type="button" data-filter="workshop" aria-pressed="false"><span class="filter-tab__icon" aria-hidden="true"><svg class="icon" viewBox="0 0 24 24" focusable="false"><path d="M22 10 12 5 2 10l10 5 10-5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg></span><span class="filter-tab__label">Workshops &amp; Bootcamps</span></button>
      </div>
    </div>
    <div class="row grid-gap news-grid" id="event-grid" data-stagger>
      @forelse ($upcoming->concat($infoOnly)->concat($completed) as $event)
        <div class="col-md-6 col-lg-4" data-category="{{ trim(($event->status !== 'completed' ? 'upcoming ' : '').$event->filter_category) }}" data-reveal>
          <article class="media-card media-card--news">
            <figure class="ph ph--none">
              @if ($event->banner_image)
                <img src="{{ asset('storage/'.$event->banner_image) }}" alt="{{ $event->title }}" width="160" height="120" loading="lazy">
              @else
                <img src="{{ asset('assets/img/no-image.svg') }}" alt="" width="160" height="120" loading="lazy">
              @endif
              @if ($event->tag_label)
                <span class="tag tag--teal ph__tag">{{ $event->tag_label }}{{ $event->status === 'completed' ? ' · Completed' : '' }}</span>
              @endif
            </figure>
            <div class="media-card__body">
              <h3>{{ $event->title }}</h3>
              <p>{{ $event->summary }}</p>
              <div class="media-card__foot">
                <div class="media-card__meta"><span><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/></svg>{{ $event->event_date?->format('d M Y') ?? 'Ongoing' }}</span></div>
                <a class="text-link" href="{{ $event->url() }}">Learn More <svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></a>
              </div>
            </div>
          </article>
        </div>
      @empty
        <p>No events are scheduled right now &mdash; check back soon.</p>
      @endforelse
    </div>
  </div>
</section>
@endsection
