<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    // Halaman checkout (form input jumlah, nama pelanggan, tipe pesanan)
    public function showCheckout(Request $request)
    {
        $menu_id = $request->menu_id;
        $jumlah  = $request->jumlah;

        if (!$menu_id || !$jumlah) {
            return redirect('/')->with('error', 'Silakan pilih menu terlebih dahulu.');
        }

        $menu = Menu::find($menu_id);
        if (!$menu) {
            return redirect('/')->with('error', 'Menu tidak ditemukan.');
        }

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

        if ($menu->stok < $validated['jumlah']) {
            return back()->with('error', 'Stok tidak cukup!');
        }

        $total = $menu->harga * $validated['jumlah'];

        // Buat order
        $order = Order::create([
            'nama_pelanggan' => $validated['nama_pelanggan'],
            'tipe_pesanan'   => $validated['tipe_pesanan'],
            'total'          => $total
        ]);

        // Buat detail order
        OrderItem::create([
            'order_id' => $order->id,
            'menu_id'  => $menu->id,
            'jumlah'   => $validated['jumlah'],
            'subtotal' => $total
        ]);

        // Kurangi stok menu
        $menu->stok -= $validated['jumlah'];
        $menu->save();

        return redirect('/')->with('success', 'Pesanan berhasil dibuat!');
    }
}
