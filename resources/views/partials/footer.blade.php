<footer class="footer">
  <div class="container footer__main">
    <div class="row grid-gap">
      <div class="col-lg-3">
        <a class="footer__brand" href="{{ url('/') }}" aria-label="{{ config('site.name') }} — Home">
          <img src="{{ asset('assets/img/logo.png') }}" alt="Bizacharya — The Science of Business Success" width="274" height="56">
        </a>
        <p class="footer__tagline">{{ config('site.tagline') }}</p>
        <ul class="social" aria-label="Social media">
          @foreach (config('site.social') as $key => $url)
            @continue(! $url)
            <li><a href="{{ $url }}" target="_blank" rel="noopener" aria-label="{{ config('site.name') }} on {{ ucfirst($key) }}"><x-site.social-icon :platform="$key" /></a></li>
          @endforeach
        </ul>
      </div>
      <div class="col-6 col-md-4 col-lg-2">
        <h4>Quick Links</h4>
        <ul class="footer__links">
          @foreach ($navFooterQuick as $item)
            <li><a href="{{ $item->url }}">{{ $item->label }}</a></li>
          @endforeach
        </ul>
      </div>
      <div class="col-6 col-md-4 col-lg-2">
        <h4>Opportunities</h4>
        <ul class="footer__links">
          @foreach ($navSectors as $sector)
            <li><a href="{{ $sector->url() }}">{{ $sector->nav_label ?: $sector->title }}</a></li>
          @endforeach
        </ul>
      </div>
      <div class="col-6 col-md-4 col-lg-2">
        <h4>Services</h4>
        <ul class="footer__links">
          @foreach ($navServices as $service)
            <li><a href="{{ $service->url() }}">{{ $service->nav_label ?: $service->title }}</a></li>
          @endforeach
        </ul>
      </div>
      <div class="col-12 col-sm-6 col-md-12 col-lg-3">
        <h4>Contact</h4>
        <ul class="footer__contact">
          <li class="footer__addr"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/><path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/><path d="M10 6h4M10 10h4M10 14h4M10 18h4"/></svg><div><span class="footer__addr-label">Corporate Address</span><address>{!! nl2br(e(config('site.address_full'))) !!}</address></div></li>
          @if (filled(config('site.billing_address')))
            <li class="footer__addr"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"/><path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"/><path d="M12 17.5v-11"/></svg><div><span class="footer__addr-label">Billing Address</span><address>{!! nl2br(e(config('site.billing_address'))) !!}</address></div></li>
          @endif
          <li><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg><a href="mailto:{{ config('site.email') }}">{{ config('site.email') }}</a></li>
          <li><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg><a href="tel:{{ config('site.phone_e164') }}">{{ config('site.phone') }}</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="footer__bottom">
      <span>&copy; {{ date('Y') }} {{ config('site.legal_name') }} All rights reserved.</span>
    </div>
  </div>
</footer>
