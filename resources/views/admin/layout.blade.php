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
    .admin-sidebar { min-height: 100vh; width: 250px; background: #0A2540; color: #fff; }
    .admin-sidebar a { color: #cfd8e3; text-decoration: none; display: block; padding: .5rem .9rem; border-radius: .375rem; }
    .admin-sidebar a:hover, .admin-sidebar a.active { background: rgba(255,255,255,.1); color: #fff; }
    .admin-sidebar .nav-heading { color: #7f93ad; font-size: .72rem; text-transform: uppercase; letter-spacing: .05em; margin: 1rem 0 .25rem .9rem; }
    .admin-sidebar .brand { color: #fff; font-weight: 700; padding: 1rem .9rem; display: block; }
    .badge-new { font-size: .65rem; }
    .admin-topbar__title { min-width: 0; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
    .sidebar-toggle { display: none; }
    .d-flex > .flex-grow-1 { min-width: 0; }
    @media (max-width: 991.98px) {
      .admin-sidebar {
        position: fixed; top: 0; left: 0; bottom: 0; overflow-y: auto;
        transform: translateX(-100%); transition: transform .25s ease; z-index: 1045;
      }
      .admin-sidebar.show { transform: translateX(0); }
      .admin-backdrop {
        display: none; position: fixed; inset: 0; background: rgba(10,37,64,.45); z-index: 1040;
      }
      .admin-backdrop.show { display: block; }
      .sidebar-toggle { display: inline-flex; }
      main.p-4 { padding: 1rem !important; }
    }
  </style>
</head>
<body>
<div class="d-flex">
  <div class="admin-backdrop" id="adminBackdrop"></div>
  <nav class="admin-sidebar flex-shrink-0" id="adminSidebar">
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
    <nav class="navbar navbar-expand navbar-light bg-white border-bottom px-3 flex-nowrap">
      <button class="btn btn-outline-secondary btn-sm sidebar-toggle me-2" type="button" id="sidebarToggle" aria-label="Toggle menu" aria-expanded="false" aria-controls="adminSidebar">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
      </button>
      <span class="navbar-text admin-topbar__title">@yield('title', 'Dashboard')</span>
      <div class="ms-auto d-flex align-items-center gap-2 gap-lg-3">
        <a href="{{ url('/') }}" target="_blank" class="small d-none d-sm-inline">View site &#8599;</a>
        <a href="{{ route('admin.profile.edit') }}" class="small d-none d-sm-inline {{ request()->routeIs('admin.profile.*') ? 'fw-bold' : '' }}">{{ auth()->user()?->name }}</a>
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
<script>
  (function () {
    var sidebar = document.getElementById('adminSidebar');
    var backdrop = document.getElementById('adminBackdrop');
    var toggle = document.getElementById('sidebarToggle');

    function close() {
      sidebar.classList.remove('show');
      backdrop.classList.remove('show');
      toggle.setAttribute('aria-expanded', 'false');
    }
    function open() {
      sidebar.classList.add('show');
      backdrop.classList.add('show');
      toggle.setAttribute('aria-expanded', 'true');
    }

    toggle.addEventListener('click', function () {
      sidebar.classList.contains('show') ? close() : open();
    });
    backdrop.addEventListener('click', close);
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') close();
    });
    sidebar.querySelectorAll('a').forEach(function (a) {
      a.addEventListener('click', close);
    });
  })();
</script>
</body>
</html>
