<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name', 'asc')->get();
        return view('web.admin.user.index', ['users' => $users]);
    }

    public function show(User $user)
    {
        return view('web.admin.user.detail', ['user' => $user]);
    }


}
