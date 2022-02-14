<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
            P3KSeeder::class,
            JenisAPARSeeder::class,
            TipeAPARSeeder::class,
        ]);
    }
}
