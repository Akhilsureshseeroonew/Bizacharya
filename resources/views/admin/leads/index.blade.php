@extends('admin.layout')

@section('title', $pluralTitle)

@section('content')
<h1 class="h4 mb-3">{{ $pluralTitle }}</h1>

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
                @if ($column === 'status')
                  <span class="badge bg-{{ $value === 'new' ? 'warning' : 'secondary' }} text-dark">{{ ucfirst($value) }}</span>
                @elseif ($value instanceof \Illuminate\Support\Carbon)
                  {{ $value->format('d M Y H:i') }}
                @else
                  {{ \Illuminate\Support\Str::limit((string) $value, 40) }}
                @endif
              </td>
            @endforeach
            <td class="text-end"><a href="{{ route("{$routeBase}.show", $item->id) }}" class="btn btn-sm btn-outline-secondary">View</a></td>
          </tr>
        @empty
          <tr><td colspan="{{ count($columns) + 1 }}" class="text-center text-muted py-4">Nothing here yet.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

<div class="mt-3">{{ $items->links() }}</div>
@endsection
