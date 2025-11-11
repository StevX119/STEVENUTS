use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $menus = [
            ['nama' => 'Classic Tenderloin Steak', 'harga' => 89000, 'stok' => 10, 'gambar' => 'steak.jpg', 'kategori' => 'Main Course'],
            ['nama' => 'Grill Chicken Steak', 'harga' => 56000, 'stok' => 9, 'gambar' => 'chicken.jpg', 'kategori' => 'Main Course'],
            ['nama' => 'Es Teh Manis', 'harga' => 5000, 'stok' => 15, 'gambar' => 'tea.jpg', 'kategori' => 'Beverage'],
            ['nama' => 'Pasta Carbonara', 'harga' => 47000, 'stok' => 8, 'gambar' => 'pasta.jpg', 'kategori' => 'Pasta'],
        ];
        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
