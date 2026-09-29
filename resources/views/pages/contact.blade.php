@extends('layouts.site')

@section('title', ($page->seo_title ?: $page->title) . ' | Bizacharya')
@section('description', $page->seo_description)

@section('content')
<section class="page-banner page-banner--center">
  <div class="container" data-stagger>
    <ol class="breadcrumb" aria-label="Breadcrumb"><li><a href="{{ url('/') }}">Home</a></li><li aria-current="page">Contact</li></ol>
    <p class="eyebrow" data-reveal>Get in touch</p>
    <h1 data-reveal>{!! $page->hero_heading !!}</h1>
    <p data-reveal>{{ $page->hero_lead }}</p>
  </div>
</section>

<section class="section section--tight">
  <div class="container">
    <div class="contact-card contact-card--glass">
      <img class="contact-card__bg" src="{{ asset('assets/img/about/global-network.jpg') }}" alt="A glowing digital globe representing Bizacharya's global business network" loading="lazy">
      <div class="contact-card__glass-panel">
        <div class="contact-card__form-inner">
          <div class="contact-card__glass-head">
            <p class="eyebrow">Send Us an Enquiry</p>
            <svg class="icon contact-card__sparkle" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M12 2v20M2 12h20M5 5l14 14M19 5 5 19"/></svg>
          </div>
          <h2><span id="enquiry-title">Connect with Bizacharya</span></h2>
        </div>
        <div class="contact-card__form-inner" style="padding-top:0">
          <x-site.enquiry-form page-context="contact" :show-submit="false" />
        </div>
      </div>
      <div class="contact-card__submit"><button class="btn btn--primary" type="submit" form="enquiry"><span class="btn__label"><span class="btn__t">Send Message</span><span class="btn__t btn__t--alt" aria-hidden="true">Send Message</span></span><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg></button></div>
    </div>
  </div>
</section>

<section class="section section--tight">
  <div class="container">
    <div class="contact-facts-band">
      <div class="contact-facts-band__inner">
        <div>
          <p class="eyebrow eyebrow-arrow"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m6 17 5-5-5-5"/><path d="m13 17 5-5-5-5"/></svg>Contact Details</p>
          <h2>{{ $page->facts_heading[0]['value'] ?? '' }}<span class="heading-soft">{{ $page->facts_heading[0]['text'] ?? '' }}</span></h2>
          <p>Reach out to us with your enquiries, and we&rsquo;ll be happy to assist you on your entrepreneurial journey.</p>
          <a class="btn btn--accent" href="https://wa.me/{{ config('site.whatsapp') }}" target="_blank" rel="noopener"><span class="btn__label"><span class="btn__t">Start a WhatsApp Chat</span><span class="btn__t btn__t--alt" aria-hidden="true">Start a WhatsApp Chat</span></span></a>
        </div>
        <div class="contact-facts">
          <div class="contact-facts__item">
            <span class="card-x__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg></span>
            <div><dt>Our Phone</dt><dd><a href="tel:{{ config('site.phone_e164') }}">{{ config('site.phone') }}</a></dd></div>
          </div>
          <div class="contact-facts__item">
            <span class="card-x__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg></span>
            <div><dt>Our Email</dt><dd><a href="mailto:{{ config('site.email') }}">{{ config('site.email') }}</a></dd></div>
          </div>
          <div class="contact-facts__item">
            <span class="card-x__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/><path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/><path d="M10 6h4M10 10h4M10 14h4M10 18h4"/></svg></span>
            <div><dt>Corporate Address</dt><dd>{!! nl2br(e(config('site.address_full'))) !!}</dd></div>
          </div>
          @if (filled(config('site.billing_address')))
            <div class="contact-facts__item">
              <span class="card-x__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"/><path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"/><path d="M12 17.5v-11"/></svg></span>
              <div><dt>Billing Address</dt><dd>{!! nl2br(e(config('site.billing_address'))) !!}</dd></div>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section--tight">
  <div class="container">
    <p class="eyebrow">Visit Us</p>
    <h2>Find Us on the Map</h2>
    <div class="map">
      <iframe title="Map: {{ config('site.name') }}, {{ config('site.map_query') }}" src="https://www.google.com/maps?q={{ urlencode(config('site.map_query')) }}&amp;output=embed" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>
</section>
@endsection
