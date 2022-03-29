<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'     => 'Supervisor',
            'email'    => 'supervisorhsse@len.co.id',
            'role'    => 'supervisor',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name'     => 'PelaksanaApar',
            'email'    => 'pelaksanaapar@len.co.id',
            'role'    => 'petugasapar',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name'     => 'PelaksanaP3k',
            'email'    => 'pelaksana3k@len.co.id',
            'role'    => 'petugasp3k',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name'     => 'Superadmin',
            'email'    => 'superadmin@len.co.id',
            'role'    => 'superadmin',
            'password' => bcrypt('password'),
        ]);
    }
}
