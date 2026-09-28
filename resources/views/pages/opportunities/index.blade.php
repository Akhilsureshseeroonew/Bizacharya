@extends('layouts.site')

@section('title', 'Entrepreneurship Opportunities in Kerala | Bizacharya')
@section('description', 'Explore the entrepreneurship opportunities Bizacharya supports across Kerala — financial services, agri-business, rural enterprises, women entrepreneurship, startups and SME/MSME development.')

@section('content')
<section class="page-banner page-banner--center">
  <div class="container" data-stagger>
    <ol class="breadcrumb" aria-label="Breadcrumb"><li><a href="{{ url('/') }}">Home</a></li><li aria-current="page">Entrepreneurship Opportunities</li></ol>
    <p class="eyebrow" data-reveal>The Bizacharya</p>
    <h1 data-reveal>Entrepreneurship <span class="listing-accent">Opportunities</span></h1>
    <p data-reveal>Explore business opportunities and dedicated support pathways designed to help entrepreneurs start, build, and grow.</p>
  </div>
  <div class="page-banner__aside" aria-hidden="true">
    <span>Ideas<br>People<br>Businesses<br>A Stronger<br>Kerala</span>
    <span class="page-banner__aside--sm">Opportunities<br>Today<br>A Brighter<br>Tomorrow</span>
  </div>
</section>

<section class="section listing">
  <div class="container">
    <ol class="row-list listing__list row-list--glyph row-list--icon-only" data-stagger data-reveal>
      @foreach ($sectors as $sector)
        <li data-reveal>
          <a class="row-item" href="{{ $sector->url() }}">
            <span class="row-item__glyph" aria-hidden="true"><x-site.sector-icon :slug="$sector->slug" /></span>
            <div><h3 class="row-item__title">{{ $sector->title }}</h3><p>{{ $sector->summary }}</p></div>
            <span class="row-item__more"><span class="row-item__more-text">Learn more</span><span class="row-item__icon" aria-hidden="true"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></span></span>
            @if ($sector->image)
              <span class="row-item__image" aria-hidden="true"><img src="{{ asset('storage/'.$sector->image) }}" alt="" loading="lazy"></span>
            @endif
          </a>
        </li>
      @endforeach
    </ol>
  </div>
</section>
@endsection
