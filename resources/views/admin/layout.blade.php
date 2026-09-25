<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Dashboard') | Bizacharya Admin</title>
  <link rel="icon" type="image/png" href="{{ asset('assets/img/icon.png') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background: #f4f6f9; }
    .admin-sidebar { min-height: 100vh; background: #0A2540; color: #fff; }
    .admin-sidebar a { color: #cfd8e3; text-decoration: none; display: block; padding: .5rem .9rem; border-radius: .375rem; }
    .admin-sidebar a:hover, .admin-sidebar a.active { background: rgba(255,255,255,.1); color: #fff; }
    .admin-sidebar .nav-heading { color: #7f93ad; font-size: .72rem; text-transform: uppercase; letter-spacing: .05em; margin: 1rem 0 .25rem .9rem; }
    .admin-sidebar .brand { color: #fff; font-weight: 700; padding: 1rem .9rem; display: block; }
    .badge-new { font-size: .65rem; }
  </style>
</head>
<body>
<div class="d-flex">
  <nav class="admin-sidebar flex-shrink-0" style="width: 250px;">
    <a class="brand" href="{{ route('admin.dashboard') }}">Bizacharya Admin</a>
    <div class="px-2 pb-4">
      <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>

      <p class="nav-heading">Content</p>
      <a href="{{ route('admin.pages.index') }}" class="{{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">Pages</a>
      <a href="{{ route('admin.menu-items.index') }}" class="{{ request()->routeIs('admin.menu-items.*') ? 'active' : '' }}">Navigation Menu</a>
      <a href="{{ route('admin.settings.edit') }}" class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">Site Settings</a>

      <p class="nav-heading">Collections</p>
      <a href="{{ route('admin.sectors.index') }}" class="{{ request()->routeIs('admin.sectors.*') ? 'active' : '' }}">Sectors (Opportunities)</a>
      <a href="{{ route('admin.services.index') }}" class="{{ request()->routeIs('admin.services.*') ? 'active' : '' }}">Services</a>
      <a href="{{ route('admin.success-stories.index') }}" class="{{ request()->routeIs('admin.success-stories.*') ? 'active' : '' }}">Success Stories</a>
      <a href="{{ route('admin.events.index') }}" class="{{ request()->routeIs('admin.events.*') ? 'active' : '' }}">Community Events</a>
      <a href="{{ route('admin.jobs.index') }}" class="{{ request()->routeIs('admin.jobs.*') ? 'active' : '' }}">Job Openings</a>
      <a href="{{ route('admin.posts.index') }}" class="{{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">Learning Hub Posts</a>
      <a href="{{ route('admin.videos.index') }}" class="{{ request()->routeIs('admin.videos.*') ? 'active' : '' }}">Learning Hub Videos</a>

      <p class="nav-heading">Leads</p>
      <a href="{{ route('admin.enquiries.index') }}" class="{{ request()->routeIs('admin.enquiries.*') ? 'active' : '' }}">Enquiries</a>
      <a href="{{ route('admin.event-registrations.index') }}" class="{{ request()->routeIs('admin.event-registrations.*') ? 'active' : '' }}">Event Registrations</a>
      <a href="{{ route('admin.job-applications.index') }}" class="{{ request()->routeIs('admin.job-applications.*') ? 'active' : '' }}">Job Applications</a>
      <a href="{{ route('admin.associates.index') }}" class="{{ request()->routeIs('admin.associates.*') ? 'active' : '' }}">Associate Registrations</a>
    </div>
  </nav>

  <div class="flex-grow-1">
    <nav class="navbar navbar-expand navbar-light bg-white border-bottom px-3">
      <span class="navbar-text">@yield('title', 'Dashboard')</span>
      <div class="ms-auto d-flex align-items-center gap-3">
        <a href="{{ url('/') }}" target="_blank" class="small">View site &#8599;</a>
        <a href="{{ route('admin.profile.edit') }}" class="small {{ request()->routeIs('admin.profile.*') ? 'fw-bold' : '' }}">{{ auth()->user()?->name }}</a>
        <form method="post" action="{{ route('admin.logout') }}" class="m-0">
          @csrf
          <button class="btn btn-sm btn-outline-secondary" type="submit">Logout</button>
        </form>
      </div>
    </nav>

    <main class="p-4">
      @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
      @endif
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      @yield('content')
    </main>
  </div>
</div>
</body>
</html>
