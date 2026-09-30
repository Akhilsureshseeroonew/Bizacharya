@extends('layouts.site')

@section('title', 'Success Stories — Entrepreneurs We Empowered | Bizacharya')
@section('description', 'Success stories of entrepreneurs across Kerala who started, registered, funded and grew their businesses with guidance from Bizacharya.')

@section('content')
<section class="page-banner">
  <div class="container">
    <ol class="breadcrumb" aria-label="Breadcrumb"><li><a href="{{ url('/') }}">Home</a></li><li aria-current="page">Success Stories</li></ol>
    <p class="eyebrow">Success Stories</p>
    <h1>Entrepreneurs We Empowered</h1>
    <p>Real journeys of entrepreneurs across Kerala who started, registered, funded and grew their businesses with Bizacharya.</p>
  </div>
</section>

@if ($featured->isNotEmpty())
<section class="section stories">
  <div class="container">
    <div class="section-head section-head--center" data-reveal>
      <p class="eyebrow">Featured</p>
      <h2>Featured Stories</h2>
    </div>
    <div class="stories__stage">
      <span class="stories__watermark" aria-hidden="true">Stories</span>
      <div class="swiper" data-stories>
        <div class="swiper-wrapper">
          @foreach ($featured as $i => $story)
            <div class="swiper-slide"><article class="story-card"><span class="story-card__num" aria-hidden="true">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span><span class="story-card__mark" aria-hidden="true">&ldquo;</span><span class="tag story-card__tag">Success story</span><h3>{{ $story->headline }}</h3><blockquote>{{ $story->quote }}</blockquote><footer class="story-card__foot">
              @if ($story->photo)
                <div class="ph ph--circle story-card__avatar"><img src="{{ asset('storage/'.$story->photo) }}" alt="{{ $story->name }}"></div>
              @else
                <div class="ph ph--circle story-card__avatar" role="img" aria-label="{{ $story->avatar_label ?: 'Portrait of '.$story->name }}"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="8" r="4"/><path d="M20 21a8 8 0 0 0-16 0"/></svg></div>
              @endif
              <span><strong>{{ $story->name }}</strong>@if($story->location)<span class="story-card__name">{{ $story->location }}</span>@endif</span>
            </footer></article></div>
          @endforeach
        </div>
      </div>
    </div>
    <div class="stories__bar">
      <div class="stories__count" aria-live="polite"><span data-story-current>01</span><span class="stories__sep">/</span><span data-story-total>{{ str_pad($featured->count(), 2, '0', STR_PAD_LEFT) }}</span></div>
      <div class="stories__progress" aria-hidden="true"><span data-story-progress></span></div>
      <div class="stories__nav">
        <button class="stories__arrow stories__prev" type="button" aria-label="Previous story"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m15 18-6-6 6-6"/></svg></button>
        <button class="stories__arrow stories__next" type="button" aria-label="Next story"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m9 18 6-6-6-6"/></svg></button>
      </div>
    </div>
  </div>
</section>
@endif

<section class="section section--light section--pattern-dark">
  <div class="container">
    <div class="section-head section-head--center" data-reveal>
      <p class="eyebrow">All Stories</p>
      <h2>More Stories from Kerala</h2>
    </div>
    <div class="row grid-gap story-grid" data-stagger>
      @foreach ($stories as $story)
        <div class="col-md-6 col-lg-4" data-reveal>
          <article class="story-card" id="story-{{ $story->id }}">
            <span class="story-card__mark" aria-hidden="true">&ldquo;</span>
            <span class="tag story-card__tag">Success story</span>
            <h3>{{ $story->headline }}</h3>
            <blockquote>{{ $story->quote }}</blockquote>
            <footer class="story-card__foot">
              @if ($story->photo)
                <div class="ph ph--circle story-card__avatar"><img src="{{ asset('storage/'.$story->photo) }}" alt="{{ $story->name }}"></div>
              @else
                <div class="ph ph--circle story-card__avatar" role="img" aria-label="{{ $story->avatar_label ?: 'Portrait of '.$story->name }}"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="8" r="4"/><path d="M20 21a8 8 0 0 0-16 0"/></svg></div>
              @endif
              <span><strong>{{ $story->name }}</strong>@if($story->location)<span class="story-card__name">{{ $story->location }}</span>@endif</span>
            </footer>
          </article>
        </div>
      @endforeach
    </div>
  </div>
</section>

<section class="cta-band section section--tight">
  <div class="container" data-reveal>
    <div><h2>Your story could be next.</h2><p>Tell us about your idea or business and start your journey with Bizacharya.</p></div>
    <a class="btn btn--white btn--lg" href="{{ route('contact') }}#enquiry"><span class="btn__label"><span class="btn__t">Start Your Entrepreneurial Journey</span><span class="btn__t btn__t--alt" aria-hidden="true">Start Your Entrepreneurial Journey</span></span></a>
  </div>
</section>
@endsection
