<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    public function run(): void
     {
        $this->call([
            KategoriProdukTableSeeder::class,
            SupplierTableSeeder::class,
            ProdukTableSeeder::class,
            StokTableSeeder::class,
            PemesananTableSeeder::class,
            PembelianTableSeeder::class,
            PenjualanTableSeeder::class,
            TransaksiStokTableSeeder::class,
            ReturTableSeeder::class,
            PengirimanTableSeeder::class,
        ]);
        
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
