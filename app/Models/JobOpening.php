<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobOpening extends Model
{
    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'responsibilities' => 'array',
            'requirements' => 'array',
            'benefits' => 'array',
            'is_open' => 'boolean',
            'posted_at' => 'datetime',
        ];
    }

    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }

    public function scopeOpen($query)
    {
        return $query->where('is_open', true);
    }

    public function url(): string
    {
        return route('careers.show', $this->slug);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
