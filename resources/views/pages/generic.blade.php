@extends('layouts.site')

@section('title', ($page->seo_title ?: $page->title) . ' | Bizacharya')
@section('description', $page->seo_description ?: \Illuminate\Support\Str::limit(strip_tags((string) $page->hero_lead), 160))

@section('content')
<section class="page-banner">
  <div class="container">
    <ol class="breadcrumb" aria-label="Breadcrumb"><li><a href="{{ url('/') }}">Home</a></li><li aria-current="page">{{ $page->title }}</li></ol>
    @if ($page->hero_eyebrow)
      <p class="eyebrow">{{ $page->hero_eyebrow }}</p>
    @endif
    <h1>{!! $page->hero_heading ?: e($page->title) !!}</h1>
    @if ($page->hero_lead)
      <p>{{ $page->hero_lead }}</p>
    @endif
  </div>
</section>

<section class="section">
  <div class="container">
    {!! $page->body !!}
  </div>
</section>
@endsection
