<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', config('site.name'))</title>
  <meta name="description" content="@yield('description', config('site.tagline'))">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="{{ config('site.name') }}">
  <meta property="og:title" content="@yield('title', config('site.name'))">
  <meta property="og:description" content="@yield('description', config('site.tagline'))">
  <meta property="og:image" content="{{ asset('assets/img/logo.png') }}">
  <meta name="theme-color" content="#0A2540">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/icon.png') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Noto+Sans+Malayalam:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  @stack('styles')
</head>
<body class="@yield('bodyClass', '')" @yield('bodyAttributes')>
<a class="skip-link" href="#main">Skip to content</a>

@include('partials.topbar')
@include('partials.header')
@include('partials.drawer')

<main id="main">
@yield('content')
</main>

@include('partials.footer')
@include('partials.fab')

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>
<script src="{{ asset('assets/js/main.js') }}" defer></script>
@stack('scripts')
</body>
</html>
