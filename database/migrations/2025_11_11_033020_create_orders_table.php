public function up(): void
{
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->string('nama_pelanggan');
        $table->enum('tipe_pesanan', ['Dine In', 'Take Away']);
        $table->decimal('total', 10, 2);
        $table->timestamps();
    });
}
