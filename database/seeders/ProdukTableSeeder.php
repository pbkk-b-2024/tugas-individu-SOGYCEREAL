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
        $kategoriIds = DB::table('kategori_produk')->pluck('id_kategori')->toArray();
        $supplierIds = DB::table('supplier')->pluck('id_supplier')->toArray();

        for ($i = 1; $i <= 30; $i++) {
            DB::table('produk')->insert([
                'id_produk' => 'PROD-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'nama_produk' => $faker->word,
                'deskripsi' => $faker->sentence,
                'id_kategori' => $faker->randomElement($kategoriIds),
                'harga_jual' => $faker->randomFloat(2, 10, 100),
                'harga_beli' => $faker->randomFloat(2, 5, 50),
                'jumlah' => $faker->numberBetween(1, 100),
                'id_supplier' => $faker->randomElement($supplierIds),
            ]);
        }
    }
}

