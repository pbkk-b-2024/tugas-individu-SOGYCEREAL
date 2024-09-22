<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TransaksiStokTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $produkIds = DB::table('produk')->pluck('id_produk')->toArray();
        $stokIds = DB::table('stok')->pluck('id_stok')->toArray();

        for ($i = 1; $i <= 30; $i++) {
            DB::table('transaksi_stok')->insert([
                'id_transaksi' => 'TRX-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'id_produk' => $faker->randomElement($produkIds),
                'id_stok' => $faker->randomElement($stokIds),
                'tanggal_transaksi' => $faker->date,
                'jumlah' => $faker->numberBetween(1, 100),
                'tipe_transaksi' => $faker->word,
                'keterangan' => $faker->sentence,
            ]);
        }
    }
}
