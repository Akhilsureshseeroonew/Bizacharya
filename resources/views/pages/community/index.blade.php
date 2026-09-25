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

<section class="section">
  <div class="container">
    <div class="filter-tabs" data-filter-group="event-grid" role="group" aria-label="Filter events">
      <button class="filter-tab is-active" type="button" data-filter="all" aria-pressed="true">All</button>
      <button class="filter-tab" type="button" data-filter="upcoming" aria-pressed="false">Upcoming Events</button>
      <button class="filter-tab" type="button" data-filter="meetup" aria-pressed="false">Networking Meetups</button>
      <button class="filter-tab" type="button" data-filter="mentoring" aria-pressed="false">Mentoring Sessions</button>
      <button class="filter-tab" type="button" data-filter="workshop" aria-pressed="false">Workshops &amp; Bootcamps</button>
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
