<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

    public function mart()
    {
        return $this->belongsTo(Mart::class);
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function carts(){
        return $this->hasMany(Cart::class);
    }
}
