<h2>Checkout</h2>
<form action="{{ route('checkout') }}" method="POST">
    @csrf
    <input type="hidden" name="menu_id" value="{{ $menu->id }}">
    <input type="hidden" name="jumlah" value="{{ $jumlah }}">
    <input type="text" name="nama_pelanggan" placeholder="Nama Pelanggan" required>
    <select name="tipe_pesanan" required>
        <option value="">Tipe Pesanan</option>
        <option value="Dine In">Dine In</option>
        <option value="Take Away">Take Away</option>
        <option value="Delivery">Delivery</option>
    </select>
    <button type="submit">Checkout</button>
</form>
