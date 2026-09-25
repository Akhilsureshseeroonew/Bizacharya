@extends('layouts.site')

@section('title', $title . ' | Bizacharya')

@section('content')
<section class="page-banner">
  <div class="container">
    <ol class="breadcrumb" aria-label="Breadcrumb"><li><a href="{{ url('/') }}">Home</a></li><li aria-current="page">{{ $title }}</li></ol>
    <p class="eyebrow">Phase 2</p>
    <h1>{{ $title }}</h1>
    <p>{{ $message }}</p>
  </div>
</section>
<section class="section">
  <div class="container">
    <div class="coming-soon" role="status">
      <span class="card-x__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.7 1.3 1.5 1.5 2.5"/><path d="M9 18h6"/><path d="M10 22h4"/></svg></span>
      <h2>Coming Soon</h2>
      <p class="muted">This part of the Bizacharya platform is planned for a future phase. In the meantime, get in touch and our team will help directly.</p>
      <a class="btn btn--primary" href="{{ route('contact') }}#enquiry"><span class="btn__label"><span class="btn__t">Send an Enquiry</span><span class="btn__t btn__t--alt" aria-hidden="true">Send an Enquiry</span></span></a>
    </div>
  </div>
</section>
@endsection
