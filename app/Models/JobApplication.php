<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $guarded = ['id'];

    public function jobOpening()
    {
        return $this->belongsTo(JobOpening::class);
    }
}
