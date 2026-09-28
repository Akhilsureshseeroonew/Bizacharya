<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Associate extends Model
{
    protected $guarded = ['id'];

    protected function casts(): array
    {
        return ['viewed_at' => 'datetime'];
    }
}
