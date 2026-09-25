@extends('layouts.site')

@section('title', $event->title . ' | Bizacharya Community')
@section('description', $event->summary)

@php
  $isCompleted = $event->status === 'completed';
  $canRegister = $event->canRegister();
  $isExternal = $canRegister && $event->hasExternalRegistration();
@endphp

@section('bodyAttributes')
  data-status="{{ $isCompleted ? 'completed' : 'upcoming' }}" data-registration="{{ $canRegister ? 'required' : 'none' }}"
@endsection

@section('content')
<section class="detail-hero">
  <figure class="detail-hero__media ph">
    <img src="{{ $event->banner_image ? asset('storage/'.$event->banner_image) : asset('assets/img/no-image.svg') }}" alt="{{ $event->title }}" width="2000" height="833" loading="lazy">
  </figure>
  <div class="detail-hero__scrim" aria-hidden="true"></div>
  <div class="container detail-hero__content" data-stagger>
    <a class="back-link" href="{{ route('community.index') }}" data-reveal><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>Back to all events</a>
    <div class="badges" data-reveal><span class="tag tag--teal" data-status-badge>{{ $isCompleted ? 'Completed' : 'Upcoming' }}</span>@if ($event->tag_label)<span class="tag tag--white">{{ $event->tag_label }}</span>@endif</div>
    <h1 data-reveal>{{ $event->title }}</h1>
    <div class="meta-row" data-reveal>
      @if ($event->event_date)
        <span><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/></svg>{{ $event->event_date->format('l, d M Y') }}</span>
      @endif
      @if ($event->event_time)
        <span><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>{{ $event->event_time }}</span>
      @endif
      @if ($event->venue)
        <span><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>{{ $event->venue }}</span>
      @endif
      <span><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>Organizer: {{ $event->organizer ?: config('site.legal_name') }}</span>
    </div>
  </div>
</section>

<section class="section section--tight">
  <div class="container">
    <div class="row grid-gap">
      <div class="col-lg-8">
        <article class="article" data-reveal>
          <h2>About the event</h2>
          {!! $event->body !!}
          @if (!empty($event->highlights))
            <h3>What you will cover</h3>
            <ul class="checklist">
              @foreach ($event->highlights as $item)
                <li><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>{{ $item }}</li>
              @endforeach
            </ul>
          @endif
        </article>
      </div>
      <aside class="col-lg-4" data-reveal>
        <div class="sidebar-card detail-cta-card sticky-cta">
          <span class="card-x__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/></svg></span>
          <h3>Event details</h3>
          <ul class="fact-list">
            @if ($event->event_date)
              <li><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/></svg><span><strong>Date</strong>{{ $event->event_date->format('l, d M Y') }}</span></li>
            @endif
            @if ($event->event_time)
              <li><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg><span><strong>Time</strong>{{ $event->event_time }}</span></li>
            @endif
            @if ($event->venue_full ?: $event->venue)
              <li><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg><span><strong>Venue</strong>{{ $event->venue_full ?: $event->venue }}</span></li>
            @endif
            <li><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg><span><strong>Organizer</strong>{{ $event->organizer ?: config('site.legal_name') }}</span></li>
          </ul>
          <div data-register-cta @if (!$canRegister) hidden @endif>
            @if ($isExternal)
              <a class="btn btn--primary btn--lg" href="{{ $event->external_registration_url }}" target="_blank" rel="noopener" style="width:100%"><span class="btn__label"><span class="btn__t">Register Now</span><span class="btn__t btn__t--alt" aria-hidden="true">Register Now</span></span><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M7 17 17 7"/><path d="M7 7h10v10"/></svg></a>
            @else
              <button class="btn btn--primary btn--lg" type="button" data-modal-open="register-modal" style="width:100%"><span class="btn__label"><span class="btn__t">Register Now</span><span class="btn__t btn__t--alt" aria-hidden="true">Register Now</span></span></button>
            @endif
          </div>
          <a class="btn btn--outline btn--sm" href="{{ route('community.index') }}"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg><span class="btn__label"><span class="btn__t">All events</span><span class="btn__t btn__t--alt" aria-hidden="true">All events</span></span></a>
        </div>
      </aside>
    </div>
  </div>
</section>

@if (!empty($event->gallery))
<section class="section section--tight section--light">
  <div class="container">
    <div class="gallery-section" data-reveal>
      <h2>Gallery</h2>
      <div class="row grid-gap">
        @foreach ($event->gallery as $item)
          <div class="col-md-6 col-lg-4"><figure class="ph ph--none"><img src="{{ asset('storage/'.($item['image'] ?? '')) }}" alt="{{ $item['caption'] ?? '' }}" width="160" height="120" loading="lazy"></figure></div>
        @endforeach
      </div>
    </div>
  </div>
</section>
@endif

@if ($canRegister)
  <div class="mobile-bar" data-register-cta>
    @if ($isExternal)
      <a class="btn btn--primary btn--lg" href="{{ $event->external_registration_url }}" target="_blank" rel="noopener"><span class="btn__label"><span class="btn__t">Register Now</span><span class="btn__t btn__t--alt" aria-hidden="true">Register Now</span></span></a>
    @else
      <button class="btn btn--primary btn--lg" type="button" data-modal-open="register-modal"><span class="btn__label"><span class="btn__t">Register Now</span><span class="btn__t btn__t--alt" aria-hidden="true">Register Now</span></span></button>
    @endif
  </div>
  @unless ($isExternal)
    <x-site.register-modal :event="$event" />
  @endunless
@endif
@endsection
