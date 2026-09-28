@extends('layouts.site')

@section('title', 'Business Associate Dashboard | Bizacharya (Phase 2)')
@section('description', 'Role-specific dashboard for registered Business Associates (agents) after login. Phase 2 placeholder.')

@section('content')
<section class="page-banner">
  <div class="container">
    <ol class="breadcrumb" aria-label="Breadcrumb"><li><a href="{{ url('/') }}">Home</a></li><li><a href="{{ route('login') }}">Phase 2 portals</a></li><li aria-current="page">Business Associate Dashboard</li></ol>
    <p class="eyebrow">Phase 2 &middot; Agent portal</p>
    <h1>Business Associate Dashboard</h1>
    <p>Role-specific dashboard for registered Business Associates (agents) after login.</p>
  </div>
</section>
<section class="section">
  <div class="container">
    <div data-reveal>
      <div class="phase-note" role="note"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg><p><strong>Phase 2 placeholder.</strong> This dashboard and its modules will be built with the PHP Laravel backend in Phase 2. This page shows the planned structure only &mdash; the form is disabled.</p></div>
      <p class="eyebrow">Planned modules</p>
      <h2>What this portal will include</h2>
      <ul class="module-list">
        <li><span class="card-x__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></span>My referred entrepreneurs (leads)<span class="tag tag--teal">Planned</span></li>
        <li><span class="card-x__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m22 7-8.5 8.5-5-5L2 17"/><path d="M16 7h6v6"/></svg></span>Lead status &amp; conversions<span class="tag tag--teal">Planned</span></li>
        <li><span class="card-x__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="8" cy="8" r="6"/><path d="M18.09 10.37A6 6 0 1 1 10.34 18"/><path d="M7 6h1v4"/><path d="m16.71 13.88.7.71-2.82 2.82"/></svg></span>Earnings &amp; payout statements<span class="tag tag--teal">Planned</span></li>
        <li><span class="card-x__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z"/><path d="M22 10v6"/><path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5"/></svg></span>Associate training material<span class="tag tag--teal">Planned</span></li>
        <li><span class="card-x__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m3 11 18-5v12L3 14v-3z"/><path d="M11.6 16.8a3 3 0 1 1-5.8-1.6"/></svg></span>Marketing kit &amp; brochures<span class="tag tag--teal">Planned</span></li>
        <li><span class="card-x__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m11 17 2 2a1 1 0 1 0 3-3"/><path d="m14 14 2.5 2.5a1 1 0 1 0 3-3l-3.88-3.88a3 3 0 0 0-4.24 0l-.88.88a1 1 0 1 1-3-3l2.81-2.81a5.79 5.79 0 0 1 7.06-.87l.47.28a2 2 0 0 0 1.42.25L21 4"/><path d="m21 3 1 11h-2"/><path d="M3 3 2 14l6.5 6.5a1 1 0 1 0 3-3"/><path d="M3 4h8"/></svg></span>Support &amp; announcements<span class="tag tag--teal">Planned</span></li>
      </ul>
      <div class="btn-group" style="margin-top:2rem"><a class="btn btn--outline" href="{{ route('login') }}"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg><span class="btn__label"><span class="btn__t">Back to Login</span><span class="btn__t btn__t--alt" aria-hidden="true">Back to Login</span></span></a><a class="btn btn--primary" href="{{ route('contact') }}#enquiry"><span class="btn__label"><span class="btn__t">Contact Bizacharya today</span><span class="btn__t btn__t--alt" aria-hidden="true">Contact Bizacharya today</span></span></a></div>
    </div>
  </div>
</section>
@endsection
