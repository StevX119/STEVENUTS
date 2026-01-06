<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        // 1. Validasi input
        $validated = $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'tipe_pesanan'   => 'required|string|max:50',
            'menu_id'        => 'required|exists:menus,id',
            'jumlah'         => 'required|integer|min:1'
        ]);

        // 2. Ambil data menu
        $menu = Menu::findOrFail($validated['menu_id']);

        // 3. Cek stok
        if ($menu->stok < $validated['jumlah']) {
            return back()->with('error', 'Stok tidak cukup!');
        }

        // 4. Hitung total
        $total = $menu->harga * $validated['jumlah'];

        // 5. Simpan ke tabel orders
        $order = Order::create([
            'nama_pelanggan' => $validated['nama_pelanggan'],
            'tipe_pesanan'   => $validated['tipe_pesanan'],
            'total'          => $total
        ]);

        // 6. Simpan ke tabel order_items
        OrderItem::create([
            'order_id' => $order->id,
            'menu_id'  => $menu->id,
            'jumlah'   => $validated['jumlah'],
            'subtotal' => $total
        ]);

        // 7. Kurangi stok
        $menu->stok -= $validated['jumlah'];
        $menu->save();

        // 8. Balik ke halaman awal
        return redirect('/')->with('success', 'Pesanan berhasil dibuat!');
    }
}
