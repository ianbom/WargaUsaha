<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'ward_id' => 1,
            'name' => 'Argya Seller',
            'email' => 'argyaseller@gmail.com',
            'password' => bcrypt('argya123'),
            'role' => 'Seller',
            'is_admin' => false
        ]);
        User::create([
            'ward_id' => 1,
            'name' => 'Argya Buyer',
            'email' => 'argyabuyer@gmail.com',
            'password' => bcrypt('argya123'),
            'role' => 'Buyer',
            'is_admin' => false
        ]);
        User::create([
            'ward_id' => 1,
            'name' => 'Argya Admin',
            'email' => 'argyaadmin@gmail.com',
            'password' => bcrypt('argya123'),
            'role' => 'Buyer',
            'is_admin' => true
        ]);
        User::create([
            'ward_id' => 1,
            'name' => 'Ian Seller',
            'email' => 'ianseller@gmail.com',
            'password' => bcrypt('ian123'),
            'role' => 'Seller',
            'is_admin' => false
        ]);
        User::create([
            'ward_id' => 1,
            'name' => 'Ian Buyer',
            'email' => 'ianbuyer@gmail.com',
            'password' => bcrypt('ian123'),
            'role' => 'Buyer',
            'is_admin' => false
        ]);
        User::create([
            'ward_id' => 1,
            'name' => 'Ian Admin',
            'email' => 'ianadmin@gmail.com',
            'password' => bcrypt('ian123'),
            'role' => 'Buyer',
            'is_admin' => true
        ]);
    }
}
