<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{

public function index()
{
    $user = Auth::user();

    // Ambil user yang pernah chat dengan user saat ini
    $allUser = User::where('id', '!=', $user->id)
        ->whereExists(function ($query) use ($user) {
            $query->select(DB::raw(1))
                ->from('messages')
                ->whereRaw('(messages.from_user_id = users.id AND messages.to_user_id = ?)', [$user->id])
                ->orWhereRaw('(messages.to_user_id = users.id AND messages.from_user_id = ?)', [$user->id]);
        })
        ->orderBy('name', 'asc')
        ->get();

    return view('web.customer.chat.index', ['user' => $user, 'allUser' => $allUser]);
}

    public function chat(User $user)
    {
        $me = Auth::user();
        $allUser = User::where('id', '!=', $me->id)
        ->whereExists(function ($query) use ($me) {
            $query->select(DB::raw(1))
                ->from('messages')
                ->whereRaw('(messages.from_user_id = users.id AND messages.to_user_id = ?)', [$me->id])
                ->orWhereRaw('(messages.to_user_id = users.id AND messages.from_user_id = ?)', [$me->id]);
        })
        ->orderBy('name', 'asc')
        ->get();
        $messages = Message::all();
        return view('web.customer.chat.detail', [
            'me' => $me,
            'selectedUser' => $user,
            'allUser' => $allUser,
            'messages' => $messages
        ]);
    }
}
