<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $guarded = [];

    public function segments()
    {
        return $this->hasMany(Segment::class);
    }
}
