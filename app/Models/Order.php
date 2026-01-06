<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['nama_pelanggan', 'tipe_pesanan', 'total'];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
