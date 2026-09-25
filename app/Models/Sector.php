<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
