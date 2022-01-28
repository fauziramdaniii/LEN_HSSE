<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name'     => 'Supervisor',
            'email'    => 'supervisorhsse@len.co.id',
            'role'    => 'supervisor',
            'password' => bcrypt('password'),
        ]);

        Admin::create([
            'name'     => 'PetugasApar',
            'email'    => 'petugasapar@len.co.id',
            'role'    => 'petugasapar',
            'password' => bcrypt('password'),
        ]);

        Admin::create([
            'name'     => 'PetugasP3k',
            'email'    => 'petugasp3k@len.co.id',
            'role'    => 'petugasp3k',
            'password' => bcrypt('password'),
        ]);
    }
}
