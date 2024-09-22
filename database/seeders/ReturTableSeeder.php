<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ReturTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // Retrieve existing IDs from the correct tables
        $transaksiIds = DB::table('transaksi_stok')->pluck('id_transaksi')->toArray();
        $produkIds = DB::table('produk')->pluck('id_produk')->toArray();

        // Check if there are any transaksi_stok and produk records
        if (empty($transaksiIds)) {
            $this->command->info('No transaksi_stok records found. Please seed transaksi_stok first.');
            return;
        }

        if (empty($produkIds)) {
            $this->command->info('No produk records found. Please seed produk first.');
            return;
        }

        for ($i = 1; $i <= 20; $i++) {
            DB::table('retur')->insert([
                'id_retur' => 'RET-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'id_transaksi' => $faker->randomElement($transaksiIds),
                'id_produk' => $faker->randomElement($produkIds),
                'tanggal_retur' => $faker->date(),
                'alasan_retur' => $faker->sentence(),
                'jumlah' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
