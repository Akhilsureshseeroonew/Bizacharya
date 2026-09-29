@extends('layouts.site')

@section('title', ($sector->seo_title ?: $sector->title) . ' | Bizacharya')
@section('description', $sector->seo_description ?: $sector->summary)

@section('content')
<section class="page-banner page-banner--center">
  <div class="container">
    <ol class="breadcrumb" aria-label="Breadcrumb"><li><a href="{{ url('/') }}">Home</a></li><li><a href="{{ route('opportunities.index') }}">Opportunities</a></li><li aria-current="page">{{ $sector->title }}</li></ol>
    <p class="eyebrow">Entrepreneurship Opportunities</p>
    <h1>{{ $sector->hero_heading }}</h1>
    <p>{{ $sector->hero_lead }}</p>
  </div>
</section>

@if ($sector->slug === 'financial-services')
<section class="section financial-intro">
  <div class="container">
    <div class="row grid-gap align-items-center">
      <div class="col-lg-5">
        <div class="about-split__media">
          <span class="about-split__blob" aria-hidden="true"></span>
          <figure class="about-split__photo"><img src="{{ asset('assets/img/about/institutions.jpg') }}" alt="Advisor reviewing financial paperwork with a client at the table" width="600" height="600" loading="lazy"></figure>
          <div class="about-split__badge">
            <svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="9"/><path d="M8.5 7.5h7M8.5 10.5h7M10.5 7.5a3 3 0 0 1 0 6h-2l5 4.5"/></svg>
            <span>{{ $sector->title }}</span>
          </div>
        </div>
      </div>
      <div class="col-lg-7">
        <p class="eyebrow">{{ $sector->title }}</p>
        {!! $sector->intro !!}
      </div>
    </div>
  </div>
</section>
@elseif ($sector->slug === 'women-entrepreneurship')
<section class="section">
  <div class="container">
    <div class="sector-intro">
      <div class="sector-intro__text">
        <p class="eyebrow">{{ $sector->title }}</p>
        {!! $sector->intro !!}
      </div>
      <div class="sector-intro__media">
        <figure class="sector-intro__photo"><img src="{{ asset('assets/img/opportunities/women-entrepreneurship-laptop.jpg') }}" alt="A woman entrepreneur smiling while working on her laptop at a desk" width="830" height="440" loading="lazy"></figure>
      </div>
    </div>
  </div>
</section>
@else
<section class="section">
  <div class="container">
    <div class="sector-intro sector-intro--square">
      <div class="sector-intro__text">
        <p class="eyebrow">{{ $sector->title }}</p>
        {!! $sector->intro !!}
      </div>
      @if ($sector->image)
        <div class="sector-intro__media">
          <figure class="sector-intro__photo"><img src="{{ asset('storage/'.$sector->image) }}" alt="{{ $sector->title }}" width="400" height="400" loading="lazy"></figure>
        </div>
      @endif
    </div>
  </div>
</section>
@endif

<section class="section section--light section--pattern-dark">
  <div class="container">
    <div class="row grid-gap">
      <div class="col-lg-6">
        <p class="eyebrow">What we do</p>
        <h2>Our Services</h2>
        <ul class="checklist checklist--links">
          @foreach ($sector->servicesOfferedLinks() as $item)
            <li><a href="{{ $item['url'] }}"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg><span>{{ $item['label'] }}</span><svg class="icon checklist__go" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></a></li>
          @endforeach
        </ul>
      </div>
      <div class="col-lg-6">
        <p class="eyebrow">Who it is for</p>
        <h2>Who Can Benefit?</h2>
        <ul class="tiles">
          @foreach ($sector->who_can_benefit ?? [] as $item)
            <li><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="8" r="4"/><path d="M20 21a8 8 0 0 0-16 0"/></svg>{{ $item }}</li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</section>

<section class="section section--navy section--pattern statement">
  <div class="container">
    <p>{{ $sector->statement_quote }}</p>
    <a class="btn btn--accent btn--lg" href="{{ route('contact') }}?interest={{ urlencode($sector->title) }}#enquiry"><span class="btn__label"><span class="btn__t">{{ $sector->cta_label ?: 'Start Your '.$sector->title.' Journey' }}</span><span class="btn__t btn__t--alt" aria-hidden="true">{{ $sector->cta_label ?: 'Start Your '.$sector->title.' Journey' }}</span></span></a>
  </div>
</section>

<section class="section section--tight">
  <div class="container">
    <div class="section-head">
      <h2>Explore Other Sectors</h2>
    </div>
    <div class="related">
      @foreach ($others as $other)
        <a href="{{ $other->url() }}">{{ $other->title }} <svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></a>
      @endforeach
    </div>
  </div>
</section>
@endsection
