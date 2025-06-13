<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\JobApplication;
use App\Models\JobVacancy;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function ward()
    {
        return $this->belongsTo(Ward::class);
    }

     public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function mart()
    {
        return $this->hasOne(Mart::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'buyer_id');
    }

    public function sales()
    {
        return $this->hasMany(Order::class, 'seller_id');
    }

    public function sellerWallet()
    {
        return $this->hasOne(SellerWallet::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class, 'user_id');
    }
    public function jobVacancies()
    {
        return $this->hasMany(JobVacancy::class, 'user_id');
    }
}
