public function up(): void
{
    Schema::create('order_items', function (Blueprint $table) {
        $table->id();
        $table->foreignId('order_id')->constrained()->onDelete('cascade');
        $table->foreignId('menu_id')->constrained()->onDelete('cascade');
        $table->integer('jumlah');
        $table->decimal('subtotal', 10, 2);
        $table->timestamps();
    });
}
