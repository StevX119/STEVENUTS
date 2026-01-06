<!DOCTYPE html>
<html>
<head>
    <title>Alan Resto - Menu</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; padding: 20px; }
        .card { background: white; padding: 15px; margin-bottom: 10px; border-radius: 8px; }
        button { padding: 8px 12px; background: green; color: white; border: none; }
    </style>
</head>
<body>

<h1>🍽️ Alan Resto - Menu</h1>

@foreach($menus as $menu)
    <div class="card">
        <h3>{{ $menu->nama_menu }}</h3>
        <p>Harga: Rp {{ number_format($menu->harga) }}</p>
        <p>Stok: {{ $menu->stok }}</p>

        <form action="{{ route('checkout') }}" method="POST">
            @csrf
            <input type="hidden" name="menu_id" value="{{ $menu->id }}">
            <input type="text" name="nama_pelanggan" placeholder="Nama kamu" required>
            <input type="number" name="jumlah" min="1" value="1" required>
            <button type="submit">Pesan</button>
        </form>
    </div>
@endforeach

</body>
</html>
