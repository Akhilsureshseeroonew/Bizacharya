@extends('layouts.site')

@section('title', 'Careers at Bizacharya')
@section('description', "Join the team building Kerala's entrepreneurship ecosystem — or partner with us as a Business Associate.")

@section('content')
<section class="page-banner page-banner--center">
  <div class="container">
    <ol class="breadcrumb" aria-label="Breadcrumb"><li><a href="{{ url('/') }}">Home</a></li><li aria-current="page">Careers</li></ol>
    <p class="eyebrow">Careers</p>
    <h1>Careers at Bizacharya</h1>
    <p>Join the team building Kerala&rsquo;s entrepreneurship ecosystem &mdash; or partner with us as a Business Associate.</p>
  </div>
</section>

<section class="section section--light" id="associate">
  <div class="container">
    <div class="associate-intro" data-reveal>
      <p class="eyebrow">Agent Registration</p>
      <h2>Become a Bizacharya Business Associate</h2>
      <p class="lead">Bizacharya Business Associates connect entrepreneurs, small businesses and professionals in their district with expert consulting, registration, compliance and funding-readiness support &mdash; and build a rewarding practice of their own.</p>
    </div>
    <div class="associate-grid" data-stagger>
      <div class="associate-card" data-reveal>
        <span class="associate-card__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.75Z"/><path d="m9 12 2 2 4-4"/></svg></span>
        <h3>Represent a Trusted Brand</h3>
        <p>Represent a trusted consulting brand in your town or district.</p>
      </div>
      <div class="associate-card" data-reveal>
        <span class="associate-card__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M12 7v14"/><path d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z"/></svg></span>
        <h3>Training &amp; Mentor Support</h3>
        <p>Training, marketing material and mentor support from the Bizacharya team.</p>
      </div>
      <div class="associate-card" data-reveal>
        <span class="associate-card__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M16 7h6v6"/><path d="m22 7-8.5 8.5-5-5L2 17"/></svg></span>
        <h3>Attractive Earnings</h3>
        <p>Attractive earnings on every client you bring on board.</p>
      </div>
      <div class="associate-card" data-reveal>
        <span class="associate-card__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></span>
        <h3>Open to All Professionals</h3>
        <p>Ideal for finance professionals, consultants, graduates and community leaders.</p>
      </div>
    </div>
    <div class="associate-cta" data-reveal>
      <button class="btn btn--accent btn--lg" type="button" data-modal-open="associate-modal"><span class="btn__label"><span class="btn__t">Register as a Business Associate</span><span class="btn__t btn__t--alt" aria-hidden="true">Register as a Business Associate</span></span></button>
    </div>
  </div>
</section>

<section class="section" id="openings" data-watermark="corner-tr">
  <div class="container">
    <div class="section-head section-head--center" data-reveal>
      <p class="eyebrow">Open Positions</p>
      <h2>Current Openings</h2>
      <p>Explore roles across consulting, compliance, training and marketing at Bizacharya.</p>
    </div>
    <div class="job-list" data-stagger>
      @forelse ($jobs as $job)
        <article class="job-row" data-reveal>
          <div class="job-row__inner">
            <div class="job-row__content">
              <h3 class="job-row__title"><a href="{{ $job->url() }}">{{ $job->title }}</a></h3>
              <div class="job-row__meta">
                <span><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect width="20" height="14" x="2" y="7" rx="2"/><path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/></svg>{{ $job->department }}</span>
                <span><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>{{ $job->location }}</span>
              </div>
            </div>
            <span class="job-row__go" aria-hidden="true"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></span>
          </div>
        </article>
      @empty
        <p>There are no open positions right now &mdash; check back soon.</p>
      @endforelse
    </div>
  </div>
</section>

<x-site.associate-modal />
@endsection
