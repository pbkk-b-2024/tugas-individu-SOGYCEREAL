<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Produk;
use App\Models\Pemesanan;

class PenjualanTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // Get all existing product IDs and pemesanan IDs
        $produkIds = Produk::pluck('id_produk')->toArray();
        $pemesananIds = Pemesanan::pluck('id_pemesanan')->toArray();

        foreach (range(1, 10) as $index) {
            DB::table('penjualan')->insert([
                'id_penjualan' => 'JUAL-' . str_pad($index, 3, '0', STR_PAD_LEFT),
                'id_produk' => $faker->randomElement($produkIds), // Ensure it matches an existing product
                'id_pemesanan' => $faker->randomElement($pemesananIds), // Ensure it matches an existing order
                'jumlah' => $faker->numberBetween(1, 10),
                'harga_jual' => $faker->randomFloat(2, 10000, 500000),
                'diskon' => $faker->randomFloat(2, 0, 50000),
                'tanggal_penjualan' => $faker->date(),
            ]);
        }
    }
}
