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
        $categories = [
            ['name' => 'Sembako', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/1046/1046784.png'],
            ['name' => 'Pakaian', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/892/892458.png'],
            ['name' => 'Alat Tulis', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/2991/2991108.png'],
            ['name' => 'Buah & Sayur', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/685/685352.png'],
            ['name' => 'Kue & Roti', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/857/857681.png'],
            ['name' => 'Apotek Herbal', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/1147/1147930.png'],
            ['name' => 'Kosmetik', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/3159/3159066.png'],
            ['name' => 'Mainan', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/4192/4192535.png'],
            ['name' => 'Bahan Bangunan', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/3163/3163491.png'],
            ['name' => 'Perabot Rumah', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/3642/3642056.png'],
            ['name' => 'Handphone', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/3524/3524659.png'],
            ['name' => 'Aksesoris', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/893/893226.png'],
            ['name' => 'Produk Daur Ulang', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/5022/5022183.png'],
            ['name' => 'Perlengkapan Bayi', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/860/860796.png'],
            ['name' => 'Souvenir', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/1198/1198372.png'],
            ['name' => 'Furniture Lokal', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/3095/3095583.png'],
            ['name' => 'Kebutuhan Pet', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/616/616408.png'],
            ['name' => 'Kopi Lokal', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/1046/1046785.png'],
            ['name' => 'Kerajinan', 'icon_url' => 'https://cdn-icons-png.flaticon.com/512/2909/2909769.png'],
        ];

        foreach ($categories as $category) {
            MartCategory::create($category);
        }
    }
}
