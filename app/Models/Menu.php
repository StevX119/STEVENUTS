<?php

namespace App\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory;
=======
>>>>>>> e8e90ba809aa80a1614ea471ce2c637e99d7d51c
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
<<<<<<< HEAD
    use HasFactory;

    protected $fillable = [
        'nama_menu',
        'harga',
        'gambar'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
=======
    protected $fillable = ['nama_menu', 'harga', 'stok'];
>>>>>>> e8e90ba809aa80a1614ea471ce2c637e99d7d51c
}
