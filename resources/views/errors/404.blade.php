@extends('layouts.site')

@section('title', 'Page Not Found | Bizacharya')

@section('content')
<section class="page-banner page-banner--center">
  <div class="container">
    <p class="eyebrow">404</p>
    <h1>We couldn&rsquo;t find that page</h1>
    <p>The page you&rsquo;re looking for may have moved or no longer exists.</p>
  </div>
</section>
<section class="section">
  <div class="container text-center">
    <a class="btn btn--primary btn--lg" href="{{ url('/') }}"><span class="btn__label"><span class="btn__t">Back to Home</span><span class="btn__t btn__t--alt" aria-hidden="true">Back to Home</span></span></a>
  </div>
</section>
@endsection
