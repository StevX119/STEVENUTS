<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
<<<<<<< HEAD
    protected $fillable = [
        'nama_pelanggan',
        'menu_id',
        'jumlah',
        'total'
    ];
=======
    protected $fillable = ['nama_pelanggan', 'tipe_pesanan', 'total'];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
>>>>>>> e8e90ba809aa80a1614ea471ce2c637e99d7d51c
}
