@props(['event'])
<div class="modal" id="register-modal" role="dialog" aria-modal="true" aria-labelledby="register-title" aria-hidden="true">
  <div class="modal__backdrop"></div>
  <div class="modal__dialog">
    <button class="modal__close" type="button" data-modal-close aria-label="Close"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg></button>
    <h2 id="register-title">Register Now</h2>
    <p class="lead">{{ $event->title }} &middot; {{ $event->event_date?->format('d M Y') }}</p>
    <form method="post" action="{{ route('events.register', $event) }}" data-validate novalidate>
      @csrf
      <div class="row g-3" data-form-body>
        <div class="col-12 field"><label for="reg-name">Full Name</label><input id="reg-name" name="name" type="text" autocomplete="name" required data-autofocus><p class="field__error" aria-live="polite"></p></div>
        <div class="col-md-6 field"><label for="reg-phone">Phone number</label><input id="reg-phone" name="phone" type="tel" inputmode="numeric" autocomplete="tel" data-type="mobile" required><p class="field__error" aria-live="polite"></p></div>
        <div class="col-md-6 field"><label for="reg-email">Email</label><input id="reg-email" name="email" type="email" autocomplete="email" required><p class="field__error" aria-live="polite"></p></div>
        <div class="col-12 field"><label for="reg-address">Address</label><textarea id="reg-address" name="address" rows="2" autocomplete="street-address" required></textarea><p class="field__error" aria-live="polite"></p></div>
        <div class="col-md-6 field"><label for="reg-pin">Pincode</label><input id="reg-pin" name="pincode" type="text" inputmode="numeric" autocomplete="postal-code" data-type="pincode" required><p class="field__error" aria-live="polite"></p></div>
        <p class="field__error form-error" role="alert" hidden></p>
        <div class="col-12"><button class="btn btn--primary btn--lg" type="submit"><span class="btn__label"><span class="btn__t">Submit Registration</span><span class="btn__t btn__t--alt" aria-hidden="true">Submit Registration</span></span></button></div>
      </div>
      <div class="form-success" role="status" hidden><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg><div><strong>You are registered.</strong><p>We look forward to seeing you at {{ $event->title }}.</p></div></div>
    </form>
  </div>
</div>
