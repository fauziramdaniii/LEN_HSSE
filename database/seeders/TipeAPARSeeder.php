<?php

namespace Database\Seeders;

use App\Models\tipeAPAR as ModelsTipeAPAR;
use Illuminate\Database\Seeder;

class TipeAPARSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsTipeAPAR::create([
            'nama_tipe' => 'CATRIDGE'
        ]);
        ModelsTipeAPAR::create([
            'nama_tipe' => 'STORAGE PREASURE'
        ]);
    }
}
