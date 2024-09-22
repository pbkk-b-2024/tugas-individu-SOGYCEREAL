<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->string('id_penjualan',6)->primary();
            $table->unsignedBigInteger('id_produk');
            $table->unsignedBigInteger('id_pemesanan');
            $table->integer('jumlah');
            $table->decimal('harga_jual', 10, 2);
            $table->decimal('diskon', 5, 2)->nullable();
            $table->date('tanggal_penjualan');
            
            $table->foreign('id_produk')->references('id_produk')->on('produk');
            $table->foreign('id_pemesanan')->references('id_pemesanan')->on('pemesanan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan');
    }
};
