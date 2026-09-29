<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Sector extends Model
{
    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'services_offered' => 'array',
            'who_can_benefit' => 'array',
            'is_published' => 'boolean',
        ];
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('title');
    }

    public function url(): string
    {
        return route('opportunities.show', $this->slug);
    }

    /**
     * Keywords that tie a free-text "Our Services" line to a service page, checked in this order
     * (first hit wins, so "Business registration and compliance" goes to Business Registration).
     */
    protected const SERVICE_KEYWORDS = [
        'business-registration' => ['regist', 'udyam'],
        'compliance' => ['compliance', 'legal', 'regulatory'],
        'funding-readiness' => ['fund', 'investor', 'loan', 'subsid'],
        'branding-marketing' => ['brand', 'packaging', 'digital presence', 'marketing'],
        'market-access' => ['market'],
        'entrepreneurship-training' => ['training', 'opportunity', 'idea'],
        'business-mentoring' => ['mentor', 'planning', 'growth', 'scale', 'consult'],
    ];

    /**
     * The "Our Services" lines paired with the service page each one links to. Lines that match
     * no published service fall back to the services listing.
     *
     * @return array<int, array{label: string, url: string}>
     */
    public function servicesOfferedLinks(): array
    {
        $services = Service::published()->get()->keyBy('slug');

        return collect($this->services_offered ?? [])->map(function (string $label) use ($services) {
            $text = mb_strtolower($label);
            foreach (self::SERVICE_KEYWORDS as $slug => $keywords) {
                if ($services->has($slug) && Str::contains($text, $keywords)) {
                    return ['label' => $label, 'url' => $services[$slug]->url()];
                }
            }

            return ['label' => $label, 'url' => route('services.index')];
        })->all();
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
