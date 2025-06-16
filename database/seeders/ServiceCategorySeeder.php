<?php

namespace Database\Seeders;

use App\Models\ServiceCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceCategorySeeder extends Seeder
{
    
public function run(): void
    {
        $categories = [
            ['name' => 'Web Development', 'icon_url' => 'icons/web-development.png'],
            ['name' => 'Tukang Bangunan', 'icon_url' => 'icons/construction.png'],
            ['name' => 'Desain Grafis', 'icon_url' => 'icons/graphic-design.png'],
            ['name' => 'Jasa Kebersihan', 'icon_url' => 'icons/cleaning-service.png'],
            ['name' => 'Penjahit', 'icon_url' => 'icons/tailor.png'],
            ['name' => 'Fotografi', 'icon_url' => 'icons/photography.png'],
            ['name' => 'Barber & Salon', 'icon_url' => 'icons/barber.png'],
            ['name' => 'Jasa Pindahan', 'icon_url' => 'icons/moving.png'],
            ['name' => 'Service Elektronik', 'icon_url' => 'icons/electronic-repair.png'],
            ['name' => 'Catering Rumahan', 'icon_url' => 'icons/catering.png'],
            ['name' => 'Les Privat', 'icon_url' => 'icons/education.png'],
            ['name' => 'Pembuatan Konten', 'icon_url' => 'icons/content-creation.png'],
            ['name' => 'Servis Motor', 'icon_url' => 'icons/motorcycle-repair.png'],
            ['name' => 'Jasa Kebun & Taman', 'icon_url' => 'icons/gardening.png'],
            ['name' => 'Laundry', 'icon_url' => 'icons/laundry.png'],
            ['name' => 'Montir Panggilan', 'icon_url' => 'icons/mechanic.png'],
            ['name' => 'MC & EO Lokal', 'icon_url' => 'icons/event-organizer.png'],
            ['name' => 'Penerjemah', 'icon_url' => 'icons/translator.png'],
            ['name' => 'Digital Marketing', 'icon_url' => 'icons/digital-marketing.png'],
            ['name' => 'Pembuatan Aplikasi', 'icon_url' => 'icons/app-development.png'],
        ];

        foreach ($categories as $category) {
            ServiceCategory::create($category);
        }
    }
}
