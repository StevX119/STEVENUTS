<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Menu;

class OrderController extends Controller
{
    // Tampilkan halaman checkout khusus
    public function showCheckoutForm(Request $request)
    {
        $menu_id = $request->menu_id;
        $jumlah = $request->jumlah;

        if (!$menu_id || !$jumlah) {
            return redirect('/')->with('error', 'Silakan pilih menu terlebih dahulu.');
        }

        $menu = Menu::find($menu_id);
        return view('checkout', compact('menu', 'jumlah'));
    }

    // Proses checkout
    public function checkout(Request $request)
    {
        $validated = $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'tipe_pesanan'   => 'required|string|max:50',
            'menu_id'        => 'required|exists:menus,id',
            'jumlah'         => 'required|integer|min:1',
        ]);

        $menu = Menu::find($validated['menu_id']);
        $subtotal = $menu->harga * $validated['jumlah'];

        $order = Order::create([
            'nama_pelanggan' => $validated['nama_pelanggan'],
            'tipe_pesanan'   => $validated['tipe_pesanan'],
            'total'          => $subtotal,
        ]);

        OrderItem::create([
            'order_id' => $order->id,
            'menu_id'  => $menu->id,
            'jumlah'   => $validated['jumlah'],
            'subtotal' => $subtotal,
        ]);

        return redirect('/')->with('success', 'Order berhasil dibuat!');
    }
}
