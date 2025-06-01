<?php

namespace Database\Seeders;

use App\Models\ServiceCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServiceCategory::create([
            'name' => 'Web Development',

            'icon_url' => 'web-development-icon.png',
        ]);

        ServiceCategory::create([
            'name' => 'Tukang',

            'icon_url' => 'web-development-icon.png',
        ]);
    }
}
