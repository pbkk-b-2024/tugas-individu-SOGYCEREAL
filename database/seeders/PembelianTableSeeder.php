<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PembelianTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $supplierIds = DB::table('supplier')->pluck('id_supplier')->toArray();

        for ($i = 1; $i <= 20; $i++) {
            DB::table('pembelian')->insert([
                'id_pembelian' => 'BUY-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'id_supplier' => $faker->randomElement($supplierIds),
                'tanggal_pembelian' => $faker->date,
                'total_harga' => $faker->randomFloat(2, 100, 1000),
                'status' => $faker->word,
            ]);
        }
    }
}
