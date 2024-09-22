<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class KategoriProdukTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 10; $i++) {
            DB::table('kategori_produk')->insert([
                'id_kategori' => 'KAT-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'nama_kategori' => $faker->word,
                'deskripsi' => $faker->sentence,
            ]);
        }
    }
}
