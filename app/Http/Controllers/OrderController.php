namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Menu;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        $menu = Menu::findOrFail($request->menu_id);
        $jumlah = $request->jumlah;
        $subtotal = $menu->harga * $jumlah;

        return view('menu.checkout', compact('menu', 'jumlah', 'subtotal'));
    }

    public function process(Request $request)
    {
        $menu = Menu::find($request->menu_id);
        $jumlah = $request->jumlah;
        $subtotal = $menu->harga * $jumlah;

        $order = Order::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'tipe_pesanan' => $request->tipe_pesanan,
            'total' => $subtotal,
        ]);

        OrderItem::create([
            'order_id' => $order->id,
            'menu_id' => $menu->id,
            'jumlah' => $jumlah,
            'subtotal' => $subtotal,
        ]);

        $menu->decrement('stok', $jumlah);

        return redirect()->route('success');
    }

    public function success()
    {
        return view('menu.success');
    }
}
