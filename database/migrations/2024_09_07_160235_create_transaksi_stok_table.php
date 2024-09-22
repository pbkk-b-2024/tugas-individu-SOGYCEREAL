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
        Schema::create('transaksi_stok', function (Blueprint $table) {
            $table->string('id_transaksi',8)->primary();
            $table->string('id_produk');
            $table->string('id_stok');
            $table->date('tanggal_transaksi');
            $table->integer('jumlah');
            $table->string('tipe_transaksi');
            $table->text('keterangan')->nullable();
    
            $table->foreign('id_produk')->references('id_produk')->on('produk');
            $table->foreign('id_stok')->references('id_stok')->on('stok');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_stok');
    }
};
