@extends('layouts.site')

@section('title', $page->seo_title ?: 'Company Registration & Business Consulting Kerala | Bizacharya')
@section('description', $page->seo_description ?: config('site.tagline'))
@section('bodyClass', 'has-hero')

@section('content')
<section class="hero" id="hero">
  <div class="hero__bg" aria-hidden="true">
    <div class="hero__bg-slide is-active" style="background-image: url('{{ asset('assets/img/hero_bg.png') }}')"></div>
  </div>
  <div class="container hero__inner">
    <div class="hero__content">
      <h1>{!! $page->hero_heading !!}</h1>
      <p class="hero__sub">{{ $page->hero_subtitle }}</p>
      <p class="lead">{{ $page->hero_lead }}</p>
      <div class="btn-group">
        <a class="btn btn--primary btn--lg" href="{{ route('contact') }}#enquiry"><span class="btn__label"><span class="btn__t">{{ $page->hero_cta_label }}</span><span class="btn__t btn__t--alt" aria-hidden="true">{{ $page->hero_cta_label }}</span></span></a>
        <a class="btn btn--outline btn--lg" href="tel:{{ config('site.phone_e164') }}"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg><span class="btn__label"><span class="btn__t">{{ $page->hero_cta2_label }}</span><span class="btn__t btn__t--alt" aria-hidden="true">{{ $page->hero_cta2_label }}</span></span></a>
      </div>
      @php
        $heroStatIcons = [
          '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
          '<line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/>',
          '<path d="M9 18h6"/><path d="M10 22h4"/><path d="M12 2a7 7 0 0 0-4 12.7V17h8v-2.3A7 7 0 0 0 12 2z"/>',
          '<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>',
        ];
      @endphp
      <ul class="hero__stats">
        @foreach ($page->hero_stats ?? [] as $i => $stat)
          <li><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">{!! $heroStatIcons[$i] ?? '' !!}</svg><span>{{ $stat['value'] }}<br>{{ $stat['text'] }}</span></li>
        @endforeach
      </ul>
    </div>
  </div>
</section>

@if ($upcomingEvents->isNotEmpty())
<section class="section section--light events" id="events" data-watermark="corner-tr" data-watermark-parallax>
  <div class="container">
    <div class="section-head section-head--center" data-reveal>
      <p class="eyebrow">{{ $page->events_eyebrow }}</p>
      <h2>{{ $page->events_heading }}</h2>
      <p>{{ $page->events_intro }}</p>
    </div>
    <div class="events-carousel" data-reveal>
      <div class="swiper" data-events-carousel>
        <div class="swiper-wrapper">
          @foreach ($upcomingEvents as $event)
            <div class="swiper-slide">
              <article class="ticket{{ $loop->even ? ' ticket--teal' : '' }}">
                <div class="ticket__stub">
                  <span class="ticket__month">{{ $event->event_date?->format('M') }}</span>
                  <span class="ticket__day">{{ $event->event_date?->format('d') }}</span>
                  <span class="ticket__year">{{ $event->event_date?->format('Y') }}</span>
                  <span class="ticket__tag">{{ $event->tag_label ?: 'Event' }}</span>
                </div>
                <div class="ticket__seam" aria-hidden="true"></div>
                <div class="ticket__body">
                  <span class="ticket__photo"><img src="{{ $event->banner_image ? asset('storage/'.$event->banner_image) : asset('assets/img/no-image.svg') }}" alt="{{ $event->title }}" width="120" height="120" loading="lazy" onerror="this.parentElement.style.display='none'"></span>
                  @if ($event->event_time)
                    <p class="ticket__time"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg><span class="visually-hidden">Date: {{ $event->event_date?->format('d M Y') }}, time </span>{{ $event->event_time }}</p>
                  @endif
                  <h3>{{ $event->title }}</h3>
                  <p class="ticket__desc">{{ $event->summary }}</p>
                  <div class="ticket__foot">
                    <span class="ticket__loc"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>{{ $event->venue }}</span>
                    <a class="ticket__cta" href="{{ $event->url() }}">Register Now <svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></a>
                  </div>
                </div>
              </article>
            </div>
          @endforeach
        </div>
      </div>
      <div class="events-carousel__nav">
        <button class="events-carousel__arrow events-carousel__prev" type="button" aria-label="Previous event"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m15 18-6-6 6-6"/></svg></button>
        <div class="events-carousel__dots" aria-hidden="true"></div>
        <button class="events-carousel__arrow events-carousel__next" type="button" aria-label="Next event"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m9 18 6-6-6-6"/></svg></button>
      </div>
    </div>
    <div class="event-list__more" data-reveal>
      <a class="btn btn--outline" href="{{ route('community.index') }}"><span class="btn__label"><span class="btn__t">View All Events</span><span class="btn__t btn__t--alt" aria-hidden="true">View All Events</span></span></a>
    </div>
  </div>
