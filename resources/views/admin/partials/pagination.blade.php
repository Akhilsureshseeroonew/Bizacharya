{{-- Always visible, even with a single page — so the admin sees the same footer bar
     on every listing rather than pagination appearing/disappearing based on row count. --}}
<div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mt-3">
  <div class="text-muted small">
    @if ($items->total() > 0)
      Showing {{ $items->firstItem() }}&ndash;{{ $items->lastItem() }} of {{ $items->total() }}
    @else
      No records yet
    @endif
  </div>

  @if ($items->hasPages())
    {{ $items->links() }}
  @else
    <nav aria-label="Pagination Navigation">
      <ul class="pagination mb-0">
        <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
        <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
        <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
      </ul>
    </nav>
  @endif
</div>
