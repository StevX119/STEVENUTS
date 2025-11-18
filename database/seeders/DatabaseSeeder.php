<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Hanya jalankan seeder menu
        $this->call([
            MenuSeeder::class,
        ]);
    }
}
