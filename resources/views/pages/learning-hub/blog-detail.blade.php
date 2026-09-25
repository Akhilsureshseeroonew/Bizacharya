@extends('layouts.site')

@section('title', $post->title . ' | Bizacharya Learning Hub')
@section('description', $post->excerpt)

@php
  $categoryLabels = ['blog' => 'Blog', 'guide' => 'Entrepreneurship Guide', 'scheme' => 'Government Scheme', 'literacy' => 'Financial Literacy'];
@endphp

@section('content')
<section class="detail-hero">
  <figure class="detail-hero__media ph ph--none"><img src="{{ $post->cover_image ? asset('storage/'.$post->cover_image) : asset('assets/img/no-image.svg') }}" alt="{{ $post->title }}" width="160" height="120" loading="lazy"></figure>
  <div class="detail-hero__scrim" aria-hidden="true"></div>
  <div class="container detail-hero__content" data-stagger>
    <a class="back-link" href="{{ route('learning-hub.index') }}#blogs" data-reveal><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>Back to Learning Hub</a>
    <div class="badges" data-reveal><span class="tag tag--white">{{ $categoryLabels[$post->category] ?? 'Blog' }}</span></div>
    <h1 data-reveal>{{ $post->title }}</h1>
    <div class="meta-row" data-reveal>
      <span><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/></svg>{{ $post->date_label ?: optional($post->published_at)->format('d M Y') }}</span>
      @if ($post->read_time)
        <span><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>{{ $post->read_time }}</span>
      @endif
    </div>
  </div>
</section>

<section class="section section--tight">
  <div class="container">
    <div class="row grid-gap">
      <div class="col-lg-8">
        <article class="article" data-reveal>
          {!! $post->body !!}
          <div class="share"><span>Share</span>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" rel="noopener" aria-label="Share on Facebook"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg></a>
            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" target="_blank" rel="noopener" aria-label="Share on LinkedIn"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/><circle cx="4" cy="4" r="2"/></svg></a>
            <a href="https://x.com/intent/tweet?url={{ urlencode(url()->current()) }}" target="_blank" rel="noopener" aria-label="Share on X"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M4 4l11.733 16H20L8.267 4H4z"/><path d="M4 20 10.768 13.2"/><path d="M13.23 10.8 20 4"/></svg></a>
            <a href="https://wa.me/?text={{ urlencode(url()->current()) }}" target="_blank" rel="noopener" aria-label="Share on WhatsApp"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path fill="currentColor" stroke="none" d="M17.5 14.4c-.3-.1-1.8-.9-2-1-.3-.1-.5-.1-.7.1-.2.3-.8 1-.9 1.2-.2.2-.3.2-.6.1-.3-.1-1.3-.5-2.4-1.5-.9-.8-1.5-1.8-1.7-2.1-.2-.3 0-.5.1-.6l.4-.5c.1-.2.2-.3.3-.5.1-.2 0-.4 0-.5-.1-.1-.7-1.6-.9-2.2-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.8.4-.3.3-1 1-1 2.5s1.1 2.9 1.2 3.1c.1.2 2.1 3.2 5.1 4.5.7.3 1.3.5 1.7.6.7.2 1.4.2 1.9.1.6-.1 1.8-.7 2-1.4.2-.7.2-1.3.2-1.4-.1-.2-.3-.3-.6-.4zM12 2C6.5 2 2 6.5 2 12c0 1.8.5 3.5 1.3 5L2 22l5.2-1.4c1.4.8 3.1 1.2 4.8 1.2 5.5 0 10-4.5 10-10S17.5 2 12 2zm0 18.2c-1.5 0-3-.4-4.3-1.2l-.3-.2-3.1.8.8-3-.2-.3C4.1 15 3.7 13.5 3.7 12c0-4.6 3.7-8.3 8.3-8.3s8.3 3.7 8.3 8.3-3.7 8.2-8.3 8.2z"/></svg></a>
          </div>
        </article>
      </div>
      <aside class="col-lg-4" data-reveal>
        <div class="sidebar-card sticky-cta">
          <h3>Related Posts</h3>
          <ul>
            @foreach ($related as $item)
              <li><a href="{{ $item->url() }}">{{ $item->title }}</a><small>{{ $categoryLabels[$item->category] ?? 'Blog' }} &middot; {{ $item->date_label ?: optional($item->published_at)->format('d M Y') }}</small></li>
            @endforeach
          </ul>
          <a class="btn btn--primary btn--sm" href="{{ route('learning-hub.index') }}#blogs"><span class="btn__label"><span class="btn__t">Back to Learning Hub</span><span class="btn__t btn__t--alt" aria-hidden="true">Back to Learning Hub</span></span></a>
        </div>
      </aside>
    </div>
  </div>
</section>
@endsection
