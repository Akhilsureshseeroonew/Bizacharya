<header class="header" id="header">
  <div class="container header__inner">
    <a class="brand" href="{{ url('/') }}" aria-label="{{ config('site.name') }} — Home">
      <img src="{{ asset('assets/img/logo.png') }}" alt="Bizacharya — The Science of Business Success" width="235" height="48">
    </a>
    <nav class="nav" aria-label="Primary">
      <ul class="nav__list">
        @foreach ($navHeaderBefore as $item)
          <li class="nav__item"><a class="nav__link" href="{{ $item->url }}">{{ $item->label }}</a></li>
        @endforeach
        <li class="nav__item nav__item--has-sub">
          <a class="nav__link" href="{{ route('opportunities.index') }}">Opportunities</a>
          <button class="nav__toggle" type="button" aria-expanded="false" aria-controls="sub-opportunities" aria-label="Show Opportunities menu"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m6 9 6 6 6-6"/></svg></button>
          <ul class="nav__sub" id="sub-opportunities">
            @foreach ($navSectors as $sector)
              <li><a href="{{ $sector->url() }}">{{ $sector->nav_label ?: $sector->title }}</a></li>
            @endforeach
          </ul>
        </li>
        <li class="nav__item nav__item--has-sub">
          <a class="nav__link" href="{{ route('services.index') }}">Services</a>
          <button class="nav__toggle" type="button" aria-expanded="false" aria-controls="sub-services" aria-label="Show Services menu"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m6 9 6 6 6-6"/></svg></button>
          <ul class="nav__sub" id="sub-services">
            @foreach ($navServices as $service)
              <li><a href="{{ $service->url() }}">{{ $service->nav_label ?: $service->title }}</a></li>
            @endforeach
          </ul>
        </li>
        @foreach ($navHeaderAfter as $item)
          <li class="nav__item"><a class="nav__link" href="{{ $item->url }}">{{ $item->label }}</a></li>
        @endforeach
      </ul>
    </nav>
    <div class="header__actions">
      <button class="burger" id="burger" type="button" aria-label="Open menu" aria-expanded="false" aria-controls="drawer"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M4 6h16"/><path d="M4 12h16"/><path d="M4 18h16"/></svg></button>
    </div>
  </div>
</header>
