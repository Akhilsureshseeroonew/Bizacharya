@props(['pageContext' => 'home', 'showSubmit' => true])
<form class="enquiry" id="enquiry" method="post" action="{{ route('enquiry.store') }}" data-validate novalidate aria-labelledby="enquiry-title">
  @csrf
  <input type="hidden" name="page_context" value="{{ $pageContext }}">
  <input type="hidden" name="source_url" value="{{ url()->current() }}">
  <div class="row g-3" data-form-body>
    <div class="col-md-6 field"><label for="enq-name">Name</label><input id="enq-name" name="name" type="text" autocomplete="name" required><p class="field__error" aria-live="polite"></p></div>
    <div class="col-md-6 field"><label for="enq-mobile">Mobile</label><input id="enq-mobile" name="mobile" type="tel" inputmode="numeric" autocomplete="tel" data-type="mobile" required><p class="field__error" aria-live="polite"></p></div>
    <div class="col-md-6 field"><label for="enq-email">Email</label><input id="enq-email" name="email" type="email" autocomplete="email" required><p class="field__error" aria-live="polite"></p></div>
    <div class="col-md-6 field"><label for="enq-city">City</label><input id="enq-city" name="city" type="text" autocomplete="address-level2" required><p class="field__error" aria-live="polite"></p></div>
    <div class="col-12 field">
      <label for="enq-interest">Area of Interest</label>
      <select id="enq-interest" name="interest" required>
        <option value="">Select an area of interest</option>
        <option value="Financial Services">Financial Services</option>
        <option value="Agri-Business &amp; Value Addition">Agri-Business &amp; Value Addition</option>
        <option value="Rural Enterprises">Rural Enterprises</option>
        <option value="Women Entrepreneurship">Women Entrepreneurship</option>
        <option value="Startup Development">Startup Development</option>
        <option value="SME/MSME Development">SME/MSME Development</option>
      </select>
      <p class="field__error" aria-live="polite"></p>
    </div>
    <div class="col-12 field">
      <span class="field__label" id="enq-service-label">Service</span>
      <div class="multiselect" data-multiselect>
        <button class="multiselect__toggle" type="button" aria-haspopup="true" aria-expanded="false" aria-labelledby="enq-service-label"><span class="multiselect__chips" data-chips></span><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m6 9 6 6 6-6"/></svg></button>
        <div class="multiselect__menu" role="group" aria-labelledby="enq-service-label">
          <label class="multiselect__option multiselect__option--all"><input type="checkbox" name="service[]" value="Complete support" data-select-all> Complete support</label>
          <label class="multiselect__option"><input type="checkbox" name="service[]" value="Entrepreneurship Training"> Entrepreneurship Training</label>
          <label class="multiselect__option"><input type="checkbox" name="service[]" value="Business Registration"> Business Registration</label>
          <label class="multiselect__option"><input type="checkbox" name="service[]" value="Legal &amp; Regulatory Compliance"> Legal &amp; Regulatory Compliance</label>
          <label class="multiselect__option"><input type="checkbox" name="service[]" value="Funding Readiness"> Funding Readiness</label>
          <label class="multiselect__option"><input type="checkbox" name="service[]" value="Branding &amp; Marketing"> Branding &amp; Marketing</label>
          <label class="multiselect__option"><input type="checkbox" name="service[]" value="Market Access"> Market Access</label>
          <label class="multiselect__option"><input type="checkbox" name="service[]" value="Business Mentoring"> Business Mentoring</label>
        </div>
      </div>
      <p class="field__hint">Select "Complete support" to include every service.</p>
    </div>
    <p class="field__error form-error" role="alert" hidden></p>
    @if ($showSubmit)
      <div class="col-12"><button class="btn btn--primary btn--lg" type="submit"><span class="btn__label"><span class="btn__t">Submit</span><span class="btn__t btn__t--alt" aria-hidden="true">Submit</span></span></button></div>
    @endif
  </div>
  <div class="form-success" role="status" hidden><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg><div><strong>Thank you &mdash; your enquiry has been received.</strong><p>A Bizacharya advisor will contact you shortly. For immediate help, call <a href="tel:{{ config('site.phone_e164') }}">{{ config('site.phone') }}</a>.</p></div></div>
</form>
