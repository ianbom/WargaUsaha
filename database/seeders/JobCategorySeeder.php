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
        JobVacancyCategory::create([
            'category_name' => 'Teknologi Informasi',
        ]);

        JobVacancyCategory::create([
            'category_name' => 'Tukang',
        ]);
    }
}
