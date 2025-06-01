<?php

namespace Database\Seeders;

use App\Models\MartCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MartCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MartCategory::create([
            'name' => 'Grocery',
            'icon_url' => 'https://example.com/icons/grocery.png',
        ]);

         MartCategory::create([
            'name' => 'Electronics',
            'icon_url' => 'https://example.com/icons/grocery.png',
        ]);
    }
}
