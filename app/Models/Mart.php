<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mart extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function martCategory()
    {
        return $this->belongsTo(MartCategory::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
