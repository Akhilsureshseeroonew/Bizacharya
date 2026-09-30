<?php

namespace App\Http\Controllers\Admin;

use App\Models\JobApplication;
use Illuminate\Support\Facades\Storage;

class JobApplicationAdminController extends LeadController
{
    protected string $model = JobApplication::class;

    protected string $routeBase = 'admin.job-applications';

    protected string $title = 'Job Application';

    protected string $pluralTitle = 'Job Applications';

    protected array $columns = ['job_title', 'name', 'email', 'phone', 'status', 'created_at'];

    protected ?array $statusOptions = [
        'viewed' => 'Viewed',
        'reviewing' => 'Reviewing',
        'shortlisted' => 'Shortlisted',
        'rejected' => 'Rejected',
        'hired' => 'Hired',
    ];

    protected bool $forwardOnlyStatus = true;

    public function downloadCv($id)
    {
        $application = JobApplication::findOrFail($id);

        abort_unless($application->cv_path && Storage::disk('local')->exists($application->cv_path), 404);

        return Storage::disk('local')->download($application->cv_path, $application->cv_name);
    }
}
