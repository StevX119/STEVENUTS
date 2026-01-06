<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Data Pesanan | Alan Resto</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
        }
        header {
            background: #0f172a;
            color: white;
            padding: 20px;
        }
        header h1 {
            margin: 0;
        }
        .container {
            width: 95%;
            margin: 20px auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
        }
        th {
            background: #1e293b;
            color: white;
        }
        tr:nth-child(even) {
            background: #f8fafc;
        }
        .badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }
        .badge-success {
            background: #dcfce7;
            color: #166534;
        }
        .badge-warning {
            background: #fef9c3;
            color: #854d0e;
        }
        .total {
            font-weight: bold;
            color: #16a34a;
        }
        .empty {
            text-align: center;
            padding: 20px;
            color: #64748b;
        }
    </style>
</head>
<body>

<header>
    <h1>📊 Dashboard Admin - Alan Resto</h1>
    <p>Daftar Pesanan Masuk</p>
</header>

<div class="container">

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Menu</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->nama_pelanggan }}</td>
                    <td>{{ $order->menu->nama_menu ?? '-' }}</td>
                    <td>{{ $order->jumlah }}</td>
                    <td>Rp {{ number_format($order->menu->harga ?? 0,0,',','.') }}</td>
                    <td class="total">
                        Rp {{ number_format(($order->menu->harga ?? 0) * $order->jumlah,0,',','.') }}
                    </td>
                    <td>{{ $order->created_at->format('d-m-Y H:i') }}</td>
                    <td>
                        <span class="badge badge-success">Masuk</span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="empty">Belum ada pesanan masuk</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

</body>
</html>
