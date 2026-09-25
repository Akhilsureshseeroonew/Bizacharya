<div class="modal" id="associate-modal" role="dialog" aria-modal="true" aria-labelledby="associate-title" aria-hidden="true">
  <div class="modal__backdrop"></div>
  <div class="modal__dialog">
    <button class="modal__close" type="button" data-modal-close aria-label="Close"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg></button>
    <h2 id="associate-title">Business Associate Registration</h2>
    <p class="lead">Share your details and our team will get in touch with the next steps.</p>
    <form method="post" action="{{ route('associates.store') }}" data-validate novalidate>
      @csrf
      <div class="row g-3" data-form-body>
        <div class="col-12 field"><label for="ba-name">Full Name</label><input id="ba-name" name="name" type="text" autocomplete="name" required data-autofocus><p class="field__error" aria-live="polite"></p></div>
        <div class="col-md-6 field"><label for="ba-mobile">Mobile Number</label><input id="ba-mobile" name="mobile" type="tel" inputmode="numeric" autocomplete="tel" data-type="mobile" required><p class="field__error" aria-live="polite"></p></div>
        <div class="col-md-6 field"><label for="ba-email">Email Address</label><input id="ba-email" name="email" type="email" autocomplete="email" required><p class="field__error" aria-live="polite"></p></div>
        <div class="col-md-6 field"><label for="ba-district">District</label>
          <select id="ba-district" name="district" required><option value="">Select district</option><option>Thiruvananthapuram</option><option>Kollam</option><option>Pathanamthitta</option><option>Alappuzha</option><option>Kottayam</option><option>Idukki</option><option>Ernakulam</option><option>Thrissur</option><option>Palakkad</option><option>Malappuram</option><option>Kozhikode</option><option>Wayanad</option><option>Kannur</option><option>Kasaragod</option></select>
          <p class="field__error" aria-live="polite"></p></div>
        <div class="col-md-6 field"><label for="ba-occupation">Occupation</label><input id="ba-occupation" name="occupation" type="text" required><p class="field__error" aria-live="polite"></p></div>
        <div class="col-12 field"><label for="ba-org">Organization <span class="muted">(Optional)</span></label><input id="ba-org" name="organization" type="text" autocomplete="organization"><p class="field__error" aria-live="polite"></p></div>
        <div class="col-12 field"><label for="ba-why">Why do you want to become a Business Associate? <span class="muted">(Optional)</span></label><textarea id="ba-why" name="why" rows="3"></textarea><p class="field__error" aria-live="polite"></p></div>
        <p class="field__error form-error" role="alert" hidden></p>
        <div class="col-12"><button class="btn btn--primary btn--lg" type="submit"><span class="btn__label"><span class="btn__t">Submit Registration</span><span class="btn__t btn__t--alt" aria-hidden="true">Submit Registration</span></span></button></div>
      </div>
      <div class="form-success" role="status" hidden><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg><div><strong>Thank you for your interest.</strong><p>Our team will contact you about the Business Associate programme shortly.</p></div></div>
    </form>
  </div>
</div>
