@extends('admin.layout')

@section('title', $title)

@section('content')
<h1 class="h4 mb-3">{{ $title }} #{{ $item->id }}</h1>

<div class="card mb-3">
  <div class="card-body">
    <dl class="row mb-0">
      @foreach ($item->getAttributes() as $key => $value)
        @continue(in_array($key, ['id', 'updated_at', 'ip', 'user_agent', 'cv_path']))
        <dt class="col-sm-3">{{ ucwords(str_replace('_', ' ', $key)) }}</dt>
        <dd class="col-sm-9">
          @php $cast = $item->{$key}; @endphp
          @if (is_array($cast))
            {{ implode(', ', $cast) }}
          @else
            {{ $cast }}
          @endif
        </dd>
      @endforeach

      @if (isset($item->cv_path) && $item->cv_path)
        <dt class="col-sm-3">CV</dt>
        <dd class="col-sm-9"><a href="{{ route('admin.job-applications.cv', $item->id) }}">Download CV ({{ $item->cv_name }})</a></dd>
      @endif
    </dl>
  </div>
</div>

@if ($statusOptions)
  <div class="card">
    <div class="card-body">
      <h2 class="h6">Update Status</h2>
      <form method="post" action="{{ route("{$routeBase}.update-status", $item->id) }}" class="row g-2 align-items-end">
        @csrf
        @method('PUT')
        <div class="col-auto">
          <select name="status" class="form-select">
            @foreach ($statusOptions as $value => $label)
              <option value="{{ $value }}" @selected($item->status === $value)>{{ $label }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-4">
          <input type="text" name="admin_notes" class="form-control" placeholder="Admin notes (optional)" value="{{ $item->admin_notes }}">
        </div>
        <div class="col-auto">
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
@endif

<a href="{{ route("{$routeBase}.index") }}" class="btn btn-outline-secondary mt-3">Back</a>
@endsection
