<?php

namespace Database\Seeders;

use App\Models\JenisAPAR as ModelsJenisAPAR;
use Illuminate\Database\Seeder;

class JenisAPARSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsJenisAPAR::create([
            'nama_jenis' => 'CO2',
        ]);
        ModelsJenisAPAR::create([
            'nama_jenis' => 'AIR',
        ]);
        ModelsJenisAPAR::create([
            'nama_jenis' => 'FOAM',
        ]);
    }
}
