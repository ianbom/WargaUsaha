<?php

namespace App\Models;
use App\Models\Mart;
use Illuminate\Database\Eloquent\Model;

class GroupOrder extends Model
{
    protected $guarded = ['id'];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mart()
    {
        return $this->belongsTo(Mart::class);
    }

    public function getBuyerName(){

    }
}
