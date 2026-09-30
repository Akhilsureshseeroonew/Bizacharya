@extends('layouts.site')

@section('title', $event->title . ' | Bizacharya Community')
@section('description', $event->summary)

@php
  $isCompleted = $event->status === 'completed';
  $canRegister = $event->canRegister();
  $isExternal = $canRegister && $event->hasExternalRegistration();
  $audienceIcons = [
    '<path d="M9 18h6"/><path d="M10 22h4"/><path d="M15.09 14c.18-.98.65-1.74 1.41-2.5A4.65 4.65 0 0 0 18 8 6 6 0 0 0 6 8c0 1 .23 2.23 1.5 3.5A4.61 4.61 0 0 1 8.91 14"/>',
    '<path d="M22 10 12 5 2 10l10 5 10-5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/>',
    '<rect width="20" height="14" x="2" y="7" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>',
    '<path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/>',
    '<circle cx="12" cy="8" r="4"/><path d="M20 21a8 8 0 0 0-16 0"/>',
    '<circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/>',
  ];
@endphp

@section('bodyAttributes')
  data-status="{{ $isCompleted ? 'completed' : 'upcoming' }}" data-registration="{{ $canRegister ? 'required' : 'none' }}"
@endsection

@section('content')

<!-- 1. Hero -->
<section class="ev-hero">
  <figure class="ev-hero__media ph"><img src="{{ $event->banner_image ? asset('storage/'.$event->banner_image) : asset('assets/img/no-image.svg') }}" alt="{{ $event->title }}" width="2000" height="833" loading="eager" fetchpriority="high"></figure>
  <div class="ev-hero__scrim" aria-hidden="true"></div>
  <span class="ev-hero__rings" aria-hidden="true"></span>
  <div class="container ev-hero__inner" data-stagger>
    <a class="back-link" href="{{ route('community.index') }}" data-reveal><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>Back to all events</a>
    <div class="badges" data-reveal>
      <span class="tag tag--teal" data-status-badge>{{ $isCompleted ? 'Completed' : 'Upcoming' }}</span>
      @if ($event->tag_label)<span class="tag tag--white">{{ $event->tag_label }}</span>@endif
    </div>
    <h1 data-reveal>{{ $event->title }}</h1>
    @if ($event->summary)
      <p class="ev-hero__lede" data-reveal>{{ $event->summary }}</p>
    @endif
    <div class="ev-hero__actions" data-reveal>
      <div data-register-cta @if (!$canRegister) hidden @endif>
        @if ($isExternal)
          <a class="btn btn--primary btn--lg" href="{{ $event->external_registration_url }}" target="_blank" rel="noopener"><span class="btn__label"><span class="btn__t">Register Now</span><span class="btn__t btn__t--alt" aria-hidden="true">Register Now</span></span></a>
        @else
          <button class="btn btn--primary btn--lg" type="button" data-modal-open="register-modal"><span class="btn__label"><span class="btn__t">Register Now</span><span class="btn__t btn__t--alt" aria-hidden="true">Register Now</span></span></button>
        @endif
      </div>
    </div>
  </div>
</section>

<!-- 2. Fact strip -->
<section class="ev-facts-sec">
  <div class="container">
    <ul class="ev-facts" data-stagger>
      @if ($event->event_date)
        <li class="ev-fact" data-reveal>
          <span class="ev-fact__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/></svg></span>
          <span class="ev-fact__k">Date</span><span class="ev-fact__v">{{ $event->event_date->format('l, d M Y') }}</span>
        </li>
      @endif
      @if ($event->event_time)
        <li class="ev-fact" data-reveal>
          <span class="ev-fact__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg></span>
          <span class="ev-fact__k">Time</span><span class="ev-fact__v">{{ $event->event_time }}</span>
        </li>
      @endif
      @if ($event->venue)
        <li class="ev-fact" data-reveal>
          <span class="ev-fact__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg></span>
          <span class="ev-fact__k">Venue</span><span class="ev-fact__v">{{ $event->venue }}</span>
        </li>
      @endif
      <li class="ev-fact" data-reveal>
        <span class="ev-fact__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></span>
        <span class="ev-fact__k">Organizer</span><span class="ev-fact__v">{{ $event->organizer ?: config('site.legal_name') }}</span>
      </li>
    </ul>
  </div>
</section>