</section>
@endif

<section class="section journey" id="journey" data-watermark="corner-tr" data-watermark-parallax>
  <div class="container">
    <div class="section-head section-head--center" data-reveal>
      <p class="eyebrow">{{ $page->journey_eyebrow }}</p>
      <h2>{{ $page->journey_heading }}</h2>
      <p>{{ $page->journey_intro }}</p>
    </div>
    <div class="journey-map" data-journey>
      <ol class="journey-map__list">
        @foreach ($page->journey_steps ?? [] as $i => $stage)
          <li class="journey-stage" data-tone="{{ $i % 2 === 0 ? 'a' : 'b' }}" style="--i:{{ $i }}">
            <div class="journey-stage__photo">
              <span class="journey-stage__num" aria-hidden="true">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
              <img src="{{ asset('assets/img/journey/'.str_pad($i + 1, 2, '0', STR_PAD_LEFT).'-'.\Illuminate\Support\Str::slug($stage['value']).'.jpg') }}" alt="{{ $stage['value'] }} stage" width="116" height="116" loading="lazy" onerror="this.remove()">
            </div>
            <div class="journey-stage__body">
              <h3><span class="visually-hidden">Step {{ $i + 1 }}: </span>{{ $stage['value'] }}</h3>
              <p>{{ $stage['text'] }}</p>
            </div>
          </li>
        @endforeach
      </ol>
    </div>
    <div class="roadmap__cta" data-reveal><a class="btn btn--primary btn--lg" href="{{ route('contact') }}#enquiry"><span class="btn__label"><span class="btn__t">Begin Your Journey</span><span class="btn__t btn__t--alt" aria-hidden="true">Begin Your Journey</span></span></a></div>
  </div>
</section>

@if ($sectors->isNotEmpty())
<section class="section section--tight sectors" id="sectors">
  <div class="container">
    <div class="section-head section-head--center" data-reveal>
      <p class="eyebrow">{{ $page->sectors_eyebrow }}</p>
      <h2>{{ $page->sectors_heading }}</h2>
      <p>{{ $page->sectors_intro }}</p>
    </div>
    <ol class="sector-flow" data-stagger>
      @foreach ($sectors as $i => $sector)
        <li @if($i % 2 === 1) class="sector-line--rev" @endif data-reveal>
          <a class="sector-line__row" href="{{ $sector->url() }}">
            <span class="sector-line__blob" aria-hidden="true"><x-site.sector-icon :slug="$sector->slug" /></span>
            <span class="sector-line__body">
              <span class="sector-line__title">{{ $sector->title }}</span>
              <span class="sector-line__desc">{{ $sector->summary }}</span>
            </span>
            <span class="sector-line__arrow" aria-hidden="true"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></span>
          </a>
        </li>
      @endforeach
    </ol>
  </div>
</section>
@endif

