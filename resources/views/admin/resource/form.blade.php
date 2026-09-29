@extends('admin.layout')

@section('title', ($item->exists ? 'Edit' : 'Add').' '.$title)

@section('content')
<h1 class="h4 mb-3">{{ $item->exists ? 'Edit' : 'Add' }} {{ $title }}</h1>

@php
  // $fields already only contains what applies to this item (see
  // ResourceController::visibleFields() — Pages filters by page slug, everything
  // else gets its full field list unchanged). Here we just group into sections.
  $groupedFields = collect($fields)->groupBy(fn ($field) => $field['section'] ?? '__none__');
@endphp

<form method="post" action="{{ $item->exists ? route("{$routeBase}.update", $item->id) : route("{$routeBase}.store") }}" enctype="multipart/form-data" class="card">
  <div class="card-body">
    @csrf
    @if ($item->exists) @method('PUT') @endif

    @foreach ($groupedFields as $sectionName => $sectionFields)
      @if ($sectionName !== '__none__')
        <h2 class="admin-form-section">{{ $sectionName }}</h2>
      @endif

      @foreach ($sectionFields as $field)
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
            @case('json')
              <textarea name="{{ $name }}" class="form-control" rows="{{ $field['type'] === 'json' ? 6 : 4 }}">{{ $raw }}</textarea>
              @break

            @case('richtext')
              <textarea name="{{ $name }}" id="field-{{ $name }}" class="d-none">{{ $raw }}</textarea>
              <div class="richtext-editor" data-target="field-{{ $name }}"></div>
              @break

            @case('list')
            @case('pairs')
              <textarea name="{{ $name }}" id="field-{{ $name }}" class="d-none" data-repeater="{{ $field['type'] }}" @if(!empty($field['max'])) data-max="{{ $field['max'] }}" @endif>{{ $raw }}</textarea>
              <div class="repeater" data-target="field-{{ $name }}"></div>
              @break

            @case('checkbox')
              <div class="form-check">
                <input type="hidden" name="{{ $name }}" value="0">
                <input type="checkbox" name="{{ $name }}" value="1" class="form-check-input" id="f-{{ $name }}" @checked($raw)>
              </div>
              @break

            @case('fixed-pairs')
              @php $rows = is_array($item->{$name} ?? null) ? $item->{$name} : []; @endphp
              <div class="border rounded p-2">
                @for ($i = 0; $i < ($field['count'] ?? 1); $i++)
                  <div class="row g-2 align-items-start @if($i > 0) mt-2 pt-2 border-top @endif">
                    <div class="col-auto pt-2 text-muted small" style="width:4.5rem">Step {{ $i + 1 }}</div>
                    <div class="col">
                      <input type="text" name="{{ $name }}[{{ $i }}][value]" class="form-control form-control-sm mb-1" placeholder="Title" value="{{ old("{$name}.{$i}.value", $rows[$i]['value'] ?? '') }}">
                      <textarea name="{{ $name }}[{{ $i }}][text]" class="form-control form-control-sm" rows="2" placeholder="Description">{{ old("{$name}.{$i}.text", $rows[$i]['text'] ?? '') }}</textarea>
                    </div>
                  </div>
                @endfor
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
              <input type="file" name="{{ $name }}" class="form-control" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">
              <div class="form-text">JPG, PNG or WEBP, up to 2MB. Smaller files make the page load faster for visitors — resize large photos before uploading if you can.</div>
              @break

            @case('file')
              @if (!empty($item->{$name}))
                <div class="mb-2"><a href="{{ asset('storage/'.$item->{$name}) }}" target="_blank">Current file</a></div>
              @endif
              <input type="file" name="{{ $name }}" class="form-control" accept=".pdf,.doc,.docx,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
              <div class="form-text">PDF, DOC or DOCX, up to 10MB.</div>
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
    @endforeach
  </div>
  <div class="card-footer d-flex gap-2">
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{ route("{$routeBase}.index") }}" class="btn btn-outline-secondary">Cancel</a>
  </div>
</form>
@endsection
