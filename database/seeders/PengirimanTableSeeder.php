<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PengirimanTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $pemesananIds = DB::table('pemesanan')->pluck('id_pemesanan')->toArray();
        $penjualanIds = DB::table('penjualan')->pluck('id_penjualan')->toArray();

        for ($i = 1; $i <= 20; $i++) {
            DB::table('pengiriman')->insert([
                'id_pengiriman' => 'SND-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'id_pemesanan' => $faker->randomElement($pemesananIds),
                'id_penjualan' => $faker->randomElement($penjualanIds),
                'kurir' => $faker->sentence,
                'status_pengiriman' => $faker->sentence,
                'tanggal_pengiriman' => $faker->date,
                'alamat_pengiriman' => $faker->address,
            ]);
        }
    }
}
