<?php

namespace App\Http\Controllers\Admin;

use App\Models\JobOpening;

class JobOpeningAdminController extends ResourceController
{
    protected string $model = JobOpening::class;

    protected string $routeBase = 'admin.jobs';

    protected string $title = 'Job Opening';

    protected string $pluralTitle = 'Job Openings';

    protected string $orderBy = 'posted_at';

    protected string $orderDir = 'desc';

    protected array $columns = ['title', 'department', 'location', 'is_open'];

    protected array $fields = [
        ['name' => 'title', 'label' => 'Job Title', 'type' => 'text', 'required' => true],
        ['name' => 'slug', 'label' => 'Slug', 'type' => 'text', 'required' => true],
        ['name' => 'department', 'label' => 'Department', 'type' => 'text'],
        ['name' => 'location', 'label' => 'Location', 'type' => 'text', 'required' => true],
        ['name' => 'employment_type', 'label' => 'Employment type (optional)', 'type' => 'text'],
        ['name' => 'experience', 'label' => 'Experience required (optional)', 'type' => 'text'],
        ['name' => 'salary_range', 'label' => 'Salary range (optional)', 'type' => 'text'],
        ['name' => 'summary', 'label' => 'Short summary (for SEO/meta)', 'type' => 'textarea'],
        ['name' => 'description', 'label' => 'Job description', 'type' => 'textarea', 'required' => true],
        ['name' => 'responsibilities', 'label' => 'Responsibilities (one per line)', 'type' => 'list'],
        ['name' => 'requirements', 'label' => 'Requirements (one per line)', 'type' => 'list'],
        ['name' => 'benefits', 'label' => 'What we offer (one per line)', 'type' => 'list'],
        ['name' => 'is_open', 'label' => 'Open for applications', 'type' => 'checkbox'],
        ['name' => 'posted_at', 'label' => 'Posted date', 'type' => 'date'],
    ];
}
