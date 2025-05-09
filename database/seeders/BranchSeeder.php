<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Governorate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branches = [
            'Nasr City' => '15 Abbas El Akkad St, Nasr City, Cairo',
            'Heliopolis' => '24 El Merghany St, Heliopolis, Cairo',
            'New Cairo' => '90th Street, Fifth Settlement, New Cairo',
            'Maadi' => '12 Road 9, Maadi, Cairo',
            'Zamalek' => '5 Brazil St, Zamalek, Cairo',
            'Dokki' => '18 Tahrir St, Dokki, Giza',
            '6th of October' => 'Mall of Arabia, 6th of October City',
            'Sheikh Zayed' => 'Arkan Plaza, Sheikh Zayed, Giza',
            'Alexandria' => 'Stanley Bridge, Alexandria',
            'Tanta' => 'Al Galaa St, Tanta',
            'Mansoura' => 'El Gomhoreya St, Mansoura',
            'Port Said' => '23 July St, Port Said',
            'Suez' => 'El Shohada Square, Suez',
            'Assiut' => 'Omar Ibn El Khattab St, Assiut',
            'Aswan' => 'Corniche El Nile, Aswan',
        ];

        foreach ($branches as $branch_name => $address) {
            Branch::create([
                'barnch_name' => $branch_name,
                'address' => $address,
                'governorate_id' => Governorate::all()->random()->id,
            ]);
        }

    }
}
