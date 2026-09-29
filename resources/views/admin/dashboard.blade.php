@extends('admin.layout')

@section('title', 'Dashboard')

@php
  $cardIcons = [
    'Enquiries' => ['<path d="M4 4h16v16H4z" opacity="0"/><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 6-10 7L2 6"/>', 'blue'],
    'Event Sign-ups' => ['<path d="m9 11 3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>', 'teal'],
    'Job Applications' => ['<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6"/><line x1="9" y1="14" x2="15" y2="14"/><line x1="9" y1="17" x2="13" y2="17"/>', 'gold'],
    'Associate Sign-ups' => ['<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>', 'plum'],
  ];
@endphp

@section('content')
<div class="dash-hero">
  <div>
    <p class="dash-hero__eyebrow">{{ now()->format('l, d F Y') }}</p>
    <h1 class="dash-hero__title">Welcome back, {{ explode(' ', auth()->user()?->name ?? 'there')[0] }}</h1>
    <p class="dash-hero__sub">Here's what's happening on the Bizacharya website today.</p>
  </div>
  <a href="{{ url('/') }}" target="_blank" class="btn btn-light dash-hero__cta">View live site &#8599;</a>
</div>

<div class="row g-3 mb-2">
  @foreach ($counts as $label => $data)
    @php [$iconPath, $tone] = $cardIcons[$label] ?? [$cardIcons['Enquiries'][0], 'blue']; @endphp
    <div class="col-sm-6 col-lg-3">
      <a href="{{ route($data['route']) }}" class="text-decoration-none">
        <div class="stat-card stat-card--{{ $tone }} h-100">
          <span class="stat-card__icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">{!! $iconPath !!}</svg>
          </span>
          <div>
            <p class="stat-card__label">{{ $label }}</p>
            <p class="stat-card__value">{{ $data['total'] }}</p>
          </div>
          @if (! is_null($data['new']) && $data['new'] > 0)
            <span class="stat-card__badge">{{ $data['new'] }} new</span>
          @endif
        </div>
      </a>
    </div>
  @endforeach
</div>

<div class="quick-actions">
  <p class="quick-actions__label">Quick actions</p>
  <div class="d-flex flex-wrap gap-2">
    <a href="{{ route('admin.pages.create') }}" class="btn btn-sm btn-outline-secondary">+ New page</a>
    <a href="{{ route('admin.sectors.create') }}" class="btn btn-sm btn-outline-secondary">+ New sector</a>
    <a href="{{ route('admin.services.create') }}" class="btn btn-sm btn-outline-secondary">+ New service</a>
    <a href="{{ route('admin.events.create') }}" class="btn btn-sm btn-outline-secondary">+ New event</a>
    <a href="{{ route('admin.posts.create') }}" class="btn btn-sm btn-outline-secondary">+ New article</a>
  </div>
</div>
@endsection
