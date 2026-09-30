<?php

namespace App\Http\Controllers\Admin;

use App\Models\Associate;

class AssociateAdminController extends LeadController
{
    protected string $model = Associate::class;

    protected string $routeBase = 'admin.associates';

    protected string $title = 'Associate Registration';

    protected string $pluralTitle = 'Business Associate Registrations';

    protected array $columns = ['name', 'mobile', 'email', 'district', 'status', 'created_at'];

    protected ?array $statusOptions = [
        'viewed' => 'Viewed',
        'contacted' => 'Contacted',
        'approved' => 'Approved',
        'rejected' => 'Rejected',
    ];

    protected bool $forwardOnlyStatus = true;
}
