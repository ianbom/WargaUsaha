<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileService
{

    public function updateProfile($data, $user)
{

    if (isset($data['profile_pic']) && $data['profile_pic']) {

        if ($user->profile_pic) {
            Storage::delete('public/' . $user->profile_pic);
        }

        $path = $data['profile_pic']->store('profile_pics', 'public');
        $data['profile_pic'] = $path;
    } else {
        unset($data['profile_pic']);
    }

    if (empty($data['password'])) {
        unset($data['password']);
    } else {
        $data['password'] = Hash::make($data['password']);
    }

    $user->update($data);
}

}
