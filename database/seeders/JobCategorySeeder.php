<?php

namespace Database\Seeders;

use App\Models\JobVacancyCategory;
use Illuminate\Contracts\Queue\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class JobCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
 public function run(): void
    {
        $categories = [
            ['category_name' => 'Tukang Bangunan'],
            ['category_name' => 'Desain Grafis'],
            ['category_name' => 'Marketing & Penjualan'],
            ['category_name' => 'Customer Service'],
            ['category_name' => 'Barista / Waiter'],
            ['category_name' => 'Koki / Juru Masak'],
            ['category_name' => 'Admin Sosial Media'],
            ['category_name' => 'Driver / Kurir'],
            ['category_name' => 'Petugas Kebersihan'],
            ['category_name' => 'Penjahit / Konveksi'],
            ['category_name' => 'Mekanik / Montir'],
            ['category_name' => 'Staf Gudang'],
            ['category_name' => 'Kasir'],
            ['category_name' => 'Perias / Makeup Artist'],
            ['category_name' => 'Fotografer / Videografer'],
            ['category_name' => 'Instruktur Les / Guru Privat'],
            ['category_name' => 'Asisten Rumah Tangga'],
            ['category_name' => 'Pemandu Wisata Lokal'],
            ['category_name' => 'Pekerja Produksi UMKM'],
        ];

        foreach ($categories as $category) {
            JobVacancyCategory::create($category);
        }
    }
}
