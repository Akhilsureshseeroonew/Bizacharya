<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'event_date' => 'date',
            'gallery' => 'array',
            'highlights' => 'array',
            'registration_open' => 'boolean',
            'is_published' => 'boolean',
            'published_at' => 'datetime',
        ];
    }

    public function registrations()
    {
        return $this->hasMany(EventRegistration::class);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function url(): string
    {
        return route('community.show', $this->slug);
    }

    public function canRegister(): bool
    {
        return $this->status === 'upcoming' && $this->registration_open;
    }

    public function hasExternalRegistration(): bool
    {
        return $this->registration_mode === 'external' && filled($this->external_registration_url);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
