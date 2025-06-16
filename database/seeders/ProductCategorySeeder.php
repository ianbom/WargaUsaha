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
        $categories = [
            ['name' => 'Makanan Ringan', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/1046/1046784.png'],
            ['name' => 'Minuman Herbal', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/3075/3075977.png'],
            ['name' => 'Kerajinan Tangan', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/2909/2909769.png'],
            ['name' => 'Fashion Muslim', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/3179/3179068.png'],
            ['name' => 'Pakaian Anak', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/892/892458.png'],
            ['name' => 'Sepatu Handmade', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/869/869869.png'],
            ['name' => 'Aksesoris & Perhiasan', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/893/893226.png'],
            ['name' => 'Peralatan Dapur', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/1046/1046786.png'],
            ['name' => 'Produk Kecantikan', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/3159/3159066.png'],
            ['name' => 'Herbal & Kesehatan', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/1147/1147930.png'],
            ['name' => 'Dekorasi Rumah', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/2190/2190552.png'],
            ['name' => 'Souvenir Pernikahan', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/1198/1198372.png'],
            ['name' => 'Produk Anyaman', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/3421/3421740.png'],
            ['name' => 'Mebel Kayu', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/3095/3095583.png'],
            ['name' => 'Mainan Edukatif', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/2474/2474723.png'],
            ['name' => 'Tas Rajut', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/2921/2921222.png'],
            ['name' => 'Daur Ulang Kreatif', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/5022/5022183.png'],
            ['name' => 'Olahan Laut', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/3171/3171065.png'],
            ['name' => 'Produk Kulit', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/2785/2785819.png'],
            ['name' => 'Kopi Lokal', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/1046/1046785.png'],
        ];

        foreach ($categories as $category) {
            ProductCategory::create($category);
        }
    }
}