@if ($services->isNotEmpty())
<section class="section services-sec" id="services" data-watermark="corner-tl" data-watermark-parallax="0.1">
  <div class="container">
    <div class="row grid-gap">
      <div class="col-lg-4" data-reveal>
        <div class="sticky-cta">
          <div class="section-head" data-reveal>
            <p class="eyebrow">{{ $page->services_eyebrow }}</p>
            <h2>{{ $page->services_heading }}</h2>
            <p>{{ $page->services_intro }}</p>
          </div>
          <a class="btn btn--primary btn--lg" href="tel:{{ config('site.phone_e164') }}"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg><span class="btn__label"><span class="btn__t">{{ $page->services_cta_label }}</span><span class="btn__t btn__t--alt" aria-hidden="true">{{ $page->services_cta_label }}</span></span></a>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="marquee service-marquee" data-reveal>
          <div class="marquee__track">
            @foreach ($services->concat($services) as $j => $service)
              <a class="service-tile" href="{{ $service->url() }}" @if($j >= $services->count()) aria-hidden="true" tabindex="-1" @endif>
                <span class="service-tile__icon"><x-site.service-icon :slug="$service->slug" /></span>
                <span class="service-tile__num" aria-hidden="true">{{ str_pad(($j % $services->count()) + 1, 2, '0', STR_PAD_LEFT) }}</span>
                <h3 class="service-tile__title">{{ $service->title }}</h3>
                <p>{{ $service->summary }}</p>
                <span class="service-tile__arrow" aria-hidden="true"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></span>
              </a>
            @endforeach
          </div>
        </div>
        <div class="service-marquee__nav">
          <button class="service-marquee__arrow" type="button" data-marquee-prev aria-label="Previous services"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m15 18-6-6 6-6"/></svg></button>
          <button class="service-marquee__arrow" type="button" data-marquee-next aria-label="Next services"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m9 18 6-6-6-6"/></svg></button>
        </div>
      </div>
    </div>
  </div>
</section>
@endif

<section class="section section--light vm2-sec" id="vision-mission">
  <div class="container">
    <div class="section-head section-head--center" data-reveal>
      <p class="eyebrow">{{ $page->vm_eyebrow }}</p>
      <h2>{!! $page->vm_heading !!}</h2>
    </div>
    <div class="vm2" data-vm2>
      <div class="vm2__visual">
        <svg class="vm2__orbit" viewBox="0 0 520 520" aria-hidden="true" focusable="false">
          <circle cx="260" cy="260" r="248" fill="none" stroke="var(--line)" stroke-width="1.5" stroke-dasharray="1 9" stroke-linecap="round"/>
        </svg>
        <span class="vm2__dot vm2__dot--teal" aria-hidden="true"></span>
        <span class="vm2__dot vm2__dot--blue" aria-hidden="true"></span>
        <div class="vm2__circle">
          <span class="vm2__seg vm2__seg--1" style="--i:0"><img src="{{ asset('assets/img/journey/01-discover.jpg') }}" alt="Entrepreneur sketching and developing a new business idea" width="220" height="220" loading="lazy" onerror="this.parentElement.classList.add('vm2__seg--empty')"></span>
          <span class="vm2__seg vm2__seg--2" style="--i:1"><img src="{{ asset('assets/img/journey/02-learn.jpg') }}" alt="Entrepreneurs collaborating at a mentorship session" width="220" height="220" loading="lazy" onerror="this.parentElement.classList.add('vm2__seg--empty')"></span>
          <span class="vm2__seg vm2__seg--3" style="--i:2"><img src="{{ asset('assets/img/journey/05-grow.jpg') }}" alt="Business growth and performance analytics on a laptop screen" width="220" height="220" loading="lazy" onerror="this.parentElement.classList.add('vm2__seg--empty')"></span>
          <span class="vm2__seg vm2__seg--4" style="--i:3"><img src="{{ asset('assets/img/journey/06-scale.jpg') }}" alt="Entrepreneur celebrating a business milestone" width="220" height="220" loading="lazy" onerror="this.parentElement.classList.add('vm2__seg--empty')"></span>
        </div>
        <div class="vm2__core">
          @foreach ($page->vm_words ?? [] as $i => $word)
            <span class="vm2__core-line @if($loop->last) vm2__core-line--accent @endif">{{ $word }}</span>
          @endforeach
        </div>
      </div>
      <div class="vm2__paths" aria-hidden="true">
        <svg class="vm2__connector vm2__connector--vision" viewBox="0 0 160 190" preserveAspectRatio="none" focusable="false">
          <path class="vm2__connector-line" d="M4,95 H55 L80,60 H110 L135,95 H156" fill="none" stroke="var(--brand-2)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          <circle class="vm2__connector-node" cx="4" cy="95" r="5" fill="var(--brand-2)"/>
        </svg>
        <svg class="vm2__connector vm2__connector--mission" viewBox="0 0 160 190" preserveAspectRatio="none" focusable="false">
          <path class="vm2__connector-line" d="M4,95 H55 L80,130 H110 L135,95 H156" fill="none" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          <circle class="vm2__connector-node" cx="4" cy="95" r="5" fill="var(--primary)"/>
        </svg>
      </div>
      <div class="vm2__panels">
        <article class="vm2__panel vm2__panel--vision">
          <div class="vm2__panel-top">
            <div><h3>Vision</h3><span class="vm2__underline" aria-hidden="true"></span></div>
            <span class="vm2__icon" aria-hidden="true"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8Z"/><circle cx="12" cy="12" r="3"/></svg></span>
          </div>
          <p>{{ $page->vision_text }}</p>
        </article>
        <span class="vm2__mid-connector" aria-hidden="true"></span>
        <article class="vm2__panel vm2__panel--mission">
          <div class="vm2__panel-top">
            <div><h3>Mission</h3><span class="vm2__underline" aria-hidden="true"></span></div>
            <span class="vm2__icon" aria-hidden="true"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"/><path d="M4 22V15"/></svg></span>
          </div>
          <p>{{ $page->mission_text }}</p>
        </article>
      </div>
    </div>
  </div>
