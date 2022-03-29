<?php

namespace Database\Seeders;

use App\Models\ZonaLokasi;
use Illuminate\Database\Seeder;

class ZonaLokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ZonaLokasi::create([
            'zona' => '1'
        ]);
        ZonaLokasi::create([
            'zona' => '2'
        ]);
        ZonaLokasi::create([
            'zona' => '3'
        ]);
        ZonaLokasi::create([
            'zona' => '4'
        ]);
        ZonaLokasi::create([
            'zona' => '5'
        ]);
        ZonaLokasi::create([
            'zona' => '6'
        ]);
        ZonaLokasi::create([
            'zona' => '7'
        ]);
        ZonaLokasi::create([
            'zona' => '8'
        ]);
        ZonaLokasi::create([
            'zona' => '9'
        ]);
    }
}
