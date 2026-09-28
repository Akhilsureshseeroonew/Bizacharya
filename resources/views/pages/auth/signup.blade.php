@extends('layouts.site')

@section('title', 'Sign Up | Bizacharya')
@section('description', 'Register as an Entrepreneur or Business Associate with Bizacharya. Phase 2 placeholder.')

@section('content')
<section class="page-banner">
  <div class="container">
    <ol class="breadcrumb" aria-label="Breadcrumb"><li><a href="{{ url('/') }}">Home</a></li><li aria-current="page">Sign Up</li></ol>
    <p class="eyebrow">Phase 2</p>
    <h1>Sign Up</h1>
    <p>Register as an Entrepreneur or a Business Associate.</p>
  </div>
</section>
<section class="section">
  <div class="container">
    <div class="auth-card form-card" data-reveal>
      <div class="phase-note" role="note"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg><p><strong>Phase 2 placeholder.</strong> Entrepreneur and Business Associate registration (tab-switch form with account creation) will be built with the PHP Laravel backend in Phase 2. This page shows the planned structure only &mdash; the form is disabled.</p></div>
      <div class="tabs" role="tablist" aria-label="Registration type" data-tabs>
        <button class="tabs__btn" type="button" role="tab" id="tab-ent" aria-selected="true" aria-controls="panel-ent">Entrepreneur Registration</button>
        <button class="tabs__btn" type="button" role="tab" id="tab-ba" aria-selected="false" aria-controls="panel-ba">Business Associate Registration</button>
      </div>
      <form class="tab-panel" id="panel-ent" role="tabpanel" aria-labelledby="tab-ent" method="post" action="#" novalidate>
        <fieldset disabled>
          <div class="row g-3">
            <div class="col-12 field"><label for="ent-name">Full Name</label><input id="ent-name" name="name" type="text"></div>
            <div class="col-12 field"><label for="ent-mobile">Mobile Number</label><input id="ent-mobile" name="mobile" type="tel"></div>
            <div class="col-12 field"><label for="ent-email">Email Address</label><input id="ent-email" name="email" type="email"></div>
            <div class="col-12 field"><label for="ent-password">Password</label><input id="ent-password" name="password" type="password"></div>
            <div class="col-12 field"><label for="ent-password_confirmation">Confirm Password</label><input id="ent-password_confirmation" name="password_confirmation" type="password"></div>
            <div class="col-12 field"><label for="ent-district">District</label><select id="ent-district" name="district"><option value="">Select district</option><option>Thiruvananthapuram</option><option>Kollam</option><option>Pathanamthitta</option><option>Alappuzha</option><option>Kottayam</option><option>Idukki</option><option>Ernakulam</option><option>Thrissur</option><option>Palakkad</option><option>Malappuram</option><option>Kozhikode</option><option>Wayanad</option><option>Kannur</option><option>Kasaragod</option></select></div>
            <div class="col-12 field"><label for="ent-stage">Business Stage</label><select id="ent-stage" name="business_stage"><option>Idea</option><option>Existing Business</option><option>Startup</option><option>MSME</option></select></div>
            <div class="col-12 field field--check"><input id="ent-terms" name="terms" type="checkbox"><label for="ent-terms">Agree to Terms &amp; Conditions</label></div>
            <div class="col-12"><button class="btn btn--primary btn--lg" type="submit" style="width:100%"><span class="btn__label"><span class="btn__t">Create Entrepreneur Account</span><span class="btn__t btn__t--alt" aria-hidden="true">Create Entrepreneur Account</span></span></button></div>
          </div>
        </fieldset>
      </form>
      <form class="tab-panel" id="panel-ba" role="tabpanel" aria-labelledby="tab-ba" method="post" action="#" novalidate hidden>
        <fieldset disabled>
          <div class="row g-3">
            <div class="col-12 field"><label for="ba2-name">Full Name</label><input id="ba2-name" name="ba2-name" type="text"></div>
            <div class="col-12 field"><label for="ba2-mobile">Mobile Number</label><input id="ba2-mobile" name="ba2-mobile" type="tel"></div>
            <div class="col-12 field"><label for="ba2-email">Email Address</label><input id="ba2-email" name="ba2-email" type="email"></div>
            <div class="col-12 field"><label for="ba2-password">Password</label><input id="ba2-password" name="ba2-password" type="password"></div>
            <div class="col-12 field"><label for="ba2-password_confirmation">Confirm Password</label><input id="ba2-password_confirmation" name="ba2-password_confirmation" type="password"></div>
            <div class="col-12 field"><label for="ba2-district">District</label><select id="ba2-district" name="district"><option value="">Select district</option><option>Thiruvananthapuram</option><option>Kollam</option><option>Pathanamthitta</option><option>Alappuzha</option><option>Kottayam</option><option>Idukki</option><option>Ernakulam</option><option>Thrissur</option><option>Palakkad</option><option>Malappuram</option><option>Kozhikode</option><option>Wayanad</option><option>Kannur</option><option>Kasaragod</option></select></div>
            <div class="col-12 field"><label for="ba2-occupation">Occupation</label><input id="ba2-occupation" name="ba2-occupation" type="text"></div>
            <div class="col-12 field"><label for="ba2-organization">Organization (Optional)</label><input id="ba2-organization" name="ba2-organization" type="text"></div>
            <div class="col-12 field"><label for="ba2-why">Why do you want to become a Business Associate? (Optional)</label><textarea id="ba2-why" name="why" rows="3"></textarea></div>
            <div class="col-12 field field--check"><input id="ba2-terms" name="terms" type="checkbox"><label for="ba2-terms">Agree to Terms &amp; Conditions</label></div>
            <div class="col-12"><button class="btn btn--primary btn--lg" type="submit" style="width:100%"><span class="btn__label"><span class="btn__t">Create Business Associate Account</span><span class="btn__t btn__t--alt" aria-hidden="true">Create Business Associate Account</span></span></button></div>
          </div>
        </fieldset>
      </form>
      <p class="text-center muted" style="margin:1.25rem 0 0;font-size:.92rem">Already registered? <a href="{{ route('login') }}">Login</a></p>
    </div>
  </div>
</section>
@endsection
