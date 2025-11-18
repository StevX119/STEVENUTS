<!DOCTYPE html>
<html>
<head>
    <title>Alan Resto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h1 class="mb-4 text-center">Alan Resto Menu</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach($menus as $menu)
        <div class="col-md-4 mb-4">
            <div class="card p-3 shadow-sm">
                <h5 class="fw-bold">{{ $menu->nama_menu }}</h5>
                <p class="text-danger fw-bold">Rp {{ number_format($menu->harga,0,',','.') }}</p>
                <p>Stok: {{ $menu->stok }}</p>

                <form action="{{ route('checkout') }}" method="POST">
                    @csrf
                    <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                    <input type="number" name="jumlah" class="form-control mb-2" value="1" min="1" max="{{ $menu->stok }}">
                    <input type="text" name="nama_pelanggan" class="form-control mb-2" placeholder="Nama Pelanggan" required>
                    <select name="tipe_pesanan" class="form-select mb-2" required>
                        <option value="">Tipe Pesanan</option>
                        <option value="Dine In">Dine In</option>
                        <option value="Take Away">Take Away</option>
                        <option value="Delivery">Delivery</option>
                    </select>
                    <button type="submit" class="btn btn-primary w-100">Pesan</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
</body>
</html>
