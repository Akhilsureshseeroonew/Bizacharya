@extends('layouts.site')

@section('title', $job->title . ' | Careers at Bizacharya')
@section('description', $job->summary)

@section('content')
<section class="page-banner">
  <div class="container">
    <a class="back-link" href="{{ route('careers.index') }}#openings"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>Back to all openings</a>
    <h1>{{ $job->title }}</h1>
    <div class="badges"><span class="tag tag--white"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>&nbsp;{{ $job->location }}</span> <span class="tag tag--teal">{{ $job->department }}</span></div>
  </div>
</section>

<section class="section section--tight">
  <div class="container">
    <div class="row grid-gap">
      <div class="col-lg-8">
        <div class="job-facts" data-reveal>
          <div class="job-fact"><span class="card-x__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/></svg></span><div><strong>Posted Date</strong><span class="job-fact__value">{{ optional($job->posted_at)->format('d M Y') }}</span></div></div>
          @if ($job->salary_range)
            <div class="job-fact"><span class="card-x__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect width="20" height="12" x="2" y="6" rx="2"/><circle cx="12" cy="12" r="2"/><path d="M6 12h.01M18 12h.01"/></svg></span><div><strong>Salary Range</strong><span class="job-fact__value">{{ $job->salary_range }}</span></div></div>
          @endif
          <div class="job-fact"><span class="card-x__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg></span><div><strong>Location</strong><span class="job-fact__value">{{ $job->location }}</span></div></div>
          <div class="job-fact"><span class="card-x__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><rect width="20" height="14" x="2" y="7" rx="2"/><path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/></svg></span><div><strong>Department</strong><span class="job-fact__value">{{ $job->department }}</span></div></div>
        </div>
        <article class="article" data-reveal>
          <h2 style="margin-top:0">Job Description</h2>
          <p>{{ $job->description }}</p>
          @if (!empty($job->responsibilities))
            <h3>Responsibilities</h3>
            <ul class="checklist">
              @foreach ($job->responsibilities as $item)
                <li><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>{{ $item }}</li>
              @endforeach
            </ul>
          @endif
          @if (!empty($job->requirements))
            <h3>Requirements</h3>
            <ul class="checklist">
              @foreach ($job->requirements as $item)
                <li><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>{{ $item }}</li>
              @endforeach
            </ul>
          @endif
          @if (!empty($job->benefits))
            <h3>What we offer</h3>
            <ul class="checklist">
              @foreach ($job->benefits as $item)
                <li><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>{{ $item }}</li>
              @endforeach
            </ul>
          @endif
        </article>
      </div>
      <aside class="col-lg-4" data-reveal>
        <div class="sidebar-card detail-cta-card sticky-cta">
          <span class="card-x__icon"><svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="m16 11 2 2 4-4"/></svg></span>
          <h3>Apply for this role</h3>
          <p class="muted" style="font-size:.92rem">Submit your details and CV. Shortlisted candidates will be contacted within two weeks.</p>
          <button class="btn btn--primary btn--lg" type="button" data-modal-open="apply-modal" style="width:100%"><span class="btn__label"><span class="btn__t">Apply Now</span><span class="btn__t btn__t--alt" aria-hidden="true">Apply Now</span></span></button>
        </div>
      </aside>
    </div>
  </div>
</section>
<div class="mobile-bar"><button class="btn btn--primary btn--lg" type="button" data-modal-open="apply-modal"><span class="btn__label"><span class="btn__t">Apply Now</span><span class="btn__t btn__t--alt" aria-hidden="true">Apply Now</span></span></button></div>

<x-site.apply-modal :job="$job" />
@endsection
