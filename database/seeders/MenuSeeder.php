<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        Menu::create([
            'nama_menu' => 'Wagyu Steak',
            'harga' => 500000,
            'stok' => 10
        ]);

        Menu::create([
            'nama_menu' => 'Lobster Thermidor',
            'harga' => 400000,
            'stok' => 8
        ]);

        Menu::create([
            'nama_menu' => 'Caesar Salad',
            'harga' => 90000,
            'stok' => 15
        ]);
    }
}
