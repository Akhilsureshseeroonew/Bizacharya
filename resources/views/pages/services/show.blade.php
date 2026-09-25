@extends('layouts.site')

@section('title', ($service->seo_title ?: $service->title) . ' | Bizacharya')
@section('description', $service->seo_description ?: $service->summary)

@section('content')
<section class="page-banner">
  <div class="container">
    <ol class="breadcrumb" aria-label="Breadcrumb"><li><a href="{{ url('/') }}">Home</a></li><li><a href="{{ route('services.index') }}">Services</a></li><li aria-current="page">{{ $service->title }}</li></ol>
    <p class="eyebrow">Services</p>
    <h1>{{ $service->hero_heading }}</h1>
    <p>{{ $service->hero_lead }}</p>
  </div>
</section>

<section class="section svc">
  <div class="container">
    <div class="svc__layout">
      <div class="svc__main">
        <div data-reveal>
          <p class="eyebrow">{{ $service->title }}</p>
          {!! $service->intro !!}
        </div>

        <div class="svc__block">
          <h2 data-reveal>What We Offer</h2>
          <ul class="offer-list @if (count($service->what_we_offer ?? []) >= 9) offer-list--3 @endif" data-stagger>
            @foreach ($service->what_we_offer ?? [] as $item)
              <li data-reveal><span class="card-x__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M20 6 9 17l-5-5"/></svg></span>{{ $item }}</li>
            @endforeach
          </ul>
        </div>

        @if ($service->impact_quote)
          <div class="svc__block" data-reveal>
            <div class="impact">
              <p class="impact__label">Our Impact</p>
              <blockquote><p>{{ $service->impact_quote }}</p></blockquote>
            </div>
          </div>
        @endif
      </div>

      <aside class="svc__side">
        <nav class="side-nav" aria-label="All services" data-reveal>
          <h2 class="side-nav__title">All Services</h2>
          <ul>
            @foreach ($all as $item)
              <li><a href="{{ $item->url() }}" @if ($item->id === $service->id) aria-current="page" @endif>{{ $item->title }} <svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></a></li>
            @endforeach
          </ul>
        </nav>
        <div class="side-cta" data-reveal>
          <span class="side-cta__icon" aria-hidden="true"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg></span>
          <h2 class="side-cta__title">Talk to an advisor</h2>
          <p>Get guidance on {{ $service->title }} from the Bizacharya team.</p>
          <a class="btn btn--light" href="tel:{{ config('site.phone_e164') }}"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg><span class="btn__label"><span class="btn__t">{{ config('site.phone') }}</span><span class="btn__t btn__t--alt" aria-hidden="true">{{ config('site.phone') }}</span></span></a>
          <a class="side-cta__link" href="{{ route('contact') }}#enquiry">Send an enquiry <svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></a>
        </div>
      </aside>
    </div>
  </div>
</section>

<section class="cta-band section section--tight">
  <div class="container" data-reveal>
    <div><h2>Speak With an Advisor</h2><p>Call {{ config('site.phone') }} or send us an enquiry about {{ $service->title }}.</p></div>
    <div class="btn-group">
      <a class="btn btn--white btn--lg" href="tel:{{ config('site.phone_e164') }}"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg><span class="btn__label"><span class="btn__t">Speak With an Advisor</span><span class="btn__t btn__t--alt" aria-hidden="true">Speak With an Advisor</span></span></a>
      <a class="btn btn--light btn--lg" href="{{ route('contact') }}#enquiry"><span class="btn__label"><span class="btn__t">Send an Enquiry</span><span class="btn__t btn__t--alt" aria-hidden="true">Send an Enquiry</span></span></a>
    </div>
  </div>
</section>

<section class="section section--tight section--light">
  <div class="container">
    <div class="section-head" data-reveal><h2>Other Services</h2></div>
    <div class="related" data-stagger>
      @foreach ($others as $other)
        <a href="{{ $other->url() }}" data-reveal>{{ $other->title }} <svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></a>
      @endforeach
    </div>
  </div>
</section>
@endsection
