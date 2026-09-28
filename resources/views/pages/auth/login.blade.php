@extends('layouts.site')

@section('title', 'Login | Bizacharya')
@section('description', 'Sign in to your Bizacharya Entrepreneur or Business Associate account. Phase 2 placeholder.')

@section('content')
<section class="page-banner">
  <div class="container">
    <ol class="breadcrumb" aria-label="Breadcrumb"><li><a href="{{ url('/') }}">Home</a></li><li aria-current="page">Login</li></ol>
    <p class="eyebrow">Phase 2</p>
    <h1>Login</h1>
    <p>Sign in to your Entrepreneur or Business Associate account.</p>
  </div>
</section>
<section class="section">
  <div class="container">
    <div class="auth-card form-card" data-reveal>
      <div class="phase-note" role="note"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg><p><strong>Phase 2 placeholder.</strong> Separate login portals for registered Entrepreneurs and Business Associates, each redirecting to a role-specific dashboard, will be built with the PHP Laravel backend in Phase 2. This page shows the planned structure only &mdash; the form is disabled.</p></div>
      <form method="post" action="#" novalidate>
        <fieldset disabled>
          <div class="row g-3">
            <div class="col-12 field"><label for="login-type">Account type</label><select id="login-type" name="account_type"><option>Entrepreneur</option><option>Business Associate</option></select></div>
            <div class="col-12 field"><label for="login-login">Email or Mobile Number</label><input id="login-login" name="login" type="text"></div>
            <div class="col-12 field"><label for="login-password">Password</label><input id="login-password" name="password" type="password"></div>
            <div class="col-12"><button class="btn btn--primary btn--lg" type="submit" style="width:100%"><span class="btn__label"><span class="btn__t">Sign In</span><span class="btn__t btn__t--alt" aria-hidden="true">Sign In</span></span></button></div>
          </div>
        </fieldset>
      </form>
      <p class="text-center muted" style="margin:1.25rem 0 0;font-size:.92rem">New to Bizacharya? <a href="{{ route('signup') }}">Create an account</a> &middot; Preview the planned portals: <a href="{{ route('portal.entrepreneur') }}">Entrepreneur</a>, <a href="{{ route('portal.associate') }}">Business Associate</a></p>
    </div>
  </div>
</section>
@endsection
