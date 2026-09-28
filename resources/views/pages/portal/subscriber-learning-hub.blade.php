@extends('layouts.site')

@section('title', 'Subscriber Learning Hub | Bizacharya')
@section('description', 'Paid Learning Hub content for subscribed customers. Phase 2 placeholder.')

@section('content')
<section class="page-banner">
  <div class="container">
    <ol class="breadcrumb" aria-label="Breadcrumb"><li><a href="{{ url('/') }}">Home</a></li><li><a href="{{ route('login') }}">Phase 2 portals</a></li><li aria-current="page">Subscriber Learning Hub</li></ol>
    <p class="eyebrow">Phase 2 &middot; Subscribed customer module</p>
    <h1>Subscriber Learning Hub</h1>
    <p>Paid Learning Hub content for subscribed customers.</p>
  </div>
</section>
<section class="section">
  <div class="container">
    <div data-reveal>
      <div class="phase-note" role="note"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg><p><strong>Phase 2 placeholder.</strong> This dashboard and its modules will be built with the PHP Laravel backend in Phase 2. This page shows the planned structure only &mdash; the form is disabled.</p></div>
      <p class="eyebrow">Planned modules</p>
      <h2>What this portal will include</h2>
      <ul class="module-list">
        <li><span class="card-x__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M6 3 20 12 6 21V3z"/></svg></span>Premium video courses<span class="tag tag--teal">Planned</span></li>
        <li><span class="card-x__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><path d="m7 10 5 5 5-5"/><path d="M12 15V3"/></svg></span>Templates &amp; guides<span class="tag tag--teal">Planned</span></li>
        <li><span class="card-x__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/></svg></span>Member-only webinars<span class="tag tag--teal">Planned</span></li>
        <li><span class="card-x__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg></span>Certificates of completion<span class="tag tag--teal">Planned</span></li>
        <li><span class="card-x__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="8" cy="8" r="6"/><path d="M18.09 10.37A6 6 0 1 1 10.34 18"/><path d="M7 6h1v4"/><path d="m16.71 13.88.7.71-2.82 2.82"/></svg></span>Subscription &amp; payments<span class="tag tag--teal">Planned</span></li>
        <li><span class="card-x__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.7 1.3 1.5 1.5 2.5"/><path d="M9 18h6"/><path d="M10 22h4"/></svg></span>Progress tracking<span class="tag tag--teal">Planned</span></li>
      </ul>
      <div class="btn-group" style="margin-top:2rem"><a class="btn btn--outline" href="{{ route('login') }}"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg><span class="btn__label"><span class="btn__t">Back to Login</span><span class="btn__t btn__t--alt" aria-hidden="true">Back to Login</span></span></a><a class="btn btn--primary" href="{{ route('contact') }}#enquiry"><span class="btn__label"><span class="btn__t">Contact Bizacharya today</span><span class="btn__t btn__t--alt" aria-hidden="true">Contact Bizacharya today</span></span></a></div>
    </div>
  </div>
</section>
@endsection
