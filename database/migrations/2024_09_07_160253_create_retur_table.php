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
        Schema::create('retur', function (Blueprint $table) {
            $table->string('id_retur',6)->primary();
            $table->string('id_transaksi');
            $table->string('id_produk');
            $table->date('tanggal_retur');
            $table->text('alasan_retur');
            $table->integer('jumlah');
            
            $table->foreign('id_transaksi')->references('id_transaksi')->on('transaksi_stok');
            $table->foreign('id_produk')->references('id_produk')->on('produk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retur');
    }
};
