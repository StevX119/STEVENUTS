namespace App\Http\Controllers;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $kategori = $request->get('kategori');
        $menus = Menu::when($kategori, fn($q) => $q->where('kategori', $kategori))->get();
        $kategoris = Menu::select('kategori')->distinct()->pluck('kategori');
        return view('menu.index', compact('menus', 'kategoris'));
    }
}
