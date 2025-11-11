public function up(): void
{
    Schema::create('menus', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->decimal('harga', 10, 2);
        $table->integer('stok');
        $table->string('gambar')->nullable();
        $table->string('kategori')->nullable();
        $table->timestamps();
    });
}
