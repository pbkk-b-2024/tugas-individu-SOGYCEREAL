<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StokTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $produkIds = DB::table('produk')->pluck('id_produk')->toArray();

        for ($i = 1; $i <= 30; $i++) {
            DB::table('stok')->insert([
                'id_stok' => 'STK-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'id_produk' => $faker->randomElement($produkIds),
                'jumlah' => $faker->numberBetween(1, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
