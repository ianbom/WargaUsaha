<?php

namespace Database\Seeders;
use App\Models\Mart;
use App\Models\SellerWallet;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['name' => 'Argya Seller', 'email' => 'argyaseller@gmail.com', 'password' => 'argya123', 'role' => 'Seller', 'is_admin' => false],
            ['name' => 'Argya Buyer',  'email' => 'argyabuyer@gmail.com',  'password' => 'argya123', 'role' => 'Buyer',  'is_admin' => false],
            ['name' => 'Argya Admin',  'email' => 'argyaadmin@gmail.com',  'password' => 'argya123', 'role' => 'Buyer',  'is_admin' => true],
            ['name' => 'Ian Seller',   'email' => 'ianseller@gmail.com',   'password' => 'ian123',   'role' => 'Seller', 'is_admin' => false],
            ['name' => 'Ian Buyer',    'email' => 'ianbuyer@gmail.com',    'password' => 'ian123',   'role' => 'Buyer',  'is_admin' => false],
            ['name' => 'Ian Admin',    'email' => 'ianadmin@gmail.com',    'password' => 'ian123',   'role' => 'Buyer',  'is_admin' => true],
        ];
        foreach ($users as $u) {
            $user = User::create([
                'ward_id' => 1,
                'name' => $u['name'],
                'email' => $u['email'],
                'password' => Hash::make($u['password']),
                'role' => $u['role'],
                'is_admin' => $u['is_admin'],
            ]);
            if ($user->role === 'Seller') {
                Mart::create([
                    'user_id' => $user->id,
                ]);
            }
            SellerWallet::create([
                'user_id' => $user->id,
                'amount' => 0,
            ]);
        }
    }
}
