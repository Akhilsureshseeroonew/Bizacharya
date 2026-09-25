<div class="drawer" id="drawer" aria-hidden="true">
  <div class="drawer__backdrop"></div>
  <div class="drawer__panel" role="dialog" aria-modal="true" aria-label="Menu">
    <div class="drawer__head">
      <a class="brand" href="{{ url('/') }}"><img src="{{ asset('assets/img/logo.png') }}" alt="Bizacharya" width="176" height="36"></a>
      <button class="drawer__close" type="button" aria-label="Close menu"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg></button>
    </div>
    <nav class="drawer__nav" aria-label="Mobile">
      @foreach ($navHeaderBefore as $item)
        <a href="{{ $item->url }}">{{ $item->label }}</a>
      @endforeach
      <div class="drawer__item"><a href="{{ route('opportunities.index') }}">Opportunities</a><button class="drawer__acc" type="button" aria-expanded="false" aria-controls="dsub-opportunities" aria-label="Show Opportunities menu"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m6 9 6 6 6-6"/></svg></button></div>
      <div class="drawer__sub" id="dsub-opportunities"><ul>
        @foreach ($navSectors as $sector)
          <li><a href="{{ $sector->url() }}">{{ $sector->nav_label ?: $sector->title }}</a></li>
        @endforeach
      </ul></div>
      <div class="drawer__item"><a href="{{ route('services.index') }}">Services</a><button class="drawer__acc" type="button" aria-expanded="false" aria-controls="dsub-services" aria-label="Show Services menu"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m6 9 6 6 6-6"/></svg></button></div>
      <div class="drawer__sub" id="dsub-services"><ul>
        @foreach ($navServices as $service)
          <li><a href="{{ $service->url() }}">{{ $service->nav_label ?: $service->title }}</a></li>
        @endforeach
      </ul></div>
      @foreach ($navHeaderAfter as $item)
        <a href="{{ $item->url }}">{{ $item->label }}</a>
      @endforeach
    </nav>
    <div class="drawer__foot">
      <a class="btn btn--primary" href="tel:{{ config('site.phone_e164') }}"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>Book a Consultation</a>
      <a class="btn btn--wa" href="https://wa.me/{{ config('site.whatsapp') }}" target="_blank" rel="noopener"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path fill="currentColor" stroke="none" d="M17.5 14.4c-.3-.1-1.8-.9-2-1-.3-.1-.5-.1-.7.1-.2.3-.8 1-.9 1.2-.2.2-.3.2-.6.1-.3-.1-1.3-.5-2.4-1.5-.9-.8-1.5-1.8-1.7-2.1-.2-.3 0-.5.1-.6l.4-.5c.1-.2.2-.3.3-.5.1-.2 0-.4 0-.5-.1-.1-.7-1.6-.9-2.2-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.8.4-.3.3-1 1-1 2.5s1.1 2.9 1.2 3.1c.1.2 2.1 3.2 5.1 4.5.7.3 1.3.5 1.7.6.7.2 1.4.2 1.9.1.6-.1 1.8-.7 2-1.4.2-.7.2-1.3.2-1.4-.1-.2-.3-.3-.6-.4zM12 2C6.5 2 2 6.5 2 12c0 1.8.5 3.5 1.3 5L2 22l5.2-1.4c1.4.8 3.1 1.2 4.8 1.2 5.5 0 10-4.5 10-10S17.5 2 12 2zm0 18.2c-1.5 0-3-.4-4.3-1.2l-.3-.2-3.1.8.8-3-.2-.3C4.1 15 3.7 13.5 3.7 12c0-4.6 3.7-8.3 8.3-8.3s8.3 3.7 8.3 8.3-3.7 8.2-8.3 8.2z"/></svg>WhatsApp Us</a>
      <ul class="social" aria-label="Social media">
        @foreach (config('site.social') as $key => $url)
          @continue(! $url)
          <li><a href="{{ $url }}" target="_blank" rel="noopener" aria-label="{{ config('site.name') }} on {{ ucfirst($key) }}"><x-site.social-icon :platform="$key" /></a></li>
        @endforeach
      </ul>
    </div>
  </div>
</div>
