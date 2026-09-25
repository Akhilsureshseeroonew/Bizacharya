<div class="topbar">
  <div class="container topbar__inner">
    <div class="topbar__info">
      <a href="tel:{{ config('site.phone_e164') }}"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg><span>{{ config('site.phone') }}</span></a>
      <a href="mailto:{{ config('site.email') }}"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg><span>{{ config('site.email') }}</span></a>
    </div>
    <div class="topbar__right">
      <ul class="social social--cells" aria-label="Social media">
        @foreach (config('site.social') as $key => $url)
          @continue(! $url)
          <li><a href="{{ $url }}" target="_blank" rel="noopener" aria-label="{{ config('site.name') }} on {{ ucfirst($key) }}">
            <x-site.social-icon :platform="$key" />
          </a></li>
        @endforeach
      </ul>
    </div>
  </div>
</div>
