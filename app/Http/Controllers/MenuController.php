</php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        Menu::truncate();

        Menu::insert([
            ['nama_menu' => 'Wagyu Steak', 'harga' => 500000, 'stok' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['nama_menu' => 'Lobster Thermidor', 'harga' => 450000, 'stok' => 8, 'created_at' => now(), 'updated_at' => now()],
            ['nama_menu' => 'Caesar Salad', 'harga' => 90000, 'stok' => 15, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