<!-- 3. Overview + highlights + audience, with sticky registration card -->
<section class="section section--tight ev-main" id="ev-overview">
  <div class="container">
    <div class="ev-grid">
      <div class="ev-col">
        <article class="article ev-article" data-reveal>
          <p class="eyebrow">About the event</p>
          <h2>{{ $event->about_heading ?: 'About the event' }}</h2>
          {!! $event->body !!}
        </article>

        @if (!empty($event->highlights))
          <div class="ev-block" data-reveal>
            <h3 class="ev-block__title">What you will cover</h3>
            <ul class="ev-hl" data-stagger>
              @foreach ($event->highlights as $i => $item)
                <li class="ev-hl__item" data-reveal><span class="ev-hl__num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span><span class="ev-hl__text">{{ $item }}</span></li>
              @endforeach
            </ul>
          </div>
        @endif

        @if (!empty($event->audience))
          <div class="ev-aud" data-reveal>
            <span class="ev-aud__rings" aria-hidden="true"></span>
            <div class="ev-aud__head">
              <span class="ev-aud__badge"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></span>
              <h3 class="ev-aud__title">Who should attend</h3>
            </div>
            <ul class="ev-aud__list" data-stagger>
              @foreach ($event->audience as $i => $item)
                <li class="ev-aud__item" data-reveal>
                  <span class="ev-aud__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">{!! $audienceIcons[$i % count($audienceIcons)] !!}</svg></span>
                  <span class="ev-aud__text">{{ $item }}</span>
                </li>
              @endforeach
            </ul>
            @if ($canRegister)
              <p class="ev-aud__note"><span class="ev-aud__pulse" aria-hidden="true"></span>Limited spots &mdash; register early to secure your place.</p>
            @endif
          </div>
        @endif
      </div>

      <aside class="ev-aside">
        <div class="ev-card sticky-cta" data-reveal>
          <div class="ev-card__head">
            <p class="ev-card__price">{{ $event->price_label ?: 'Free' }} <span>&middot; {{ $event->seats_label ?: 'limited seats' }}</span></p>
          </div>
          <ul class="ev-card__facts">
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
              <a class="btn btn--primary btn--lg ev-card__cta" href="{{ $event->external_registration_url }}" target="_blank" rel="noopener"><span class="btn__label"><span class="btn__t">Register Now</span><span class="btn__t btn__t--alt" aria-hidden="true">Register Now</span></span></a>
            @else
              <button class="btn btn--primary btn--lg ev-card__cta" type="button" data-modal-open="register-modal"><span class="btn__label"><span class="btn__t">Register Now</span><span class="btn__t btn__t--alt" aria-hidden="true">Register Now</span></span></button>
            @endif
          </div>
          <p class="ev-card__help">Questions? Call <a href="tel:{{ config('site.phone_e164') }}">{{ config('site.phone') }}</a> or <a href="{{ route('contact') }}">send an enquiry</a>.</p>
          <a class="btn btn--outline btn--sm ev-card__back" href="{{ route('community.index') }}"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg><span class="btn__label"><span class="btn__t">All events</span><span class="btn__t btn__t--alt" aria-hidden="true">All events</span></span></a>
        </div>
      </aside>
    </div>
  </div>
</section>

<!-- 4. Related events -->
@if ($related->isNotEmpty())
<section class="section section--tight section--light ev-related-sec">
  <div class="container">
    <div class="ev-related-head" data-reveal>
      <div class="section-head">
        <p class="eyebrow">Keep going</p>
        <h2>Other events you may like</h2>
      </div>
      <a class="ev-related-head__all" href="{{ route('community.index') }}">View all events<svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></a>
    </div>
    <div class="ev-related" data-stagger>
      @foreach ($related as $rel)
        <a class="ev-rel" href="{{ $rel->url() }}" data-reveal>
          <figure class="ev-rel__media"><img src="{{ $rel->banner_image ? asset('storage/'.$rel->banner_image) : asset('assets/img/no-image.svg') }}" alt="{{ $rel->title }}" width="640" height="400" loading="lazy"></figure>
          @if ($rel->event_date)
            <span class="ev-rel__date"><strong>{{ $rel->event_date->format('d') }}</strong>{{ $rel->event_date->format('M') }}</span>
          @endif
          @if ($rel->tag_label)
            <span class="ev-rel__tag">{{ $rel->tag_label }}</span>
          @endif
          <span class="ev-rel__body">
            <span class="ev-rel__title">{{ $rel->title }}</span>
            <span class="ev-rel__meta">
              @if ($rel->venue)<span><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>{{ $rel->venue }}</span>@endif
              @if ($rel->event_time)<span><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>{{ $rel->event_time }}</span>@endif
            </span>
            <span class="ev-rel__foot">View event<span class="ev-rel__go" aria-hidden="true"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></span></span>
          </span>
        </a>
      @endforeach
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
