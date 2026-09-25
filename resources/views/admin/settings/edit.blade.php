@extends('admin.layout')

@section('title', 'Site Settings')

@section('content')
<h1 class="h4 mb-3">Site Settings</h1>

<form method="post" action="{{ route('admin.settings.update') }}" class="card">
  <div class="card-body">
    @csrf
    @method('PUT')

    @foreach ($fields as $path => [$label, $type])
      @php $formKey = \App\Http\Controllers\Admin\SiteSettingsController::formKey($path); $value = $values[$path]; @endphp
      <div class="mb-3">
        <label class="form-label">{{ $label }}</label>
        @if ($type === 'textarea')
          <textarea name="{{ $formKey }}" class="form-control" rows="3">{{ old($formKey, $value) }}</textarea>
        @elseif ($type === 'checkbox')
          <div class="form-check">
            <input type="hidden" name="{{ $formKey }}" value="0">
            <input type="checkbox" name="{{ $formKey }}" value="1" class="form-check-input" @checked(old($formKey, $value))>
          </div>
        @else
          <input type="text" name="{{ $formKey }}" class="form-control" value="{{ old($formKey, $value) }}">
        @endif
      </div>
    @endforeach
  </div>
  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Save Settings</button>
  </div>
</form>
@endsection
