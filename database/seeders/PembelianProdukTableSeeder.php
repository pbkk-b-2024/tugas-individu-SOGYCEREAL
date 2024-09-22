<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProdukTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // Create 30 dummy products
        foreach (range(1, 30) as $index) {
            DB::table('produk')->insert([
                'id_produk' => 'PROD-' . str_pad((string) $index, 3, '0', STR_PAD_LEFT),
                'nama_produk' => $faker->word,
                'deskripsi' => $faker->text,
                'id_kategori' => 'KAT-' . str_pad((string) random_int(1, 5), 3, '0', STR_PAD_LEFT), // assuming you have categories KAT-001 to KAT-005
                'harga_jual' => $faker->randomFloat(2, 100, 1000),
                'harga_beli' => $faker->randomFloat(2, 50, 500),
                'stok_tersedia' => $faker->numberBetween(1, 100),
                'nama_supplier' => $faker->company,
                'id_supplier' => 'SUP-' . str_pad((string) random_int(1, 30), 3, '0', STR_PAD_LEFT), // assuming you have suppliers SUP-001 to SUP-030
                'id_stok' => 'STK-' . str_pad((string) random_int(1, 30), 3, '0', STR_PAD_LEFT), // assuming you have stock IDs STK-001 to STK-030
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
