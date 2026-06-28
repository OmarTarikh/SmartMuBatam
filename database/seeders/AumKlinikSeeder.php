<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AumKlinik;

class AumKlinikSeeder extends Seeder
{
    public function run(): void
    {
        $data = [

            [
                'aum_id' => 4,
                'jumlah_pasien' => 1800,
                'jumlah_dokter' => 7,
                'kapasitas' => 50
            ],

            [
                'aum_id' => 5,
                'jumlah_pasien' => 1300,
                'jumlah_dokter' => 5,
                'kapasitas' => 35
            ],

            [
                'aum_id' => 6,
                'jumlah_pasien' => 450,
                'jumlah_dokter' => 10,
                'kapasitas' => 80
            ],

            [
                'aum_id' => 7,
                'jumlah_pasien' => 320,
                'jumlah_dokter' => 8,
                'kapasitas' => 60
            ],

            [
                'aum_id' => 8,
                'jumlah_pasien' => 210,
                'jumlah_dokter' => 6,
                'kapasitas' => 45
            ],

            [
                'aum_id' => 9,
                'jumlah_pasien' => 520,
                'jumlah_dokter' => 12,
                'kapasitas' => 100
            ],

            [
                'aum_id' => 10,
                'jumlah_pasien' => 180,
                'jumlah_dokter' => 5,
                'kapasitas' => 35
            ],

            [
                'aum_id' => 11,
                'jumlah_pasien' => 150,
                'jumlah_dokter' => 4,
                'kapasitas' => 30
            ],

            [
                'aum_id' => 12,
                'jumlah_pasien' => 610,
                'jumlah_dokter' => 14,
                'kapasitas' => 120
            ],

            [
                'aum_id' => 13,
                'jumlah_pasien' => 190,
                'jumlah_dokter' => 5,
                'kapasitas' => 40
            ],

            [
                'aum_id' => 14,
                'jumlah_pasien' => 120,
                'jumlah_dokter' => 3,
                'kapasitas' => 20
            ],

            [
                'aum_id' => 15,
                'jumlah_pasien' => 140,
                'jumlah_dokter' => 4,
                'kapasitas' => 25
            ],

        ];

        foreach ($data as $item) {
            AumKlinik::create($item);
        }
    }
}