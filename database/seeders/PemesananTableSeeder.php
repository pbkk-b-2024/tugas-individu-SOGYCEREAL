<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PemesananTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $userIds = DB::table('users')->pluck('id')->toArray(); // Assuming you have a 'users' table

        for ($i = 1; $i <= 20; $i++) {
            DB::table('pemesanan')->insert([
                'id_pemesanan' => 'PES-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'tanggal_pemesanan' => $faker->date,
                'total_harga' => $faker->randomFloat(2, 100, 1000),
                'status' => $faker->word,
            ]);
        }
    }
}
