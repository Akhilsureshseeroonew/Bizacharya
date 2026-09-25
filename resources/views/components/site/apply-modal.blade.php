@props(['job'])
<div class="modal" id="apply-modal" role="dialog" aria-modal="true" aria-labelledby="apply-title" aria-hidden="true">
  <div class="modal__backdrop"></div>
  <div class="modal__dialog">
    <button class="modal__close" type="button" data-modal-close aria-label="Close"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg></button>
    <h2 id="apply-title">Apply Now</h2>
    <p class="lead">{{ $job->title }} &middot; {{ $job->location }}</p>
    <form method="post" action="{{ route('jobs.apply', $job) }}" enctype="multipart/form-data" data-validate novalidate>
      @csrf
      <div class="row g-3" data-form-body>
        <div class="col-12 field"><label for="ap-name">Full Name</label><input id="ap-name" name="name" type="text" autocomplete="name" required data-autofocus><p class="field__error" aria-live="polite"></p></div>
        <div class="col-md-6 field"><label for="ap-email">Email</label><input id="ap-email" name="email" type="email" autocomplete="email" required><p class="field__error" aria-live="polite"></p></div>
        <div class="col-md-6 field"><label for="ap-phone">Phone Number</label><input id="ap-phone" name="phone" type="tel" inputmode="numeric" autocomplete="tel" data-type="mobile" required><p class="field__error" aria-live="polite"></p></div>
        <div class="col-12 field"><label for="ap-cv">Resume / CV</label>
          <div class="file-field"><input id="ap-cv" name="cv" type="file" accept=".pdf,.doc,.docx" data-file data-max-mb="5" required><label class="file-field__btn" for="ap-cv"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><path d="m17 8-5-5-5 5"/><path d="M12 3v12"/></svg>Choose file</label><span class="file-field__name" data-file-name>No file chosen</span></div>
          <p class="field__hint">PDF, DOC or DOCX &middot; max 5 MB</p>
          <p class="field__error" aria-live="polite"></p>
        </div>
        <p class="field__error form-error" role="alert" hidden></p>
        <div class="col-12"><button class="btn btn--primary btn--lg" type="submit"><span class="btn__label"><span class="btn__t">Submit Application</span><span class="btn__t btn__t--alt" aria-hidden="true">Submit Application</span></span></button></div>
      </div>
      <div class="form-success" role="status" hidden><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg><div><strong>Application submitted.</strong><p>Thank you for applying. Shortlisted candidates will be contacted within two weeks.</p></div></div>
    </form>
  </div>
</div>
