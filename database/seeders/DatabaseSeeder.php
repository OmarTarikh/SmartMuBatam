<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CabangSeeder::class,
            RantingSeeder::class,
            AnggotaSeeder::class,
            AumSeeder::class,
            AumSekolahSeeder::class,
            AumKlinikSeeder::class,
            MasjidSeeder::class,
            AsetKeuanganSeeder::class,
            AsetKasSeeder::class,
            AsetInfaqSeeder::class,
            AsetSedekahSeeder::class,
            AsetWakafSeeder::class,
            
        ]);
    }
}