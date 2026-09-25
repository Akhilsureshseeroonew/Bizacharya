@props(['slug'])
@switch($slug)
  @case('financial-services')
    <svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="9"/><path d="M12 7v10M15 9.4c0-1.3-1.3-2.4-3-2.4s-3 1-3 2.3 1.3 1.9 3 2.4 3 1 3 2.4-1.3 2.3-3 2.3-3-1-3-2.3"/></svg>
    @break
  @case('agri-business')
    <svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-11 10Z"/><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 11 15 11 15"/></svg>
    @break
  @case('rural-enterprises')
    <svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M3 9l9-7 9 7v11a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1z"/><path d="M9 21V12h6v9"/></svg>
    @break
  @case('women-entrepreneurship')
    <svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="8" r="4"/><path d="M20 21a8 8 0 0 0-16 0"/></svg>
    @break
  @case('startup-development')
    <svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="M12 15l-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/></svg>
    @break
  @case('sme-msme-development')
    <svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
    @break
  @default
    <svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M9 9h6v6H9z"/></svg>
@endswitch
