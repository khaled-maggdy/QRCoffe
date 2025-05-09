<?php

namespace Database\Seeders;

use App\Models\Governorate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GovernorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $governorates = [
            'Cairo',
            'Giza',
            'Alexandria',
            'Qalyubia',
            'Sharqia',
            'Dakahlia',
            'Beheira',
            'Kafr El Sheikh',
            'Gharbia',
            'Monufia',
            'Fayoum',
            'Beni Suef',
            'Minya',
            'Assiut',
            'Sohag',
            'Qena',
            'Luxor',
            'Aswan',
            'Red Sea',
            'New Valley',
            'Matrouh',
            'North Sinai',
            'South Sinai',
            'Port Said',
            'Ismailia',
            'Suez',
        ];

        foreach ($governorates as $governorate) {
            Governorate::create([
                'governorate' => $governorate,
            ]);
        }

    }
}
