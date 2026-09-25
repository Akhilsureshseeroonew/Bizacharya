<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;

class EventAdminController extends ResourceController
{
    protected string $model = Event::class;

    protected string $routeBase = 'admin.events';

    protected string $title = 'Event';

    protected string $pluralTitle = 'Community Events';

    protected string $uploadPath = 'events';

    protected string $orderBy = 'event_date';

    protected string $orderDir = 'desc';

    protected array $columns = ['title', 'status', 'event_date', 'is_published'];

    protected array $fields = [
        ['name' => 'title', 'label' => 'Title', 'type' => 'text', 'required' => true],
        ['name' => 'slug', 'label' => 'Slug', 'type' => 'text', 'required' => true],
        ['name' => 'status', 'label' => 'Status', 'type' => 'select', 'required' => true, 'options' => [
            'upcoming' => 'Upcoming (registration)',
            'info_only' => 'Upcoming (info only, no registration)',
            'completed' => 'Completed',
        ]],
        ['name' => 'tag_label', 'label' => 'Badge label (e.g. Workshop, Webinar)', 'type' => 'text'],
        ['name' => 'filter_category', 'label' => 'Community page filter tab', 'type' => 'select', 'options' => [
            '' => 'None (only shown under "All" / "Upcoming")',
            'meetup' => 'Networking Meetups',
            'mentoring' => 'Mentoring Sessions',
            'workshop' => 'Workshops & Bootcamps',
        ], 'help' => 'Which filter tab this event should appear under on the Community page.'],
        ['name' => 'event_date', 'label' => 'Date', 'type' => 'date'],
        ['name' => 'event_time', 'label' => 'Time (e.g. 9:30 AM – 4:30 PM)', 'type' => 'text'],
        ['name' => 'venue', 'label' => 'Venue (short, shown on cards)', 'type' => 'text'],
        ['name' => 'venue_full', 'label' => 'Venue (full address, optional)', 'type' => 'text'],
        ['name' => 'organizer', 'label' => 'Organizer (optional)', 'type' => 'text'],
        ['name' => 'summary', 'label' => 'Short summary (used on cards)', 'type' => 'textarea', 'required' => true],
        ['name' => 'body', 'label' => 'About the event (HTML)', 'type' => 'richtext'],
        ['name' => 'highlights', 'label' => '"What you will cover" (one per line)', 'type' => 'list'],
        ['name' => 'banner_image', 'label' => 'Banner image', 'type' => 'image'],
        ['name' => 'registration_open', 'label' => 'Registration open', 'type' => 'checkbox'],
        ['name' => 'registration_mode', 'label' => 'Registration form', 'type' => 'select', 'options' => [
            'internal' => 'Bizacharya is hosting — collect registrations on this site',
            'external' => 'Co-organized — redirect to an external registration link',
        ], 'help' => 'Choose "Co-organized" when a partner is running registration and provide their link below.'],
        ['name' => 'external_registration_url', 'label' => 'External registration link', 'type' => 'text', 'rules' => 'nullable|url', 'help' => 'Only used when "Registration form" above is set to Co-organized, e.g. https://forms.gle/...'],
        ['name' => 'is_published', 'label' => 'Published', 'type' => 'checkbox'],
    ];
}
