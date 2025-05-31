<?php

namespace Database\Seeders;

use App\Models\Subdistrict;
use App\Models\Ward;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubdistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subdistricts = Subdistrict::create([
            'name' => 'Srengat'
        ]);

        Ward::create(([
            'subdistrict_id' => $subdistricts->id,
            'name' => 'Kauman'
        ]));
    }
}
