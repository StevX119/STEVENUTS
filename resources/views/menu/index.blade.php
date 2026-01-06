<!DOCTYPE html>
<html lang="id">
<head>
<<<<<<< HEAD
    <meta charset="UTF-8">
    <title>Alan Resto - Menu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 0;
        }
        header {
            background: #1f2933;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .container {
            width: 90%;
            margin: 20px auto;
        }
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }
        .card {
            background: white;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .card h3 {
            margin: 0 0 10px;
        }
        .price {
            color: #16a34a;
            font-weight: bold;
        }
        .stok {
            font-size: 14px;
            color: #555;
        }
        .order-box {
            background: white;
            margin-top: 30px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        input, select, button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            background: #2563eb;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }
        button:hover {
            background: #1d4ed8;
        }
        .success {
            background: #dcfce7;
            color: #166534;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<header>
    <h1>🍽️ Alan Resto</h1>
    <p>Silakan pilih menu favorit Anda</p>
</header>

<div class="container">

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="error">{{ session('error') }}</div>
    @endif

    {{-- LIST MENU --}}
    <div class="menu-grid">
        @foreach($menus as $menu)
            <div class="card">
                <h3>{{ $menu->nama_menu }}</h3>
                <p class="price">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                <p class="stok">Stok: {{ $menu->stok }}</p>
            </div>
        @endforeach
    </div>

    {{-- FORM ORDER --}}
    <div class="order-box">
        <h2>📝 Form Pemesanan</h2>

        <form action="{{ route('checkout') }}" method="POST">
            @csrf

            <label>Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" placeholder="Masukkan nama" required>

            <label>Pilih Menu</label>
            <select name="menu_id" required>
                <option value="">-- Pilih Menu --</option>
                @foreach($menus as $menu)
                    <option value="{{ $menu->id }}">
                        {{ $menu->nama_menu }} - Rp {{ number_format($menu->harga,0,',','.') }}
                    </option>
                @endforeach
            </select>

            <label>Jumlah</label>
            <input type="number" name="jumlah" min="1" value="1" required>

            <button type="submit">Pesan Sekarang</button>
        </form>
    </div>

</div>

=======
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

>>>>>>> e8e90ba809aa80a1614ea471ce2c637e99d7d51c
</body>
</html>
