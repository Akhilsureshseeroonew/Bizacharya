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

    public function index(Request $request)
    {
        $items = $this->model::query()->latest()->paginate(20);

        return view('admin.leads.index', [
            'items' => $items,
            'columns' => $this->columns,
            'routeBase' => $this->routeBase,
            'title' => $this->title,
            'pluralTitle' => $this->pluralTitle,
        ]);
    }

    public function show($id)
    {
        $item = $this->model::findOrFail($id);

        return view('admin.leads.show', [
            'item' => $item,
            'routeBase' => $this->routeBase,
            'title' => $this->title,
            'statusOptions' => $this->statusOptions,
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $item = $this->model::findOrFail($id);

        $request->validate([
            'status' => 'required|string|in:'.implode(',', array_keys($this->statusOptions ?? [])),
            'admin_notes' => 'nullable|string',
        ]);

        $item->update([
            'status' => $request->input('status'),
            'admin_notes' => $request->input('admin_notes'),
        ]);

        return redirect()->route("{$this->routeBase}.show", $item->id)->with('status', 'Status updated.');
    }
}
