<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WalletTransaction extends Model
{
     protected $guarded = ['id'];

    public function sellerWallet()
    {
        return $this->belongsTo(SellerWallet::class);
    }
}
