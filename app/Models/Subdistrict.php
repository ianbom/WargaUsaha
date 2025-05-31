<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subdistrict extends Model
{
    protected $guarded = ['id'];

    public function wards()
    {
        return $this->hasMany(Ward::class);
    }
}
