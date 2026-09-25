@extends('admin.layout')

@section('title', $pluralTitle)

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h4 mb-0">{{ $pluralTitle }}</h1>
  @if (Route::has("{$routeBase}.create"))
    <a href="{{ route("{$routeBase}.create") }}" class="btn btn-primary btn-sm">Add {{ $title }}</a>
  @endif
</div>

@if ($searchField)
  <form method="get" class="mb-3">
    <div class="input-group" style="max-width: 320px">
      <input type="text" name="q" class="form-control" placeholder="Search..." value="{{ request('q') }}">
      <button class="btn btn-outline-secondary" type="submit">Search</button>
    </div>
  </form>
@endif

<div class="card">
  <div class="table-responsive">
    <table class="table table-hover mb-0 align-middle">
      <thead class="table-light">
        <tr>
          @foreach ($columns as $column)
            <th>{{ ucwords(str_replace('_', ' ', $column)) }}</th>
          @endforeach
          <th class="text-end">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($items as $item)
          <tr>
            @foreach ($columns as $column)
              <td>
                @php $value = $item->{$column}; @endphp
                @if (is_bool($value))
                  <span class="badge {{ $value ? 'bg-success' : 'bg-secondary' }}">{{ $value ? 'Yes' : 'No' }}</span>
                @elseif ($value instanceof \Illuminate\Support\Carbon)
                  {{ $value->format('d M Y') }}
                @elseif (is_array($value))
                  {{ count($value) }} item(s)
                @else
                  {{ \Illuminate\Support\Str::limit((string) $value, 40) }}
                @endif
              </td>
            @endforeach
            <td class="text-end">
              @if (Route::has("{$routeBase}.edit"))
                <a href="{{ route("{$routeBase}.edit", $item->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
              @endif
              @if (Route::has("{$routeBase}.destroy"))
                <form method="post" action="{{ route("{$routeBase}.destroy", $item->id) }}" class="d-inline" onsubmit="return confirm('Delete this {{ strtolower($title) }}?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
              @endif
            </td>
          </tr>
        @empty
          <tr><td colspan="{{ count($columns) + 1 }}" class="text-center text-muted py-4">No records yet.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

<div class="mt-3">{{ $items->links() }}</div>
@endsection