</section>

@if ($featuredStories->isNotEmpty())
<section class="section stories stories--deck" id="stories">
  <div class="container">
    <div class="section-head section-head--center" data-reveal>
      <p class="eyebrow">{{ $page->stories_eyebrow }}</p>
      <h2>{!! $page->stories_heading !!}</h2>
      <p>{{ $page->stories_intro }}</p>
    </div>
    <div class="story-deck" data-story-deck data-reveal>
      <span class="story-deck__shape story-deck__shape--a" aria-hidden="true"></span>
      <span class="story-deck__shape story-deck__shape--b" aria-hidden="true"></span>
      <svg class="story-deck__curve" viewBox="0 0 400 200" aria-hidden="true" focusable="false"><path d="M-10 150 C 100 80, 300 220, 410 60" fill="none" stroke="var(--brand-2)" stroke-width="1.5"/></svg>
      <div class="story-deck__track">
        <article class="story-deck__card story-deck__card--prev" aria-hidden="true"></article>
        <article class="story-deck__card story-deck__card--active"></article>
        <article class="story-deck__card story-deck__card--next" aria-hidden="true"></article>
      </div>
      <button class="story-deck__prev-btn" type="button" aria-label="Previous story"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m15 18-6-6 6-6"/></svg></button>
      <button class="story-deck__next-btn" type="button" aria-label="Next story"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m9 18 6-6-6-6"/></svg></button>
    </div>
    <div class="text-center" style="margin-top:2.5rem" data-reveal><a class="btn btn--outline" href="{{ route('success-stories') }}"><span class="btn__label"><span class="btn__t">View All Stories</span><span class="btn__t btn__t--alt" aria-hidden="true">View All Stories</span></span></a></div>
  </div>
</section>
@push('scripts')
<script>window.BZ_STORIES = {!! $storiesJson !!};</script>
@endpush
@endif

<section class="strip-cta section section--tight">
  <div class="container strip-cta__inner" data-reveal>
    <span class="strip-cta__icon" aria-hidden="true"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg></span>
    <div class="strip-cta__copy">
      <p class="strip-cta__lead">{{ $page->strip_cta_lead }}</p>
      <p class="strip-cta__sub">Call <a class="strip-cta__tel" href="tel:{{ config('site.phone_e164') }}">{{ config('site.phone') }}</a> or send us an enquiry.</p>
    </div>
    <div class="btn-group"><a class="btn btn--light" href="tel:{{ config('site.phone_e164') }}"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg><span class="btn__label"><span class="btn__t">{{ $page->services_cta_label }}</span><span class="btn__t btn__t--alt" aria-hidden="true">{{ $page->services_cta_label }}</span></span></a><a class="btn btn--white" href="{{ route('contact') }}#enquiry"><span class="btn__label"><span class="btn__t">Send an Enquiry</span><span class="btn__t btn__t--alt" aria-hidden="true">Send an Enquiry</span></span></a></div>
  </div>
</section>

