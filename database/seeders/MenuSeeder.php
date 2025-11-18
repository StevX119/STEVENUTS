<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('menus')->insert([
            [
                'nama' => 'Classic Tenderloin Steak',
                'harga' => 89000,
                'stok' => 10,
                'gambar' => 'steak.jpg',
                'kategori' => 'Main Course'
            ],
            [
                'nama' => 'Pasta Carbonara',
                'harga' => 47000,
                'stok' => 15,
                'gambar' => 'carbonara.jpg',
                'kategori' => 'Pasta'
            ],
            [
                'nama' => 'Chicken Curry Rice',
                'harga' => 56000,
                'stok' => 20,
                'gambar' => 'curry.jpg',
                'kategori' => 'Rice Bowl'
            ],
        ]);
    }
}
