@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="row g-3">
  @foreach ($counts as $label => $data)
    <div class="col-md-3">
      <a href="{{ route($data['route']) }}" class="text-decoration-none">
        <div class="card h-100">
          <div class="card-body">
            <p class="text-muted mb-1">{{ $label }}</p>
            <h2 class="mb-0">{{ $data['total'] }}</h2>
            @if (! is_null($data['new']))
              <span class="badge bg-warning text-dark badge-new">{{ $data['new'] }} new</span>
            @endif
          </div>
        </div>
      </a>
    </div>
  @endforeach
</div>
@endsection
