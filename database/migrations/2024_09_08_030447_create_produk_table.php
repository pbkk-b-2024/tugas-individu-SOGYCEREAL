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
        Schema::create('produk', function (Blueprint $table) {
            $table->string('id_produk', 6)->primary();
            $table->string('nama_produk');
            $table->text('deskripsi')->nullable();
            $table->string('id_kategori') ->nullable();
            $table->decimal('harga_jual', 10, 2);
            $table->decimal('harga_beli', 10, 2);
            $table->integer('jumlah');
            $table->string('id_supplier') ->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};

