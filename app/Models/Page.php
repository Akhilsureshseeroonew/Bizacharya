<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'journey_steps' => 'array',
            'hero_stats' => 'array',
            'vm_words' => 'array',
            'timeline' => 'array',
            'audience' => 'array',
            'expertise' => 'array',
            'leader_badges' => 'array',
            'hero_badges' => 'array',
            'accent_words' => 'array',
            'cta_chain' => 'array',
            'facts_heading' => 'array',
            'is_published' => 'boolean',
        ];
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}