@if ($upcomingEvents->isNotEmpty())
<section class="section section--light" id="community">
  <div class="container">
    <div class="section-head section-head--center" data-reveal>
      <p class="eyebrow">{{ $page->news_eyebrow }}</p>
      <h2>{{ $page->news_heading }}</h2>
      <p>{{ $page->news_intro }}</p>
    </div>
    <div class="row grid-gap news-grid" data-stagger>
      @foreach ($upcomingEvents as $event)
        <div class="col-md-6 col-lg-4" data-reveal>
          <article class="media-card media-card--news">
            <figure class="ph @if(!$event->banner_image) ph--none @endif">
              @if ($event->banner_image)
                <img src="{{ asset('storage/'.$event->banner_image) }}" alt="{{ $event->title }}" width="640" height="480" loading="lazy" onerror="this.remove()">
              @else
                <img src="{{ asset('assets/img/no-image.svg') }}" alt="{{ $event->title }}" width="160" height="120" loading="lazy">
              @endif
              @if ($event->tag_label)<span class="tag tag--teal ph__tag">{{ $event->tag_label }}</span>@endif
            </figure>
            <div class="media-card__body">
              <h3>{{ $event->title }}</h3>
              <p>{{ $event->summary }}</p>
              <div class="media-card__foot">
                <div class="media-card__meta"><span><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/></svg>{{ $event->event_date?->format('d M Y') ?? ($event->status === 'completed' ? 'Completed' : 'Upcoming') }}</span></div>
                <a class="text-link" href="{{ $event->url() }}">Learn More <svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></a>
              </div>
            </div>
          </article>
        </div>
      @endforeach
    </div>
    <div class="event-list__more" data-reveal>
      <a class="btn btn--outline" href="{{ route('community.index') }}"><span class="btn__label"><span class="btn__t">View All News &amp; Events</span><span class="btn__t btn__t--alt" aria-hidden="true">View All News &amp; Events</span></span></a>
    </div>
  </div>
</section>
@endif

<section class="section" id="connect">
  <div class="container">
    <div class="section-head section-head--center" data-reveal>
      <p class="eyebrow">{{ $page->connect_eyebrow }}</p>
      <h2><span id="enquiry-title">{{ $page->connect_heading }}</span></h2>
      <p>{{ $page->connect_intro }}</p>
    </div>
    <div class="connect">
      <div class="form-card" data-reveal>
        <x-site.enquiry-form page-context="home" />
      </div>
      <aside class="connect__side" data-reveal>
        <h3>{{ $page->connect_aside_heading }}</h3>
        <p>{{ $page->connect_aside_intro }}</p>
        <ul class="connect__list">
          <li><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg><div><strong>Corporate Address</strong>{!! nl2br(e(config('site.address_full'))) !!}</div></li>
          <li><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg><div><strong>Email</strong><a href="mailto:{{ config('site.email') }}">{{ config('site.email') }}</a></div></li>
          <li><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg><div><strong>Phone</strong><a href="tel:{{ config('site.phone_e164') }}">{{ config('site.phone') }}</a></div></li>
        </ul>
        <a class="btn btn--wa" href="https://wa.me/{{ config('site.whatsapp') }}" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path fill="currentColor" stroke="none" d="M17.5 14.4c-.3-.1-1.8-.9-2-1-.3-.1-.5-.1-.7.1-.2.3-.8 1-.9 1.2-.2.2-.3.2-.6.1-.3-.1-1.3-.5-2.4-1.5-.9-.8-1.5-1.8-1.7-2.1-.2-.3 0-.5.1-.6l.4-.5c.1-.2.2-.3.3-.5.1-.2 0-.4 0-.5-.1-.1-.7-1.6-.9-2.2-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.8.4-.3.3-1 1-1 2.5s1.1 2.9 1.2 3.1c.1.2 2.1 3.2 5.1 4.5.7.3 1.3.5 1.7.6.7.2 1.4.2 1.9.1.6-.1 1.8-.7 2-1.4.2-.7.2-1.3.2-1.4-.1-.2-.3-.3-.6-.4zM12 2C6.5 2 2 6.5 2 12c0 1.8.5 3.5 1.3 5L2 22l5.2-1.4c1.4.8 3.1 1.2 4.8 1.2 5.5 0 10-4.5 10-10S17.5 2 12 2zm0 18.2c-1.5 0-3-.4-4.3-1.2l-.3-.2-3.1.8.8-3-.2-.3C4.1 15 3.7 13.5 3.7 12c0-4.6 3.7-8.3 8.3-8.3s8.3 3.7 8.3 8.3-3.7 8.2-8.3 8.2z"/></svg><span class="btn__label"><span class="btn__t">Start a WhatsApp Chat</span><span class="btn__t btn__t--alt" aria-hidden="true">Start a WhatsApp Chat</span></span></a>
      </aside>
    </div>
  </div>
</section>
@endsection
