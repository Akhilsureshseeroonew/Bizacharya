<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex, nofollow">
  <title>Admin Login | Bizacharya</title>
  <link rel="icon" type="image/png" href="{{ asset('assets/img/icon.png') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
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
      --ease: cubic-bezier(.22, 1, .36, 1);
    }
    *, *::before, *::after { box-sizing: border-box; }
    html, body { height: 100%; }
    body { margin: 0; font-family: "DM Sans", system-ui, -apple-system, "Segoe UI", sans-serif; color: var(--text); background: #fff; -webkit-font-smoothing: antialiased; }

    .auth { min-height: 100vh; display: grid; grid-template-columns: 1.1fr 1fr; }

    /* ---------- Brand panel ---------- */
    .brand { position: relative; overflow: hidden; color: #fff; padding: 3rem; display: flex; flex-direction: column; justify-content: space-between; isolation: isolate;
      background: var(--navy) url('{{ asset('assets/img/hero-chess.jpg') }}') center / cover no-repeat; }
    .brand::before { content: ""; position: absolute; inset: 0; z-index: -1;
      background: linear-gradient(155deg, rgba(10, 37, 64, .94) 0%, rgba(7, 87, 154, .82) 55%, rgba(26, 154, 140, .72) 100%); }
    .brand::after { content: ""; position: absolute; width: 520px; height: 520px; right: -180px; bottom: -200px; z-index: -1; border-radius: 50%;
      background: radial-gradient(circle, rgba(26, 154, 140, .45), transparent 65%); filter: blur(10px); animation: float 12s ease-in-out infinite alternate; }

    .brand__chevrons { position: absolute; left: -40px; top: 50%; width: 460px; transform: translateY(-50%); z-index: -1; opacity: .22; }
    .brand__chevrons path { fill: none; stroke-width: 9; stroke-linecap: square; stroke-dasharray: 700; stroke-dashoffset: 700; animation: draw 2.4s var(--ease) forwards; }
    .brand__chevrons path:nth-child(odd) { stroke: #fff; }
    .brand__chevrons path:nth-child(even) { stroke: var(--teal); }
    .brand__chevrons path:nth-child(2) { animation-delay: .15s; }
    .brand__chevrons path:nth-child(3) { animation-delay: .3s; }
    .brand__chevrons path:nth-child(4) { animation-delay: .45s; }
    .brand__chevrons path:nth-child(5) { animation-delay: .6s; }
    .brand__chevrons path:nth-child(6) { animation-delay: .75s; }

    .brand__logo { display: inline-flex; align-items: center; gap: .75rem; font-weight: 700; letter-spacing: .18em; font-size: .95rem; text-transform: uppercase; }
    .brand__logo img { width: 42px; height: auto; background: #fff; border-radius: 12px; padding: 6px; box-shadow: 0 10px 30px -10px rgba(0, 0, 0, .5); }

    .brand__body { max-width: 460px; animation: rise .9s var(--ease) both .2s; }
    .eyebrow { display: inline-flex; align-items: center; gap: .5rem; font-size: .78rem; font-weight: 600; letter-spacing: .16em; text-transform: uppercase; color: #BFF3EC;
      background: rgba(255, 255, 255, .08); border: 1px solid rgba(255, 255, 255, .16); padding: .4rem .85rem; border-radius: 999px; backdrop-filter: blur(6px); }
    .eyebrow::before { content: ""; width: 7px; height: 7px; border-radius: 50%; background: var(--teal); box-shadow: 0 0 0 4px rgba(26, 154, 140, .3); animation: pulse 2s infinite; }
    .brand h2 { font-size: clamp(2rem, 3.4vw, 3rem); line-height: 1.1; margin: 1.25rem 0 1rem; font-weight: 700; letter-spacing: -.02em; }
    .brand h2 span { background: linear-gradient(90deg, #7FE3D6, #fff); -webkit-background-clip: text; background-clip: text; color: transparent; }
    .brand p { color: rgba(255, 255, 255, .78); font-size: 1.05rem; line-height: 1.6; margin: 0; }

    .brand__chips { display: flex; flex-wrap: wrap; gap: .6rem; margin-top: 2rem; }
    .chip { display: inline-flex; align-items: center; gap: .5rem; font-size: .85rem; padding: .55rem .9rem; border-radius: 12px;
      background: rgba(255, 255, 255, .08); border: 1px solid rgba(255, 255, 255, .14); backdrop-filter: blur(8px); }
    .chip svg { width: 16px; height: 16px; stroke: #7FE3D6; }

    .brand__foot { font-size: .82rem; color: rgba(255, 255, 255, .6); letter-spacing: .04em; }

    /* ---------- Form panel ---------- */
    .panel { position: relative; display: flex; align-items: center; justify-content: center; padding: 3rem 1.5rem; background:
      radial-gradient(circle at 100% 0%, rgba(7, 87, 154, .07), transparent 40%),
      radial-gradient(circle at 0% 100%, rgba(26, 154, 140, .08), transparent 40%), #fff; }
    .panel::before { content: ""; position: absolute; inset: 0; pointer-events: none; opacity: .5;
      background-image: radial-gradient(rgba(7, 87, 154, .12) 1px, transparent 1px); background-size: 22px 22px;
      -webkit-mask-image: linear-gradient(180deg, #000, transparent 45%); mask-image: linear-gradient(180deg, #000, transparent 45%); }

    .card { position: relative; width: 100%; max-width: 410px; animation: rise .8s var(--ease) both; }
    .card__logo { display: block; height: 42px; width: auto; margin-bottom: 2.25rem; }
    .card h1 { font-size: 1.9rem; color: var(--ink); margin: 0 0 .4rem; font-weight: 700; letter-spacing: -.02em; }
    .card h1 .wave { display: inline-block; transform-origin: 70% 70%; animation: wave 2.4s ease-in-out 1s 2; }
    .card .lead { margin: 0 0 2rem; color: var(--muted); }

    .alert { display: flex; gap: .65rem; align-items: flex-start; padding: .85rem 1rem; margin-bottom: 1.5rem; border-radius: 12px; font-size: .92rem;
      color: var(--danger); background: #FDF1EF; border: 1px solid #F5C6BF; animation: shake .45s ease; }
    .alert svg { flex: none; width: 18px; height: 18px; margin-top: 1px; stroke: currentColor; }

    .field { margin-bottom: 1.15rem; }
    .field label { display: block; font-size: .85rem; font-weight: 600; color: var(--ink); margin-bottom: .45rem; }
    .control { position: relative; }
    .control > svg { position: absolute; left: 1rem; top: 50%; width: 19px; height: 19px; transform: translateY(-50%); stroke: var(--muted); transition: stroke .2s; pointer-events: none; }
    .control input { width: 100%; font: inherit; font-size: 1rem; color: var(--ink); padding: .95rem 1rem .95rem 2.9rem; border-radius: 14px;
      border: 1.5px solid var(--line); background: var(--surface); outline: none; transition: border-color .2s, background .2s, box-shadow .2s; }
    .control input::placeholder { color: #9AA8B8; }
    .control input:hover { border-color: #BFD0E0; }
    .control input:focus { border-color: var(--primary); background: #fff; box-shadow: 0 0 0 4px rgba(7, 87, 154, .12); }
    .control:focus-within > svg { stroke: var(--primary); }
    .control--pw input { padding-right: 3.2rem; }
    .toggle { position: absolute; right: .55rem; top: 50%; transform: translateY(-50%); width: 38px; height: 38px; display: grid; place-items: center;
      border: 0; border-radius: 10px; background: transparent; color: var(--muted); cursor: pointer; transition: background .2s, color .2s; }
    .toggle:hover { background: rgba(7, 87, 154, .08); color: var(--primary); }
    .toggle:focus-visible { outline: 2px solid var(--primary); outline-offset: 1px; }
    .toggle svg { width: 19px; height: 19px; stroke: currentColor; }
    .toggle .eye-off { display: none; }
    .toggle[aria-pressed="true"] .eye { display: none; }
    .toggle[aria-pressed="true"] .eye-off { display: block; }
    .field.is-invalid input { border-color: var(--danger); background: #fff; }

    .row { display: flex; align-items: center; justify-content: space-between; margin: .5rem 0 1.75rem; }
    .check { display: inline-flex; align-items: center; gap: .6rem; cursor: pointer; font-size: .92rem; user-select: none; }
    .check input { position: absolute; opacity: 0; width: 1px; height: 1px; }
    .check .box { width: 20px; height: 20px; border-radius: 6px; border: 1.5px solid #B7C6D6; display: grid; place-items: center; transition: all .2s var(--ease); background: #fff; }
    .check .box svg { width: 13px; height: 13px; stroke: #fff; stroke-width: 3.5; stroke-dasharray: 20; stroke-dashoffset: 20; transition: stroke-dashoffset .3s var(--ease) .05s; }
    .check input:checked + .box { background: var(--primary); border-color: var(--primary); }
    .check input:checked + .box svg { stroke-dashoffset: 0; }
    .check input:focus-visible + .box { box-shadow: 0 0 0 4px rgba(7, 87, 154, .18); }
    .secure { display: inline-flex; align-items: center; gap: .35rem; font-size: .8rem; color: var(--muted); }
    .secure svg { width: 14px; height: 14px; stroke: var(--teal); }

    .btn { position: relative; width: 100%; display: inline-flex; align-items: center; justify-content: center; gap: .6rem; overflow: hidden;
      font: inherit; font-weight: 600; font-size: 1.02rem; color: #fff; padding: 1rem 1.25rem; border: 0; border-radius: 14px; cursor: pointer;
      background: linear-gradient(120deg, var(--primary) 0%, var(--primary-2) 50%, var(--teal) 100%); background-size: 200% 100%; background-position: 0% 0;
      box-shadow: 0 14px 30px -12px rgba(7, 87, 154, .6); transition: background-position .5s var(--ease), transform .2s var(--ease), box-shadow .2s; }
    .btn:hover { background-position: 100% 0; transform: translateY(-2px); box-shadow: 0 18px 36px -12px rgba(7, 87, 154, .7); }
    .btn:active { transform: translateY(0); }
    .btn:focus-visible { outline: 3px solid rgba(7, 87, 154, .35); outline-offset: 3px; }
    .btn svg { width: 19px; height: 19px; stroke: currentColor; transition: transform .3s var(--ease); }
    .btn:hover svg { transform: translateX(4px); }
    .btn::after { content: ""; position: absolute; top: 0; left: -75%; width: 50%; height: 100%; transform: skewX(-20deg);
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, .35), transparent); transition: left .7s var(--ease); }
    .btn:hover::after { left: 130%; }
    .btn .spinner { display: none; width: 19px; height: 19px; border: 2.5px solid rgba(255, 255, 255, .4); border-top-color: #fff; border-radius: 50%; animation: spin .7s linear infinite; }
    .btn.is-loading { pointer-events: none; }
    .btn.is-loading .spinner { display: block; }
    .btn.is-loading .arrow { display: none; }

    .back { display: inline-flex; align-items: center; gap: .4rem; margin-top: 2rem; font-size: .9rem; color: var(--muted); text-decoration: none; transition: color .2s; }
    .back:hover { color: var(--primary); }
    .back svg { width: 16px; height: 16px; stroke: currentColor; transition: transform .2s var(--ease); }
    .back:hover svg { transform: translateX(-3px); }

    svg { fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }

    @keyframes rise { from { opacity: 0; transform: translateY(18px); } to { opacity: 1; transform: none; } }
    @keyframes draw { to { stroke-dashoffset: 0; } }
    @keyframes float { from { transform: translate(0, 0); } to { transform: translate(-60px, -40px); } }
    @keyframes pulse { 0%, 100% { box-shadow: 0 0 0 4px rgba(26, 154, 140, .3); } 50% { box-shadow: 0 0 0 7px rgba(26, 154, 140, .08); } }
    @keyframes wave { 0%, 60%, 100% { transform: rotate(0); } 10%, 30% { transform: rotate(14deg); } 20% { transform: rotate(-8deg); } 40% { transform: rotate(-4deg); } 50% { transform: rotate(10deg); } }
    @keyframes shake { 0%, 100% { transform: translateX(0); } 20%, 60% { transform: translateX(-6px); } 40%, 80% { transform: translateX(6px); } }
    @keyframes spin { to { transform: rotate(360deg); } }

    @media (max-width: 991px) {
      .auth { grid-template-columns: 1fr; }
      .brand { padding: 2rem 1.5rem 2.25rem; min-height: auto; }
      .brand__body { margin-top: 1.75rem; }
      .brand h2 { font-size: 1.7rem; margin: 1rem 0 .5rem; }
      .brand p { font-size: .95rem; }
      .brand__chips, .brand__foot { display: none; }
      .brand__chevrons { width: 300px; left: auto; right: -60px; }
      .panel { padding: 2.5rem 1rem 3rem; }
      .card__logo { display: none; }
    }
    @media (prefers-reduced-motion: reduce) {
      *, *::before, *::after { animation-duration: .01ms !important; animation-iteration-count: 1 !important; transition-duration: .01ms !important; }
      .brand__chevrons path { stroke-dashoffset: 0; }
    }
  </style>
</head>
<body>
  <main class="auth">
    <aside class="brand">
      <svg class="brand__chevrons" viewBox="0 0 240 280" aria-hidden="true" focusable="false">
        <path d="M10 70 L130 10 L230 60"/>
        <path d="M10 110 L110 160"/>
        <path d="M10 130 L130 70 L230 120"/>
        <path d="M10 170 L110 220"/>
        <path d="M10 190 L130 130 L230 180"/>
        <path d="M10 230 L110 280"/>
      </svg>

      <div class="brand__logo">
        <img src="{{ asset('assets/img/logo-mark.png') }}" alt="">
        <span>Bizacharya</span>
      </div>

      <div class="brand__body">
        <span class="eyebrow">Admin Console</span>
        <h2>The science of <span>business success</span>, managed here.</h2>
        <p>Update pages, sectors, services and events, and follow up on every enquiry from one place.</p>
        <div class="brand__chips">
          <span class="chip"><svg viewBox="0 0 24 24"><path d="M3 3v18h18"/><path d="m19 9-5 5-4-4-3 3"/></svg>Leads &amp; enquiries</span>
          <span class="chip"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>Events</span>
          <span class="chip"><svg viewBox="0 0 24 24"><path d="M12 20h9"/><path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg>Site content</span>
        </div>
      </div>

      <div class="brand__foot">&copy; {{ date('Y') }} {{ config('site.legal_name') }}</div>
    </aside>

    <section class="panel">
      <div class="card">
        <img class="card__logo" src="{{ asset('assets/img/logo.png') }}" alt="Bizacharya">
        <h1>Welcome back <span class="wave" aria-hidden="true">&#128075;</span></h1>
        <p class="lead">Sign in to the Bizacharya admin panel.</p>

        @if ($errors->any())
          <div class="alert" role="alert">
            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 8v4M12 16h.01"/></svg>
            <div>
              @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
              @endforeach
            </div>
          </div>
        @endif

        <form method="post" action="{{ route('admin.login.attempt') }}" id="login-form">
          @csrf
          <div class="field @error('email') is-invalid @enderror">
            <label for="email">Email address</label>
            <div class="control">
              <svg viewBox="0 0 24 24"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
              <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="you@bizacharya.com" autocomplete="username" required autofocus>
            </div>
          </div>

          <div class="field">
            <label for="password">Password</label>
            <div class="control control--pw">
              <svg viewBox="0 0 24 24"><rect width="18" height="11" x="3" y="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
              <input type="password" id="password" name="password" placeholder="Enter your password" autocomplete="current-password" required>
              <button type="button" class="toggle" aria-label="Show password" aria-pressed="false" id="pw-toggle">
                <svg class="eye" viewBox="0 0 24 24"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z"/><circle cx="12" cy="12" r="3"/></svg>
                <svg class="eye-off" viewBox="0 0 24 24"><path d="M9.9 4.24A9.1 9.1 0 0 1 12 4c6.5 0 10 8 10 8a13.2 13.2 0 0 1-1.67 2.68"/><path d="M6.61 6.61A13.5 13.5 0 0 0 2 12s3.5 8 10 8a9.7 9.7 0 0 0 5.39-1.61"/><path d="M14.12 14.12a3 3 0 1 1-4.24-4.24"/><path d="m2 2 20 20"/></svg>
              </button>
            </div>
          </div>

          <div class="row">
            <label class="check" for="remember">
              <input type="checkbox" name="remember" id="remember" @checked(old('remember'))>
              <span class="box"><svg viewBox="0 0 24 24"><path d="M20 6 9 17l-5-5"/></svg></span>
              Remember me
            </label>
            <span class="secure"><svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z"/></svg>Secure login</span>
          </div>

          <button type="submit" class="btn" id="login-btn">
            <span>Sign in to dashboard</span>
            <svg class="arrow" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            <span class="spinner" aria-hidden="true"></span>
          </button>
        </form>

        <a class="back" href="{{ url('/') }}"><svg viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>Back to website</a>
      </div>
    </section>
  </main>

  <script>
    (function () {
      var toggle = document.getElementById('pw-toggle');
      var pw = document.getElementById('password');
      toggle.addEventListener('click', function () {
        var show = pw.type === 'password';
        pw.type = show ? 'text' : 'password';
        toggle.setAttribute('aria-pressed', show);
        toggle.setAttribute('aria-label', show ? 'Hide password' : 'Show password');
        pw.focus();
      });
      document.getElementById('login-form').addEventListener('submit', function () {
        document.getElementById('login-btn').classList.add('is-loading');
      });
    })();
  </script>
</body>
</html>
