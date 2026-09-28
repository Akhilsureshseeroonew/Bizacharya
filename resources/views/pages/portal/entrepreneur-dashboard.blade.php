@extends('layouts.site')

@section('title', 'Entrepreneur Dashboard | Bizacharya (Phase 2)')
@section('description', 'Role-specific dashboard for registered entrepreneurs after login. Phase 2 placeholder.')

@section('content')
<section class="page-banner">
  <div class="container">
    <ol class="breadcrumb" aria-label="Breadcrumb"><li><a href="{{ url('/') }}">Home</a></li><li><a href="{{ route('login') }}">Phase 2 portals</a></li><li aria-current="page">Entrepreneur Dashboard</li></ol>
    <p class="eyebrow">Phase 2 &middot; Entrepreneur portal</p>
    <h1>Entrepreneur Dashboard</h1>
    <p>Role-specific dashboard for registered entrepreneurs after login.</p>
  </div>
</section>
<section class="section">
  <div class="container">
    <div data-reveal>
      <div class="phase-note" role="note"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg><p><strong>Phase 2 placeholder.</strong> This dashboard and its modules will be built with the PHP Laravel backend in Phase 2. This page shows the planned structure only &mdash; the form is disabled.</p></div>
      <p class="eyebrow">Planned modules</p>
      <h2>What this portal will include</h2>
      <ul class="module-list">
        <li><span class="card-x__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="8" r="4"/><path d="M20 21a8 8 0 0 0-16 0"/></svg></span>My profile &amp; business stage<span class="tag tag--teal">Planned</span></li>
        <li><span class="card-x__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg></span>My enquiries &amp; service requests<span class="tag tag--teal">Planned</span></li>
        <li><span class="card-x__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/></svg></span>Consultations &amp; appointments<span class="tag tag--teal">Planned</span></li>
        <li><span class="card-x__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg></span>Documents &amp; compliance calendar<span class="tag tag--teal">Planned</span></li>
        <li><span class="card-x__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z"/><path d="M22 10v6"/><path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5"/></svg></span>Learning Hub (subscribed content)<span class="tag tag--teal">Planned</span></li>
        <li><span class="card-x__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></span>Events I have registered for<span class="tag tag--teal">Planned</span></li>
      </ul>
      <div class="btn-group" style="margin-top:2rem"><a class="btn btn--outline" href="{{ route('login') }}"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg><span class="btn__label"><span class="btn__t">Back to Login</span><span class="btn__t btn__t--alt" aria-hidden="true">Back to Login</span></span></a><a class="btn btn--primary" href="{{ route('contact') }}#enquiry"><span class="btn__label"><span class="btn__t">Contact Bizacharya today</span><span class="btn__t btn__t--alt" aria-hidden="true">Contact Bizacharya today</span></span></a></div>
    </div>
  </div>
</section>
@endsection
