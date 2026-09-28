<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Generic CRUD controller driven by a $fields spec, shared by every admin
 * "collection" resource (Sectors, Services, Success Stories, Events, Job
 * Openings, Learning Hub Posts, Videos, Menu Items). Concrete controllers
 * only declare the model class, route name, field spec and index columns —
 * the create/store/edit/update/destroy behaviour is identical across all of
 * them, so it lives here once instead of being copy-pasted per resource.
 */
abstract class ResourceController extends Controller
{
    protected string $model;

    protected string $routeBase;

    protected string $title;

    protected string $pluralTitle;

    protected string $orderBy = 'sort_order';

    protected string $orderDir = 'asc';

    protected ?string $searchField = 'title';

    protected string $uploadPath = 'uploads';

    /** @var array<int, array<string, mixed>> */
    protected array $fields = [];

    /** @var array<int, string> */
    protected array $columns = [];

    public function index(Request $request)
    {
        $query = $this->model::query();

        if ($this->searchField && $request->filled('q')) {
            $query->where($this->searchField, 'like', '%'.$request->string('q').'%');
        }

        $items = $query->orderBy($this->orderBy, $this->orderDir)->paginate(20)->withQueryString();

        return view('admin.resource.index', [
            'items' => $items,
            'columns' => $this->columns,
            'fields' => $this->fields,
            'routeBase' => $this->routeBase,
            'title' => $this->title,
            'pluralTitle' => $this->pluralTitle,
            'searchField' => $this->searchField,
        ]);
    }

    public function create()
    {
        return view('admin.resource.form', [
            'item' => new $this->model,
            'fields' => $this->fields,
            'routeBase' => $this->routeBase,
            'title' => $this->title,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate($this->rules());

        $item = new $this->model;
        $this->fill($item, $request);
        $item->save();

        return redirect()->route("{$this->routeBase}.index")->with('status', "{$this->title} created.");
    }

    public function edit($id)
    {
        $item = $this->model::findOrFail($id);

        return view('admin.resource.form', [
            'item' => $item,
            'fields' => $this->fields,
            'routeBase' => $this->routeBase,
            'title' => $this->title,
        ]);
    }

    public function update(Request $request, $id)
    {
        $item = $this->model::findOrFail($id);

        $request->validate($this->rules($item));

        $this->fill($item, $request);
        $item->save();

        return redirect()->route("{$this->routeBase}.index")->with('status', "{$this->title} updated.");
    }

    public function destroy($id)
    {
        $this->model::findOrFail($id)->delete();

        return redirect()->route("{$this->routeBase}.index")->with('status', "{$this->title} deleted.");
    }

    protected function rules($item = null): array
    {
        $rules = [];

        foreach ($this->fields as $field) {
            if (isset($field['rules'])) {
                $rules[$field['name']] = $field['rules'];
                continue;
            }

            $required = $field['required'] ?? false;
            $base = match ($field['type']) {
                'number' => 'numeric',
                'checkbox' => 'boolean',
                'date' => 'date',
                'image', 'file' => 'file',
                'select' => 'string',
                'list', 'pairs', 'json' => 'string',
                default => 'string',
            };

            $rules[$field['name']] = ($required ? 'required' : 'nullable').'|'.$base;
        }

        return $rules;
    }

    protected function fill($item, Request $request): void
    {
        foreach ($this->fields as $field) {
            $name = $field['name'];

            switch ($field['type']) {
                case 'checkbox':
                    $item->{$name} = $request->boolean($name);
                    break;
                case 'list':
                    $item->{$name} = $this->linesToArray($request->input($name));
                    break;
                case 'pairs':
                    $item->{$name} = $this->linesToPairs($request->input($name));
                    break;
                case 'json':
                    $decoded = json_decode((string) $request->input($name), true);
                    $item->{$name} = json_last_error() === JSON_ERROR_NONE ? $decoded : $item->{$name};
                    break;
                case 'image':
                case 'file':
                    if ($request->hasFile($name)) {
                        $item->{$name} = $request->file($name)->store($this->uploadPath, 'public');
                    }
                    break;
                case 'number':
                    // Every "number" field in this admin is a NOT NULL sort_order column
                    // (default 0) — leaving it blank must not send an explicit NULL.
                    $item->{$name} = $request->filled($name) ? $request->input($name) : 0;
                    break;
                default:
                    $item->{$name} = $request->input($name);
            }
        }
    }

    protected function linesToArray(?string $value): array
    {
        if (! $value) {
            return [];
        }

        return collect(preg_split('/\r\n|\r|\n/', $value))
            ->map(fn ($line) => trim($line))
            ->filter()
            ->values()
            ->all();
    }

    /**
     * Parses "Value | Text" lines into [['value' => ..., 'text' => ...], ...] —
     * used for simple two-column repeaters (journey steps, timeline entries)
     * without needing a JS repeater widget.
     */
    protected function linesToPairs(?string $value): array
    {
        return collect($this->linesToArray($value))
            ->map(function ($line) {
                [$value, $text] = array_pad(explode('|', $line, 2), 2, '');

                return ['value' => trim($value), 'text' => trim($text)];
            })
            ->values()
            ->all();
    }
}
