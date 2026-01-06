<!DOCTYPE html>
<html>
<head>
    <title>Menu Resto</title>
</head>
<body>

<h1>Menu Restoran</h1>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

@if(session('error'))
    <p style="color:red">{{ session('error') }}</p>
@endif

<form action="{{ route('checkout') }}" method="POST">
@csrf

Nama: <input type="text" name="nama_pelanggan" required><br><br>

Tipe:
<select name="tipe_pesanan">
    <option>Dine In</option>
    <option>Take Away</option>
</select><br><br>

Menu:
<select name="menu_id">
@foreach($menus as $menu)
    <option value="{{ $menu->id }}">
        {{ $menu->nama_menu }} - Rp {{ number_format($menu->harga) }} (stok: {{ $menu->stok }})
    </option>
@endforeach
</select><br><br>

Jumlah:
<input type="number" name="jumlah" min="1" required><br><br>

<button type="submit">Pesan</button>
</form>

</body>
</html>
