<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $guarded = ['id'];

    protected function casts(): array
    {
        return ['viewed_at' => 'datetime'];
    }

    public function jobOpening()
    {
        return $this->belongsTo(JobOpening::class);
    }
}
