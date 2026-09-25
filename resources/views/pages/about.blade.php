@extends('layouts.site')

@section('title', ($page->seo_title ?: $page->title) . ' | Bizacharya')
@section('description', $page->seo_description)

@php
  $audienceIcons = [
    '<circle cx="12" cy="8" r="4"/><path d="M20 21a8 8 0 0 0-16 0"/>',
    '<path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/><path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/><path d="M8 16H3v5"/>',
    '<rect width="16" height="20" x="4" y="2" rx="2"/><path d="M9 22v-4h6v4"/><path d="M8 6h.01"/><path d="M16 6h.01"/><path d="M12 6h.01"/><path d="M12 10h.01"/><path d="M12 14h.01"/><path d="M16 10h.01"/><path d="M16 14h.01"/><path d="M8 10h.01"/><path d="M8 14h.01"/>',
    '<circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/>',
    '<path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/>',
    '<path d="m12.83 2.18a2 2 0 0 0-1.66 0L2.6 6.08a1 1 0 0 0 0 1.83l8.58 3.91a2 2 0 0 0 1.66 0l8.58-3.9a1 1 0 0 0 0-1.83Z"/><path d="m22 17.65-9.17 4.16a2 2 0 0 1-1.66 0L2 17.65"/><path d="m22 12.65-9.17 4.16a2 2 0 0 1-1.66 0L2 12.65"/>',
    '<path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/>',
    '<circle cx="8" cy="8" r="6"/><path d="M18.09 10.37A6 6 0 1 1 10.34 18"/><path d="M7 6h1v4"/><path d="m16.71 13.88.7.71-2.82 2.82"/>',
  ];
  $expertiseIcons = [
    '<rect width="16" height="20" x="4" y="2" rx="2"/><path d="M9 22v-4h6v4"/><path d="M8 6h.01"/><path d="M16 6h.01"/><path d="M12 6h.01"/><path d="M12 10h.01"/><path d="M12 14h.01"/><path d="M16 10h.01"/><path d="M16 14h.01"/><path d="M8 10h.01"/><path d="M8 14h.01"/>',
    '<path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/>',
    '<circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/>',
    '<rect x="4" y="4" width="16" height="16" rx="2"/><rect x="9" y="9" width="6" height="6"/><path d="M15 2v2"/><path d="M15 20v2"/><path d="M2 15h2"/><path d="M2 9h2"/><path d="M20 15h2"/><path d="M20 9h2"/><path d="M9 2v2"/><path d="M9 20v2"/>',
    '<path d="m12.83 2.18a2 2 0 0 0-1.66 0L2.6 6.08a1 1 0 0 0 0 1.83l8.58 3.91a2 2 0 0 0 1.66 0l8.58-3.9a1 1 0 0 0 0-1.83Z"/><path d="m22 17.65-9.17 4.16a2 2 0 0 1-1.66 0L2 17.65"/><path d="m22 12.65-9.17 4.16a2 2 0 0 1-1.66 0L2 12.65"/>',
    '<circle cx="8" cy="8" r="6"/><path d="M18.09 10.37A6 6 0 1 1 10.34 18"/><path d="M7 6h1v4"/><path d="m16.71 13.88.7.71-2.82 2.82"/>',
    '<circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/>',
    '<path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/><path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/><path d="M8 16H3v5"/>',
  ];
  $leaderBadgeIcons = [
    '<path d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z"/><path d="M22 10v6"/><path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5"/>',
    '<circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/>',
  ];
@endphp

@section('content')
<section class="about-hero">
  <div class="container">
    <div class="about-hero__grid" data-stagger>
      <div class="about-hero__head" data-reveal>
        <p class="eyebrow">About Bizacharya</p>
        <h1>{!! $page->hero_heading !!}</h1>
        <p class="lead">{{ $page->hero_lead }}</p>
        <p class="about-hero__accent"><span aria-hidden="true"></span>{!! implode('&nbsp;&nbsp;', array_map('e', $page->accent_words ?? [])) !!}</p>
      </div>
      <div class="about-hero__media" data-reveal>
        <span class="about-hero__shape" aria-hidden="true"></span>
        <figure class="ph ph--banner"><img src="{{ asset('assets/img/about/hero-banner.jpg') }}" alt="Bizacharya advisors with entrepreneurs at a business consultation" width="1600" height="700" loading="lazy" onerror="this.remove()"></figure>
        <div class="about-hero__badge about-hero__badge--top" data-reveal>
          <span class="about-hero__badge-icon" aria-hidden="true"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect width="16" height="20" x="4" y="2" rx="2"/><path d="M9 22v-4h6v4"/><path d="M8 6h.01"/><path d="M16 6h.01"/><path d="M12 6h.01"/><path d="M12 10h.01"/><path d="M12 14h.01"/><path d="M16 10h.01"/><path d="M16 14h.01"/><path d="M8 10h.01"/><path d="M8 14h.01"/></svg></span>
          <span>{{ $page->hero_badges[0] ?? '' }}</span>
        </div>
        <div class="about-hero__badge about-hero__badge--bottom" data-reveal>
          <span class="about-hero__badge-icon" aria-hidden="true"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M22 7 13.5 15.5 8.5 10.5 2 17"/><path d="M16 7h6v6"/></svg></span>
          <span>{{ $page->hero_badges[1] ?? '' }}</span>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section our-journey" id="our-journey">
  <div class="container">
    <div class="section-head section-head--center" data-reveal>
      <p class="eyebrow">Our Journey</p>
      <h2>Our Journey</h2>
    </div>
    <div class="timeline">
      <ol class="timeline__list" data-timeline>
        @foreach ($page->timeline ?? [] as $i => $item)
          <li class="timeline__item @if($loop->last) timeline__item--today @endif" style="--i:{{ $i }}">
            <span class="timeline__marker" aria-hidden="true"></span>
            <div class="timeline__content">
              <span class="timeline__value">{{ $item['value'] }}</span>
              <p>{{ $item['text'] }}</p>
            </div>
          </li>
        @endforeach
      </ol>
    </div>
  </div>
