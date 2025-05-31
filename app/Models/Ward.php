<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
     protected $guarded = ['id'];

    public function subdistrict()
    {
        return $this->belongsTo(Subdistrict::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
