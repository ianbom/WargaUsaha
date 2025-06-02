<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [
        'id'
    ];

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }

    public function getStatusBadgeClassAttribute(): string
    {
        return match($this->order_status) {
            'Pending' => 'bg-yellow-100 text-yellow-800',
            'Paid' => 'bg-blue-100 text-blue-800',
            'Complete' => 'bg-green-100 text-green-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }


}
