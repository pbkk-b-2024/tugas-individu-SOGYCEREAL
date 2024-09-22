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
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->string('id_pengiriman', 6)->primary();
            $table->string('id_pemesanan');  // Matches pemesanan table's id
            $table->string('id_penjualan');  // New column to match the seeder
            $table->date('tanggal_pengiriman');
            $table->string('alamat_pengiriman');  // Added to store the address
            $table->string('kurir')->nullable();  // You may leave this nullable if not used
            $table->string('status_pengiriman')->nullable();  // Optional
            
            // Set up foreign key relationships
            $table->foreign('id_pemesanan')->references('id_pemesanan')->on('pemesanan');
            $table->foreign('id_penjualan')->references('id_penjualan')->on('penjualan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengiriman');
    }
};

