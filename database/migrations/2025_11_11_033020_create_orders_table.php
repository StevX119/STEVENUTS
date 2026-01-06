<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->string('nama_pelanggan');
            $table->unsignedBigInteger('menu_id');
            $table->integer('jumlah');
            $table->integer('total');
=======
            $table->string('nama_menu');
            $table->integer('harga');
            $table->integer('stok');
>>>>>>> e8e90ba809aa80a1614ea471ce2c637e99d7d51c
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