</section>

<section class="section section--light know">
  <div class="container">
    <div class="know__grid">
      <div data-reveal>
        <p class="eyebrow">Our Ecosystem</p>
        <h2>Beyond Corporate Advisory</h2>
        {!! $page->body !!}
        <p class="mv__label know__empower-label">Today, we empower:</p>
        <ul class="audience know__audience">
          @foreach ($page->audience ?? [] as $i => $item)
            <li><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">{!! $audienceIcons[$i] ?? $audienceIcons[0] !!}</svg>{{ $item }}</li>
          @endforeach
        </ul>
        <div class="know__cta">
          <span>Ready to build your business?</span>
          <a href="{{ route('contact') }}#enquiry">Talk to an advisor <svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></a>
        </div>
      </div>
      <div class="know__media" data-reveal>
        <span class="know__shape" aria-hidden="true"></span>
        <div class="know__photos">
          <figure class="ph"><img src="{{ asset('assets/img/about/team-review.jpg') }}" alt="Bizacharya team reviewing a business plan with a client" width="700" height="520" loading="lazy" onerror="this.remove()"></figure>
        </div>
        <div class="know__badge" data-reveal>
          <span class="know__badge-icon" aria-hidden="true"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></span>
          <span>{{ $page->know_badge }}</span>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--tight">
  <div class="container">
    <div class="section-head section-head--center" data-reveal>
      <p class="eyebrow">Our Corporate Consulting Foundation</p>
      <h2>Our Expertise</h2>
    </div>
    <div class="expertise-grid" data-stagger>
      @foreach ($page->expertise ?? [] as $i => $item)
        <div class="expertise" data-reveal><span class="card-x__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">{!! $expertiseIcons[$i] ?? $expertiseIcons[0] !!}</svg></span><span>{{ $item }}</span></div>
      @endforeach
    </div>
  </div>
</section>

@if ($page->leader_name)
<section class="section section--tight" id="leadership">
  <div class="container">
    <div class="section-head section-head--center" data-reveal>
      <p class="eyebrow">Our Leadership</p>
      <h2>Leadership</h2>
    </div>
    <div class="leader">
      <div class="leader__photo" data-reveal>
        <div class="team-card">
          <div class="team-card__avatar" aria-hidden="true"><span class="team-card__initials">{{ $page->leader_initials }}</span></div>
          <div class="team-card__label"><strong>{{ $page->leader_name }}</strong><span>{{ $page->leader_title }}</span></div>
        </div>
      </div>
      <div data-reveal>
        <p class="leader__role">{{ $page->leader_role }}</p>
        {!! $page->leader_bio !!}
        @if (!empty($page->leader_badges))
          <div class="leader__badges">
            @foreach ($page->leader_badges as $i => $badge)
              <span class="leader__badge"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">{!! $leaderBadgeIcons[$i] ?? $leaderBadgeIcons[0] !!}</svg>{{ $badge }}</span>
            @endforeach
          </div>
        @endif
      </div>
    </div>
  </div>
</section>
@endif

<section class="section section--tight">
  <div class="container">
    <div class="cta-card" data-reveal>
      <h2>Partner With Bizacharya</h2>
      <p>From idea validation and business registration to funding, compliance, expansion, and long-term growth.</p>
      <ol class="cta-chain" data-stagger>
        @foreach ($page->cta_chain ?? [] as $i => $step)
          <li data-reveal><span class="cta-chain__num" aria-hidden="true">{{ $i + 1 }}</span>{{ $step }}</li>
        @endforeach
      </ol>
      <a class="btn btn--primary btn--lg" href="{{ route('contact') }}#enquiry"><span class="btn__label"><span class="btn__t">Partner With Bizacharya</span><span class="btn__t btn__t--alt" aria-hidden="true">Partner With Bizacharya</span></span></a>
    </div>
  </div>
</section>
@endsection
