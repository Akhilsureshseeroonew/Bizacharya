<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Read-only listing + optional status update for the four "lead" tables
 * (Enquiries, Event Registrations, Job Applications, Associates). No
 * create/destroy — these rows only ever come from public site forms.
 */
abstract class LeadController extends Controller
{
    protected string $model;

    protected string $routeBase;

    protected string $title;

    protected string $pluralTitle;

    /** @var array<int, string> */
    protected array $columns = [];

    /** @var array<string, string>|null */
    protected ?array $statusOptions = null;

    /**
     * When true, $statusOptions' key order is treated as a one-way pipeline —
     * a status can only move to itself or a later stage, never back to an
     * earlier one (e.g. Contacted can't be moved back to Viewed).
     */
    protected bool $forwardOnlyStatus = false;

    protected function statusRank(string $status): int|false
    {
        return array_search($status, array_keys($this->statusOptions ?? []), true);
    }

    /** Options valid to move *to* from the item's current status, respecting forwardOnlyStatus. */
    protected function availableStatusOptions(string $currentStatus): array
    {
        if (! $this->forwardOnlyStatus) {
            return $this->statusOptions ?? [];
        }

        $currentRank = $this->statusRank($currentStatus);

        if ($currentRank === false) {
            return $this->statusOptions ?? [];
        }

        return array_filter(
            $this->statusOptions ?? [],
            fn ($label, $key) => $this->statusRank($key) >= $currentRank,
            ARRAY_FILTER_USE_BOTH
        );
    }

    public function index(Request $request)
    {
        $items = $this->model::query()->latest()->paginate(10);

        return view('admin.leads.index', [
            'items' => $items,
            'columns' => $this->columns,
            'routeBase' => $this->routeBase,
            'title' => $this->title,
            'pluralTitle' => $this->pluralTitle,
            'hasStatus' => (bool) $this->statusOptions,
        ]);
    }

    public function show($id)
    {
        $item = $this->model::findOrFail($id);

        if (is_null($item->viewed_at)) {
            $updates = ['viewed_at' => now()];

            if ($this->statusOptions && $item->status === 'new') {
                $updates['status'] = 'viewed';
            }

            $item->forceFill($updates)->save();
        }

        return view('admin.leads.show', [
            'item' => $item,
            'routeBase' => $this->routeBase,
            'title' => $this->title,
            'statusOptions' => $this->statusOptions ? $this->availableStatusOptions($item->status) : null,
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $item = $this->model::findOrFail($id);

        $request->validate([
            'status' => 'required|string|in:'.implode(',', array_keys($this->availableStatusOptions($item->status))),
            'admin_notes' => 'nullable|string',
        ], [
            'status.in' => 'That status has already passed — it can only move forward, not back to an earlier stage.',
        ]);

        $item->update([
            'status' => $request->input('status'),
            'admin_notes' => $request->input('admin_notes'),
        ]);

        return redirect()->route("{$this->routeBase}.show", $item->id)->with('status', 'Status updated.');
    }
}
