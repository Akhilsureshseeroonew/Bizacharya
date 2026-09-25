<?php

namespace App\Http\Controllers\Admin;

use App\Models\EventRegistration;

class EventRegistrationAdminController extends LeadController
{
    protected string $model = EventRegistration::class;

    protected string $routeBase = 'admin.event-registrations';

    protected string $title = 'Event Registration';

    protected string $pluralTitle = 'Event Registrations';

    protected array $columns = ['event_title', 'name', 'phone', 'email', 'pincode', 'created_at'];

    protected ?array $statusOptions = null;
}
