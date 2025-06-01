<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductCategory::create([
            'name' => 'Electronics',
            'icon_url' => 'https://example.com/icons/electronics.png',
        ]);

         ProductCategory::create([
            'name' => 'Groceries',
            'icon_url' => 'https://example.com/icons/electronics.png',
        ]);
    }
}
