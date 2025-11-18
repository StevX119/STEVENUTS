<!DOCTYPE html>
<html>
<head>
    <title>Menu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Daftar Menu</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach($menus as $menu)
        <div class="col-md-4 mb-3">
            <div class="card p-3">
                <h5>{{ $menu->nama_menu }}</h5>
                <p class="text-danger fw-bold">Rp {{ number_format($menu->harga,0,',','.') }}</p>
                <p>Stok: {{ $menu->stok }}</p>

                <!-- Form pilih menu dan jumlah -->
                <form action="{{ route('checkout.form') }}" method="GET">
                    <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                    <input type="number" name="jumlah" class="form-control mb-2" value="1" min="1" max="{{ $menu->stok }}">
                    <button type="submit" class="btn btn-primary w-100">Pesan</button>
                </form>

            </div>
        </div>
        @endforeach
    </div>
</div>
</body>
</html>
