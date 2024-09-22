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
        Schema::create('pembelian', function (Blueprint $table) {
            $table->string('id_pembelian',6)->primary();
            $table->string('id_supplier');
            $table->date('tanggal_pembelian');
            $table->decimal('total_harga', 10, 2);
            $table->string('status');
            $table->foreign('id_supplier')->references('id_supplier')->on('supplier');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelian');
    }
};
