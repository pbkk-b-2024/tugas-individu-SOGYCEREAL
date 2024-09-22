<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SupplierTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 30; $i++) {
            DB::table('supplier')->insert([
                'id_supplier' => 'SUP-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'nama_supplier' => $faker->company,
                'alamat' => $faker->address,
                'telepon' => $faker->phoneNumber,
                'email' => $faker->email,
            ]);
        }
    }
}
