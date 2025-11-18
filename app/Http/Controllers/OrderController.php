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
        $validated = $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'tipe_pesanan' => 'required|string|max:50',
            'menu_id' => 'required|exists:menus,id',
            'jumlah' => 'required|integer|min:1'
        ]);

        $menu = Menu::find($validated['menu_id']);
        $total = $menu->harga * $validated['jumlah'];

        $order = Order::create([
            'nama_pelanggan' => $validated['nama_pelanggan'],
            'tipe_pesanan' => $validated['tipe_pesanan'],
            'total' => $total
        ]);

        OrderItem::create([
            'order_id' => $order->id,
            'menu_id' => $menu->id,
            'jumlah' => $validated['jumlah'],
            'subtotal' => $total
        ]);

        return redirect('/')->with('success', 'Pesanan berhasil dibuat!');
    }
}
