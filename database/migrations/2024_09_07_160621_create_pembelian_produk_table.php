<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('pembelian_produk', function (Blueprint $table) {
    //         $table->id();
    //         $table->foreignId('pembelian_id')->constrained()->onDelete('cascade');
    //         $table->foreignId('produk_id')->constrained()->onDelete('cascade');
    //         $table->integer('jumlah');
    //         $table->decimal('harga', 10, 2);
    //         $table->timestamps();
    //     });
    // }

    public function up(): void
    {
        Schema::create('pembelian_produk', function (Blueprint $table) {
            $table->string('pembelian_id');  // Gunakan string untuk primary key yang bukan auto-increment
            $table->string('produk_id');     // Gunakan string untuk primary key yang bukan auto-increment
            $table->integer('jumlah');
            $table->decimal('harga', 10, 2);
            $table->timestamps();

            // Definisikan foreign key dan aturan penghapusan
            $table->foreign('pembelian_id')->references('id_pembelian')->on('pembelian')->onDelete('cascade');
            $table->foreign('produk_id')->references('id_produk')->on('produk')->onDelete('cascade');

            // Definisikan composite key untuk mencegah duplikasi
            $table->primary(['pembelian_id', 'produk_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelian_produk');
    }
};
