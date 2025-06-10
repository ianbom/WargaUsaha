<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = ['id'];


    public function fromUser()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    // Relationship untuk penerima pesan
    public function toUser()
    {
        return $this->belongsTo(User::class, 'to_user_id');
    }

    // Scope untuk mendapatkan pesan antara dua user
    public function scopeBetweenUsers($query, $user1Id, $user2Id)
    {
        return $query->where(function($q) use ($user1Id, $user2Id) {
            $q->where('from_user_id', $user1Id)->where('to_user_id', $user2Id);
        })->orWhere(function($q) use ($user1Id, $user2Id) {
            $q->where('from_user_id', $user2Id)->where('to_user_id', $user1Id);
        });
    }

    // Scope untuk pesan yang belum dibaca
    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }
}
