<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $allUser = User::all();
        return view('web.customer.chat.index', ['user' => $user, 'allUser' => $allUser]);
    }

    public function chat(User $user)
    {
        $me = Auth::user();
        $allUser = User::all();
        $messages = Message::all();
        return view('web.customer.chat.detail', [
            'me' => $me,
            'selectedUser' => $user,
            'allUser' => $allUser,
            'messages' => $messages
        ]);
    }
}
