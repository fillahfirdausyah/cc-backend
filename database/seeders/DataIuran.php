<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Keuangan;

class DataIuran extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new Keuangan;
        $data->region_id = 2;
        $data->nama = "Prada";
        $data->jumlah = 90000;
        $data->kategori = "Event";
        $data->save(); 
    }
}
