<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Mart;
use App\Models\SellerWallet;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.cover-register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['nullable', 'string'],

        ]);

        if ($request->role == 'Seller') {
            $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'ward_id' => 1,
            'role' => 'Buyer',

            ]);

            // Mart::create([
            //     'user_id' => $user->id,
            //     'is_active' => true,
            //     'is_verified' => true
            // ]);

            SellerWallet::create([
                'user_id' => $user->id,
                'amount' => 0
            ]);
        } else{
             $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'ward_id' => 1,
            'role' => 'Buyer',
            ]);
             SellerWallet::create([
                'user_id' => $user->id,
                'amount' => 0
            ]);
        }



        event(new Registered($user));

        Auth::login($user);

        if ($user->role == 'Seller') {
            return redirect(route('seller.profile.index', absolute: false));
        }

        return redirect(route('customer.home.index', absolute: false));
    }
}
