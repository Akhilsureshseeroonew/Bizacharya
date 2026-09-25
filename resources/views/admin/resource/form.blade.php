@extends('admin.layout')

@section('title', ($item->exists ? 'Edit' : 'Add').' '.$title)

@section('content')
<h1 class="h4 mb-3">{{ $item->exists ? 'Edit' : 'Add' }} {{ $title }}</h1>

<form method="post" action="{{ $item->exists ? route("{$routeBase}.update", $item->id) : route("{$routeBase}.store") }}" enctype="multipart/form-data" class="card">
  <div class="card-body">
    @csrf
    @if ($item->exists) @method('PUT') @endif

    @foreach ($fields as $field)
      @php
        $name = $field['name'];
        $raw = old($name, $item->{$name} ?? null);
        if ($field['type'] === 'list') { $raw = old($name, is_array($item->{$name} ?? null) ? implode("\n", $item->{$name}) : ''); }
        if ($field['type'] === 'pairs') { $raw = old($name, is_array($item->{$name} ?? null) ? implode("\n", array_map(fn ($p) => ($p['value'] ?? '').' | '.($p['text'] ?? ''), $item->{$name})) : ''); }
        if ($field['type'] === 'json') { $raw = old($name, isset($item->{$name}) ? json_encode($item->{$name}, JSON_PRETTY_PRINT) : ''); }
        if ($field['type'] === 'checkbox') { $raw = old($name, (bool) ($item->{$name} ?? false)); }
      @endphp
      <div class="mb-3">
        <label class="form-label">{{ $field['label'] }}</label>

        @switch($field['type'])
          @case('textarea')
          @case('richtext')
          @case('list')
          @case('pairs')
          @case('json')
            <textarea name="{{ $name }}" class="form-control" rows="{{ in_array($field['type'], ['richtext','json']) ? 6 : 4 }}">{{ $raw }}</textarea>
            @break

          @case('checkbox')
            <div class="form-check">
              <input type="hidden" name="{{ $name }}" value="0">
              <input type="checkbox" name="{{ $name }}" value="1" class="form-check-input" id="f-{{ $name }}" @checked($raw)>
            </div>
            @break

          @case('select')
            <select name="{{ $name }}" class="form-select">
              @foreach ($field['options'] as $optValue => $optLabel)
                <option value="{{ $optValue }}" @selected($raw == $optValue)>{{ $optLabel }}</option>
              @endforeach
            </select>
            @break

          @case('image')
            @if (!empty($item->{$name}))
              <div class="mb-2"><img src="{{ asset('storage/'.$item->{$name}) }}" style="max-height:100px" class="img-thumbnail"></div>
            @endif
            <input type="file" name="{{ $name }}" class="form-control" accept="image/*">
            @break

          @case('file')
            @if (!empty($item->{$name}))
              <div class="mb-2"><a href="{{ asset('storage/'.$item->{$name}) }}" target="_blank">Current file</a></div>
            @endif
            <input type="file" name="{{ $name }}" class="form-control">
            @break

          @case('date')
            <input type="date" name="{{ $name }}" class="form-control" value="{{ $raw ? \Illuminate\Support\Carbon::parse($raw)->format('Y-m-d') : '' }}">
            @break

          @case('number')
            <input type="number" name="{{ $name }}" class="form-control" value="{{ $raw }}">
            @break

          @default
            <input type="text" name="{{ $name }}" class="form-control" value="{{ $raw }}">
        @endswitch

        @if (!empty($field['help']))
          <div class="form-text">{{ $field['help'] }}</div>
        @endif
        @error($name)
          <div class="text-danger small">{{ $message }}</div>
        @enderror
      </div>
    @endforeach
  </div>
  <div class="card-footer d-flex gap-2">
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{ route("{$routeBase}.index") }}" class="btn btn-outline-secondary">Cancel</a>
  </div>
</form>
@endsection
