<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Models\Menu;

class SetupCheckout extends Command
{
    protected $signature = 'setup:checkout';
    protected $description = 'Setup database, tables, menu seeder, and initial checkout setup';

    public function handle()
    {
        $this->info('Starting checkout setup...');

        // 1️⃣ Buat tabel menus
        if (!Schema::hasTable('menus')) {
            Schema::create('menus', function (Blueprint $table) {
                $table->id();
                $table->string('nama_menu');
                $table->integer('harga');
                $table->integer('stok');
                $table->timestamps();
            });
            $this->info('Table menus created.');
        } else {
            $this->info('Table menus already exists.');
        }

        // 2️⃣ Buat tabel orders
        if (!Schema::hasTable('orders')) {
            Schema::create('orders', function (Blueprint $table) {
                $table->id();
                $table->string('nama_pelanggan');
                $table->string('tipe_pesanan');
                $table->string('metode_pembayaran');
                $table->integer('total_harga');
                $table->timestamps();
            });
            $this->info('Table orders created.');
        } else {
            $this->info('Table orders already exists.');
        }

        // 3️⃣ Buat tabel order_items
        if (!Schema::hasTable('order_items')) {
            Schema::create('order_items', function (Blueprint $table) {
                $table->id();
                $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
                $table->foreignId('menu_id')->constrained('menus')->onDelete('cascade');
                $table->integer('jumlah');
                $table->integer('subtotal');
                $table->timestamps();
            });
            $this->info('Table order_items created.');
        } else {
            $this->info('Table order_items already exists.');
        }

        // 4️⃣ Seeder menu
        $menus = [
            ['nama_menu'=>'Wagyu Steak','harga'=>500000,'stok'=>10],
            ['nama_menu'=>'Lobster Thermidor','harga'=>450000,'stok'=>8],
            ['nama_menu'=>'Truffle Pasta','harga'=>300000,'stok'=>12],
            ['nama_menu'=>'Caesar Salad Deluxe','harga'=>120000,'stok'=>15],
            ['nama_menu'=>'Filet Mignon','harga'=>480000,'stok'=>7],
            ['nama_menu'=>'Foie Gras','harga'=>350000,'stok'=>6],
            ['nama_menu'=>'Grilled Salmon','harga'=>250000,'stok'=>10],
            ['nama_menu'=>'Black Angus Burger','harga'=>180000,'stok'=>20],
            ['nama_menu'=>'Margherita Pizza Premium','harga'=>150000,'stok'=>15],
            ['nama_menu'=>'Chocolate Lava Cake','harga'=>90000,'stok'=>25],
        ];

        foreach ($menus as $menu) {
            Menu::updateOrCreate(['nama_menu'=>$menu['nama_menu']], $menu);
        }

        $this->info('10 menu mewah berhasil ditambahkan.');

        $this->info('Checkout setup completed successfully!');
    }
}
