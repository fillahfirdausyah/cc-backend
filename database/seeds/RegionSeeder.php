<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $region = [
            [
                'region' => 'Pusat'
            ],
            [
                'region' => 'Ponorogo'
            ],
            [
                'region' => 'Manado'
            ],
            [
                'region' => 'Surabaya' 
            ]
        ];

        foreach($region as $r) {
            Region::create($r);
        }
    }
}
