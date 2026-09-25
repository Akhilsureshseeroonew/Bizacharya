@extends('layouts.site')

@section('title', 'How Bizacharya Supports You | Services')
@section('description', 'Practical, end-to-end support for every stage of your business — training, registration, compliance, funding, branding, market access and mentoring.')

@section('content')
<section class="page-banner page-banner--center">
  <div class="container" data-stagger>
    <ol class="breadcrumb" aria-label="Breadcrumb"><li><a href="{{ url('/') }}">Home</a></li><li aria-current="page">Services</li></ol>
    <p class="eyebrow" data-reveal>Our Services</p>
    <h1 data-reveal>How Bizacharya <span class="listing-accent">Supports You</span></h1>
    <p data-reveal>Explore Bizacharya's expert services designed to support businesses through every stage of their journey.</p>
  </div>
</section>

<section class="section listing">
  <div class="container">
    <ol class="row-list listing__list row-list--glyph row-list--services row-list--icon-only" data-stagger data-reveal>
      @foreach ($services as $service)
        <li data-reveal>
          <a class="row-item" href="{{ $service->url() }}">
            <span class="row-item__glyph" aria-hidden="true"><x-site.service-icon :slug="$service->slug" /></span>
            <div><h3 class="row-item__title">{{ $service->title }}</h3><p>{{ $service->summary }}</p></div>
            <span class="row-item__more"><span class="row-item__more-text">Learn more</span><span class="row-item__icon" aria-hidden="true"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></span></span>
            @if ($service->image)
              <span class="row-item__image" aria-hidden="true"><img src="{{ asset('storage/'.$service->image) }}" alt="" loading="lazy"></span>
            @endif
          </a>
        </li>
      @endforeach
    </ol>
  </div>
</section>
@endsection
