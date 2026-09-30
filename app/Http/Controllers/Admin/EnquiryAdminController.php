<?php

namespace App\Http\Controllers\Admin;

use App\Models\Enquiry;

class EnquiryAdminController extends LeadController
{
    protected string $model = Enquiry::class;

    protected string $routeBase = 'admin.enquiries';

    protected string $title = 'Enquiry';

    protected string $pluralTitle = 'Enquiries';

    protected array $columns = ['name', 'mobile', 'email', 'interest', 'status', 'created_at'];

    protected ?array $statusOptions = [
        'viewed' => 'Viewed',
        'contacted' => 'Contacted',
        'closed' => 'Closed',
    ];

    protected bool $forwardOnlyStatus = true;
}
