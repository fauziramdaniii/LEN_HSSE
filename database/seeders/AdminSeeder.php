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
            'name'     => 'PelaksanaApar',
            'email'    => 'pelaksanaapar@len.co.id',
            'role'    => 'petugasapar',
            'password' => bcrypt('password'),
        ]);

        Admin::create([
            'name'     => 'PelaksanaP3k',
            'email'    => 'pelaksana3k@len.co.id',
            'role'    => 'petugasp3k',
            'password' => bcrypt('password'),
        ]);

        Admin::create([
            'name'     => 'Superadmin',
            'email'    => 'superadmin@len.co.id',
            'role'    => 'superadmin',
            'password' => bcrypt('password'),
        ]);
    }
}
