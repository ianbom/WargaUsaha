<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MartCategory extends Model
{
     protected $guarded = ['id'];

    public function marts()
    {
        return $this->hasMany(Mart::class);
    }
}
