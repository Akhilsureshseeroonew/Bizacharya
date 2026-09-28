<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'service' => 'array',
            'viewed_at' => 'datetime',
        ];
    }
}
