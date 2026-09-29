<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Dashboard') | Bizacharya Admin</title>
  <link rel="icon" type="image/png" href="{{ asset('assets/img/icon.png') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.snow.css" rel="stylesheet">
  <style>
    :root {
      --navy: #0A2540;
      --navy-2: #123B63;
      --primary: #07579A;
      --primary-2: #1F6DAE;
      --teal: #1A9A8C;
      --ink: #12202E;
      --text: #3B4A5A;
      --muted: #627288;
      --line: #D9E4EE;
      --surface: #F2F7FB;
      --danger: #C0392B;

      --bs-primary: var(--primary);
      --bs-primary-rgb: 7, 87, 154;
      --bs-link-color: var(--primary);
      --bs-link-color-rgb: 7, 87, 154;
      --bs-link-hover-color: var(--primary-2);
      --bs-body-font-family: "DM Sans", system-ui, -apple-system, "Segoe UI", sans-serif;
      --bs-body-color: var(--text);
      --bs-border-radius: .55rem;
      --bs-border-radius-sm: .4rem;
      --bs-border-radius-lg: .75rem;
    }
    body { background: var(--surface); }
    .btn { transition: background-color .15s ease, border-color .15s ease, box-shadow .15s ease, transform .1s ease; }
    .btn-primary { background: var(--primary); border-color: var(--primary); }
    .btn-primary:hover, .btn-primary:focus { background: var(--primary-2); border-color: var(--primary-2); }
    .btn-primary:active { transform: translateY(1px); }
    .card { border-color: var(--line); box-shadow: 0 1px 2px rgba(18, 32, 46, .04); transition: box-shadow .18s ease, transform .18s ease; }
    .table-light { --bs-table-bg: #F7FAFC; }
    .table-hover > tbody > tr:hover > * { background-color: #F0F6FB; }
    .table > :not(caption) > * > * { padding: .65rem .75rem; }
    .form-control, .form-select { transition: border-color .15s ease, box-shadow .15s ease; }
    .form-control:focus, .form-select:focus { border-color: var(--primary-2); box-shadow: 0 0 0 .2rem rgba(7, 87, 154, .12); }
    a { color: var(--primary); }
    .page-link { color: var(--primary); }
    .page-item.active .page-link { background: var(--primary); border-color: var(--primary); }
    h1, h2, h3, .h4 { color: var(--ink); }

    .admin-form-section {
      font-size: .8rem; font-weight: 700; text-transform: uppercase; letter-spacing: .04em;
      color: var(--muted); margin: 1.75rem 0 .9rem; padding-bottom: .4rem; border-bottom: 1px solid var(--line);
    }
    .admin-form-section:first-child { margin-top: 0; }

    .admin-sidebar {
      min-height: 100vh; width: 258px; color: #fff;
      background: linear-gradient(180deg, var(--navy) 0%, var(--navy-2) 100%);
      box-shadow: 2px 0 12px rgba(10, 37, 64, .15);
    }
    .admin-sidebar a.nav-link-item {
      color: #C9D6E5; text-decoration: none; display: flex; align-items: center; gap: .6rem;
      padding: .5rem .9rem; margin: 0 0 .1rem; border-radius: .5rem; font-size: .92rem;
      border-left: 3px solid transparent; transition: background-color .15s ease, color .15s ease, border-color .15s ease;
    }
    .admin-sidebar a.nav-link-item .icon { flex-shrink: 0; width: 17px; height: 17px; opacity: .8; transition: opacity .15s ease; }
    .admin-sidebar a.nav-link-item:hover { background: rgba(255,255,255,.08); color: #fff; }
    .admin-sidebar a.nav-link-item.active { background: rgba(26,154,140,.18); color: #fff; border-left-color: var(--teal); }
    .admin-sidebar a.nav-link-item.active .icon { opacity: 1; color: var(--teal); }
    .admin-sidebar .nav-heading { color: #7f93ad; font-size: .68rem; font-weight: 600; text-transform: uppercase; letter-spacing: .07em; margin: 1.25rem 0 .35rem .9rem; }
    .admin-sidebar .brand {
      color: #fff; font-weight: 700; font-size: 1.05rem; padding: 1.15rem .9rem; display: flex; align-items: center; gap: .55rem;
      border-bottom: 1px solid rgba(255,255,255,.08); margin-bottom: .5rem;
    }
    .admin-sidebar .brand { text-decoration: none; flex-direction: column; align-items: flex-start; gap: .45rem; padding: 1.35rem 1rem 1.15rem; }
    .admin-sidebar .brand__logo { display: block; width: 190px; max-width: 100%; height: auto; filter: brightness(0) invert(1); }
    .admin-sidebar .brand__tag { font-size: .66rem; font-weight: 600; letter-spacing: .14em; text-transform: uppercase; color: var(--teal); padding: .15rem .5rem; border-radius: 999px; background: rgba(26,154,140,.15); }
    .admin-sidebar .brand__mark {
      width: 30px; height: 30px; border-radius: 8px; flex-shrink: 0; display: inline-flex; align-items: center; justify-content: center;
      background: linear-gradient(155deg, var(--teal), var(--primary-2)); font-size: .85rem; font-weight: 800;
    }
    .sidebar-count {
      margin-left: auto; background: #E8A33D; color: #2B1D00; font-size: .68rem; font-weight: 700;
      border-radius: 999px; min-width: 1.25rem; height: 1.25rem; display: inline-flex; align-items: center; justify-content: center; padding: 0 .35rem;
    }
    .badge-new { font-size: .65rem; }
    .admin-topbar { box-shadow: 0 1px 3px rgba(18, 32, 46, .06); position: sticky; top: 0; z-index: 10; }
    .admin-topbar__title { min-width: 0; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; font-weight: 600; color: var(--ink); }
    .admin-user-chip {
      display: inline-flex; align-items: center; gap: .45rem; padding: .25rem .6rem .25rem .25rem; border-radius: 999px;
      background: var(--surface); color: var(--text) !important; font-weight: 500;
    }
    .admin-user-chip__avatar {
      width: 1.6rem; height: 1.6rem; border-radius: 50%; background: var(--primary); color: #fff;
      display: inline-flex; align-items: center; justify-content: center; font-size: .7rem; font-weight: 700; flex-shrink: 0;
    }
    .sidebar-toggle { display: none; }
    .d-flex > .flex-grow-1 { min-width: 0; }

    /* Dashboard */
    .dash-hero {
      display: flex; align-items: center; justify-content: space-between; gap: 1rem; flex-wrap: wrap;
      background: linear-gradient(120deg, var(--navy) 0%, var(--primary) 100%); color: #fff;
      border-radius: var(--bs-border-radius-lg); padding: 1.5rem 1.75rem; margin-bottom: 1.5rem;
      box-shadow: 0 8px 24px -12px rgba(10, 37, 64, .35);
    }
    .dash-hero__eyebrow { color: rgba(255,255,255,.72); font-size: .78rem; text-transform: uppercase; letter-spacing: .06em; margin: 0 0 .25rem; }
    .dash-hero__title { font-size: 1.5rem; font-weight: 700; margin: 0 0 .3rem; color: #fff; }
    .dash-hero__sub { margin: 0; color: rgba(255,255,255,.82); font-size: .92rem; }
    .dash-hero__cta { flex-shrink: 0; font-weight: 600; }

    .stat-card {
      display: flex; align-items: flex-start; gap: .85rem; position: relative;
      background: #fff; border: 1px solid var(--line); border-radius: var(--bs-border-radius-lg);
      padding: 1.1rem 1.2rem;
    }
    .stat-card:hover { box-shadow: 0 10px 24px -14px rgba(18, 32, 46, .25); transform: translateY(-2px); }
    .stat-card__icon {
      width: 2.5rem; height: 2.5rem; border-radius: .65rem; flex-shrink: 0;
      display: inline-flex; align-items: center; justify-content: center;
    }
    .stat-card__icon svg { width: 20px; height: 20px; }
    .stat-card--blue .stat-card__icon { background: #E5EFF8; color: var(--primary); }
    .stat-card--teal .stat-card__icon { background: #E1F3F0; color: var(--teal); }
    .stat-card--gold .stat-card__icon { background: #FBF1DE; color: #B4790E; }
    .stat-card--plum .stat-card__icon { background: #F3E8F3; color: #8E3E8E; }
    .stat-card__label { color: var(--muted); font-size: .82rem; margin: 0 0 .15rem; }
    .stat-card__value { color: var(--ink); font-size: 1.7rem; font-weight: 700; margin: 0; line-height: 1; }
    .stat-card__badge {
      position: absolute; top: .8rem; right: .9rem; background: #FBF1DE; color: #B4790E;
      font-size: .68rem; font-weight: 700; border-radius: 999px; padding: .15rem .5rem;
    }

    .quick-actions {
      background: #fff; border: 1px solid var(--line); border-radius: var(--bs-border-radius-lg);
      padding: 1rem 1.2rem; margin-top: .5rem;
    }
    .quick-actions__label { color: var(--muted); font-size: .78rem; text-transform: uppercase; letter-spacing: .05em; font-weight: 600; margin: 0 0 .6rem; }

    /* Rich text editor (Quill) mount */
    .richtext-editor .ql-toolbar { border-color: var(--bs-border-color, #dee2e6); border-radius: .55rem .55rem 0 0; background: #fff; }
    .richtext-editor .ql-container { border-color: var(--bs-border-color, #dee2e6); border-radius: 0 0 .55rem .55rem; min-height: 9rem; font-family: inherit; font-size: 1rem; }

    /* "Add item" repeater (progressive enhancement over list/pairs textareas) */
    .repeater__row { display: flex; gap: .5rem; align-items: flex-start; margin-bottom: .5rem; }
    .repeater__row .repeater__inputs { flex: 1 1 auto; display: flex; flex-direction: column; gap: .35rem; }
    .repeater__row .repeater__inputs.repeater__inputs--pair { flex-direction: row; }
    .repeater__remove {
      flex-shrink: 0; width: 2.1rem; height: 2.1rem; border: 1px solid var(--line); border-radius: .5rem;
      background: #fff; color: var(--danger); display: inline-flex; align-items: center; justify-content: center; margin-top: 0;
    }
    .repeater__remove:hover { background: #FBE7E5; }
    .repeater__add { margin-top: .15rem; }
    .repeater__count { font-size: .78rem; color: var(--muted); margin-left: .5rem; }

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
    <a class="brand" href="{{ route('admin.dashboard') }}" aria-label="Bizacharya admin dashboard"><img class="brand__logo" src="{{ asset('assets/img/logo.png') }}" alt="Bizacharya" width="190" height="39"><span class="brand__tag">Admin panel</span></a>
    <div class="px-2 pb-4">
      @php
        $counts = $sidebarNewCounts ?? [];
        $icon = fn ($paths) => '<svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'.$paths.'</svg>';
      @endphp
      <a href="{{ route('admin.dashboard') }}" class="nav-link-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">{!! $icon('<rect x="3" y="3" width="7" height="9" rx="1"/><rect x="14" y="3" width="7" height="5" rx="1"/><rect x="14" y="12" width="7" height="9" rx="1"/><rect x="3" y="16" width="7" height="5" rx="1"/>') !!}Dashboard</a>

      <p class="nav-heading">Website Pages</p>
      <a href="{{ route('admin.pages.index') }}" class="nav-link-item {{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">{!! $icon('<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6"/>') !!}Pages</a>
      <a href="{{ route('admin.menu-items.index') }}" class="nav-link-item {{ request()->routeIs('admin.menu-items.*') ? 'active' : '' }}">{!! $icon('<line x1="4" y1="6" x2="20" y2="6"/><line x1="4" y1="12" x2="20" y2="12"/><line x1="4" y1="18" x2="20" y2="18"/>') !!}Website Menu Links</a>
      <a href="{{ route('admin.settings.edit') }}" class="nav-link-item {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">{!! $icon('<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>') !!}Contact Info &amp; Social Links</a>

      <p class="nav-heading">Content Lists</p>
      <a href="{{ route('admin.sectors.index') }}" class="nav-link-item {{ request()->routeIs('admin.sectors.*') ? 'active' : '' }}">{!! $icon('<polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/>') !!}Sectors (Opportunities)</a>
      <a href="{{ route('admin.services.index') }}" class="nav-link-item {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">{!! $icon('<path d="M20 7h-3V5a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H4a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1z"/><path d="M9 7V5h6v2"/>') !!}Services</a>
      <a href="{{ route('admin.success-stories.index') }}" class="nav-link-item {{ request()->routeIs('admin.success-stories.*') ? 'active' : '' }}">{!! $icon('<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>') !!}Success Stories</a>
      <a href="{{ route('admin.events.index') }}" class="nav-link-item {{ request()->routeIs('admin.events.*') ? 'active' : '' }}">{!! $icon('<rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>') !!}Community Events</a>
      <a href="{{ route('admin.jobs.index') }}" class="nav-link-item {{ request()->routeIs('admin.jobs.*') ? 'active' : '' }}">{!! $icon('<rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>') !!}Job Openings</a>
      <a href="{{ route('admin.posts.index') }}" class="nav-link-item {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">{!! $icon('<path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>') !!}Learning Hub Articles</a>
      <a href="{{ route('admin.videos.index') }}" class="nav-link-item {{ request()->routeIs('admin.videos.*') ? 'active' : '' }}">{!! $icon('<polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2"/>') !!}Learning Hub Videos</a>

      <p class="nav-heading">Messages From Visitors</p>
      <a href="{{ route('admin.enquiries.index') }}" class="nav-link-item {{ request()->routeIs('admin.enquiries.*') ? 'active' : '' }}">{!! $icon('<path d="M4 4h16v16H4z" opacity="0"/><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 6-10 7L2 6"/>') !!}Enquiries @if(($counts['enquiries'] ?? 0) > 0)<span class="sidebar-count">{{ $counts['enquiries'] }}</span>@endif</a>
      <a href="{{ route('admin.event-registrations.index') }}" class="nav-link-item {{ request()->routeIs('admin.event-registrations.*') ? 'active' : '' }}">{!! $icon('<path d="m9 11 3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>') !!}Event Sign-ups @if(($counts['event-registrations'] ?? 0) > 0)<span class="sidebar-count">{{ $counts['event-registrations'] }}</span>@endif</a>
      <a href="{{ route('admin.job-applications.index') }}" class="nav-link-item {{ request()->routeIs('admin.job-applications.*') ? 'active' : '' }}">{!! $icon('<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6"/><line x1="9" y1="14" x2="15" y2="14"/><line x1="9" y1="17" x2="13" y2="17"/>') !!}Job Applications @if(($counts['job-applications'] ?? 0) > 0)<span class="sidebar-count">{{ $counts['job-applications'] }}</span>@endif</a>
      <a href="{{ route('admin.associates.index') }}" class="nav-link-item {{ request()->routeIs('admin.associates.*') ? 'active' : '' }}">{!! $icon('<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>') !!}Associate Sign-ups @if(($counts['associates'] ?? 0) > 0)<span class="sidebar-count">{{ $counts['associates'] }}</span>@endif</a>
    </div>
  </nav>

  <div class="flex-grow-1">
    <nav class="admin-topbar navbar navbar-expand navbar-light bg-white px-3 flex-nowrap">
      <button class="btn btn-outline-secondary btn-sm sidebar-toggle me-2" type="button" id="sidebarToggle" aria-label="Toggle menu" aria-expanded="false" aria-controls="adminSidebar">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
      </button>
      <span class="navbar-text admin-topbar__title">@yield('title', 'Dashboard')</span>
      <div class="ms-auto d-flex align-items-center gap-2 gap-lg-3">
        <a href="{{ url('/') }}" target="_blank" class="small d-none d-sm-inline">View site &#8599;</a>
        @php $userName = auth()->user()?->name ?? ''; @endphp
        <a href="{{ route('admin.profile.edit') }}" class="admin-user-chip small d-none d-sm-inline-flex {{ request()->routeIs('admin.profile.*') ? 'fw-bold' : '' }}">
          <span class="admin-user-chip__avatar">{{ collect(explode(' ', $userName))->map(fn ($p) => mb_substr($p, 0, 1))->take(2)->implode('') ?: '?' }}</span>
          {{ $userName }}
        </a>
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

<script src="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.min.js"></script>
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

  /* ---------- Rich text fields: swap the plain textarea for a Quill editor ---------- */
  (function () {
    var mounts = document.querySelectorAll('.richtext-editor');
    if (!mounts.length) return;

    mounts.forEach(function (mount) {
      var source = document.getElementById(mount.dataset.target);
      if (!source) return;

      var quill = new Quill(mount, {
        theme: 'snow',
        modules: {
          toolbar: [
            [{ header: [2, 3, false] }],
            ['bold', 'italic'],
            [{ list: 'ordered' }, { list: 'bullet' }],
            ['link'],
            ['clean'],
          ],
        },
      });
      quill.root.innerHTML = source.value;

      function sync() { source.value = quill.root.innerHTML; }
      quill.on('text-change', sync);

      var form = source.closest('form');
      if (form) form.addEventListener('submit', sync);
    });
  })();

  /* ---------- "One item per line" / "Title | Description" textareas: friendly add/remove rows ---------- */
  (function () {
    var mounts = document.querySelectorAll('.repeater');
    if (!mounts.length) return;

    function parseList(text) {
      return text.split(/\r\n|\r|\n/).map(function (l) { return l.trim(); }).filter(Boolean);
    }
    function parsePairs(text) {
      return parseList(text).map(function (line) {
        var i = line.indexOf('|');
        return i === -1
          ? { value: line.trim(), text: '' }
          : { value: line.slice(0, i).trim(), text: line.slice(i + 1).trim() };
      });
    }

    mounts.forEach(function (mount) {
      var source = document.getElementById(mount.dataset.target);
      if (!source) return;

      var kind = source.dataset.repeater; // 'list' or 'pairs'
      var max = parseInt(source.dataset.max || '0', 10) || null;
      var rows = kind === 'pairs' ? parsePairs(source.value) : parseList(source.value).map(function (v) { return { value: v, text: '' }; });
      if (!rows.length) rows = [{ value: '', text: '' }];

      var list = document.createElement('div');
      mount.appendChild(list);

      var addBtn = document.createElement('button');
      addBtn.type = 'button';
      addBtn.className = 'btn btn-sm btn-outline-secondary repeater__add';
      addBtn.textContent = '+ Add item';

      var countLabel = document.createElement('span');
      countLabel.className = 'repeater__count';

      var addWrap = document.createElement('div');
      addWrap.appendChild(addBtn);
      addWrap.appendChild(countLabel);
      mount.appendChild(addWrap);

      function sync() {
        var cleaned = rows
          .map(function (r) { return { value: (r.value || '').trim(), text: (r.text || '').trim() }; })
          .filter(function (r) { return r.value !== '' || r.text !== ''; });

        source.value = kind === 'pairs'
          ? cleaned.map(function (r) { return r.value + ' | ' + r.text; }).join('\n')
          : cleaned.map(function (r) { return r.value; }).join('\n');

        if (max) {
          countLabel.textContent = rows.length + ' of ' + max;
          addBtn.disabled = rows.length >= max;
        }
      }

      function render() {
        list.innerHTML = '';
        rows.forEach(function (row, i) {
          var rowEl = document.createElement('div');
          rowEl.className = 'repeater__row';

          var inputs = document.createElement('div');
          inputs.className = 'repeater__inputs' + (kind === 'pairs' ? ' repeater__inputs--pair' : '');

          var valueInput = document.createElement('input');
          valueInput.type = 'text';
          valueInput.className = 'form-control form-control-sm';
          valueInput.placeholder = kind === 'pairs' ? 'Title' : 'Item';
          valueInput.value = row.value || '';
          valueInput.addEventListener('input', function () { row.value = valueInput.value; sync(); });
          inputs.appendChild(valueInput);

          if (kind === 'pairs') {
            var textInput = document.createElement('input');
            textInput.type = 'text';
            textInput.className = 'form-control form-control-sm';
            textInput.placeholder = 'Description';
            textInput.value = row.text || '';
            textInput.addEventListener('input', function () { row.text = textInput.value; sync(); });
            inputs.appendChild(textInput);
          }

          rowEl.appendChild(inputs);

          var removeBtn = document.createElement('button');
          removeBtn.type = 'button';
          removeBtn.className = 'repeater__remove';
          removeBtn.setAttribute('aria-label', 'Remove this item');
          removeBtn.innerHTML = '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>';
          removeBtn.addEventListener('click', function () {
            rows.splice(i, 1);
            if (!rows.length) rows.push({ value: '', text: '' });
            render();
            sync();
          });
          rowEl.appendChild(removeBtn);

          list.appendChild(rowEl);
        });
        sync();
      }

      addBtn.addEventListener('click', function () {
        if (max && rows.length >= max) return;
        rows.push({ value: '', text: '' });
        render();
      });

      render();

      var form = source.closest('form');
      if (form) form.addEventListener('submit', sync);
    });
  })();
</script>
</body>
</html>
