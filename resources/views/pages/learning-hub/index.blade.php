@extends('layouts.site')

@section('title', 'Bizacharya Learning Hub — Entrepreneurship Courses & Resources')
@section('description', 'Expert-led courses, business guides, webinars, templates, and exclusive learning resources for entrepreneurs across Kerala.')

@section('content')
<section class="page-banner">
  <div class="container">
    <ol class="breadcrumb" aria-label="Breadcrumb"><li><a href="{{ url('/') }}">Home</a></li><li aria-current="page">Learning Hub</li></ol>
    <p class="eyebrow">Learning Hub</p>
    <p class="hub-hero__tag">Learn Today. Build Tomorrow.</p>
    <h1>Bizacharya Learning Hub &mdash; Entrepreneurship Courses &amp; Resources</h1>
    <p>The Bizacharya Learning Hub is your gateway to practical entrepreneurship knowledge. Gain access to expert-led courses, business guides, webinars, templates, and exclusive learning resources designed to help entrepreneurs across Kerala start, manage, and grow a successful business.</p>
  </div>
</section>

<section class="section section--tight" id="hub">
  <div class="container">
    <div class="hub-toggle__wrap" data-reveal>
      <div class="hub-toggle" role="group" aria-label="Choose content type" data-hub-toggle>
        <button class="hub-toggle__btn" type="button" data-hub="free" aria-pressed="true">Free Resources</button>
        <button class="hub-toggle__btn" type="button" data-hub="premium" aria-pressed="false">Premium (Subscription)</button>
      </div>
    </div>
    <div data-hub-panel="free">
      <div class="premium premium__inner" data-reveal>
        <div>
          <p class="eyebrow" style="color:var(--teal-400)">Subscription</p>
          <h2>Unlock Premium Learning Resources</h2>
          <p>Join the Learning Hub today and gain unlimited access to expert insights, practical training, and exclusive business resources.</p>
        </div>
        <button class="btn btn--accent btn--lg" type="button" data-hub-go="premium"><span class="btn__label"><span class="btn__t">Subscribe Now</span><span class="btn__t btn__t--alt" aria-hidden="true">Subscribe Now</span></span></button>
      </div>
    </div>
    <div data-hub-panel="premium" hidden>
      <div class="coming-soon" role="status">
        <span class="card-x__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.7 1.3 1.5 1.5 2.5"/><path d="M9 18h6"/><path d="M10 22h4"/></svg></span>
        <span class="ml" lang="ml">ഉടൻ വരുന്നു</span>
        <h2>Premium Learning Resources &mdash; Coming Soon</h2>
        <p class="muted">Paid courses, templates and member-only webinars are being prepared. Leave your details and we will let you know when the Learning Hub subscription opens.</p>
        <a class="btn btn--primary" href="{{ route('contact') }}#enquiry"><span class="btn__label"><span class="btn__t">Notify me when it opens</span><span class="btn__t btn__t--alt" aria-hidden="true">Notify me when it opens</span></span></a>
      </div>
    </div>
  </div>
</section>

<div data-hub-panel="free">
@if ($videos->isNotEmpty())
<section class="section section--light section--pattern-dark" id="videos">
  <div class="container">
    <div class="section-head section-head--center" data-reveal>
      <p class="eyebrow">Free content</p>
      <h2>Free Videos</h2>
      <p>Training and other videos &mdash; free entrepreneurship and business-related sessions from Bizacharya.</p>
    </div>
    <div class="row grid-gap" data-stagger>
      @foreach ($videos as $video)
        <div class="col-md-6 col-lg-4" data-reveal>
          <button class="video-card" type="button" data-video="{{ $video->youtube_id }}" data-video-title="{{ $video->title }}" data-video-desc="{{ $video->description }}" aria-label="Play: {{ $video->title }}">
            <figure class="ph ph--none">
              <img src="https://img.youtube.com/vi/{{ $video->youtube_id }}/hqdefault.jpg" alt="{{ $video->title }}" width="160" height="120" loading="lazy">
              <span class="video-card__play" aria-hidden="true"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M6 3 20 12 6 21V3z"/></svg></span>
              @if ($video->duration)
                <span class="video-card__dur">{{ $video->duration }}</span>
              @endif
            </figure>
            <span class="video-card__body"><h3>{{ $video->title }}</h3><p>{{ $video->description }}</p></span>
          </button>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif

<section class="section" id="blogs">
  <div class="container">
    <div class="section-head section-head--center" data-reveal>
      <p class="eyebrow">Latest Blogs</p>
      <h2>Free Blogs &amp; Articles</h2>
      <p>Valuable business insights and entrepreneurship knowledge &mdash; blogs, downloadable guides, government scheme write-ups and financial literacy videos.</p>
    </div>
    <div class="filter-tabs filter-tabs--center" data-filter-group="post-grid" role="group" aria-label="Filter content type">
      <button class="filter-tab is-active" type="button" data-filter="all" aria-pressed="true">All</button>
      <button class="filter-tab" type="button" data-filter="blog" aria-pressed="false">Blog</button>
      <button class="filter-tab" type="button" data-filter="guide" aria-pressed="false">Entrepreneurship Guides</button>
      <button class="filter-tab" type="button" data-filter="scheme" aria-pressed="false">Government Schemes</button>
      <button class="filter-tab" type="button" data-filter="literacy" aria-pressed="false">Financial Literacy</button>
    </div>
    <div class="row grid-gap" id="post-grid" data-stagger>
      @foreach ($posts as $post)
        <div class="col-md-6 col-lg-4" data-category="{{ $post->category }}" data-reveal>
          <article class="media-card">
            <figure class="ph ph--none">
              <img src="{{ $post->cover_image ? asset('storage/'.$post->cover_image) : asset('assets/img/no-image.svg') }}" alt="{{ $post->title }}" width="160" height="120" loading="lazy">
              <span class="tag tag--white ph__tag">{{ ['blog' => 'Blog', 'guide' => 'Entrepreneurship Guide', 'scheme' => 'Government Scheme', 'literacy' => 'Financial Literacy'][$post->category] }}</span>
            </figure>
            <div class="media-card__body">
              <div class="media-card__meta"><span><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/></svg>{{ $post->date_label ?: optional($post->published_at)->format('d M Y') }}</span></div>
              <h3>{{ $post->title }}</h3>
              <p>{{ $post->excerpt }}</p>
              @switch($post->category)
                @case('blog')
                  <a class="text-link" href="{{ $post->url() }}">Read More <svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></a>
                  @break
                @case('guide')
                  <a class="btn btn--outline btn--sm" href="{{ $post->file_path ? asset('storage/'.$post->file_path) : '#' }}" download><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><path d="m7 10 5 5 5-5"/><path d="M12 15V3"/></svg><span class="btn__label"><span class="btn__t">Download Guide</span><span class="btn__t btn__t--alt" aria-hidden="true">Download Guide</span></span></a>
                  @break
                @case('scheme')
                  <a class="btn btn--outline btn--sm" href="{{ $post->external_url }}" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M15 3h6v6"/><path d="M10 14 21 3"/><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/></svg><span class="btn__label"><span class="btn__t">Visit Scheme Page</span><span class="btn__t btn__t--alt" aria-hidden="true">Visit Scheme Page</span></span></a>
                  @break
                @case('literacy')
                  <button class="btn btn--outline btn--sm" type="button" data-video="{{ $post->video_youtube_id }}" data-video-title="{{ $post->title }}" data-video-desc="{{ $post->excerpt }}"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M6 3 20 12 6 21V3z"/></svg><span class="btn__label"><span class="btn__t">Watch on YouTube</span><span class="btn__t btn__t--alt" aria-hidden="true">Watch on YouTube</span></span></button>
              @endswitch
            </div>
          </article>
        </div>
      @endforeach
    </div>
  </div>
</section>
</div>

<x-site.video-modal />
@endsection
