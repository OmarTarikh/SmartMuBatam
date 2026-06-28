<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AsetWakaf;

class AsetWakafSeeder extends Seeder
{
    public function run(): void
    {
        $data = [

            [
                'aset_keuangan_id' => 5,
                'jumlah' => 500000000,
                'keterangan' => 'Wakaf pembangunan Gedung Dakwah Cabang Batam Kota'
            ],

            [
                'aset_keuangan_id' => 6,
                'jumlah' => 350000000,
                'keterangan' => 'Wakaf pembelian tanah untuk perluasan masjid'
            ],

            [
                'aset_keuangan_id' => 7,
                'jumlah' => 275000000,
                'keterangan' => 'Wakaf pembangunan ruang pendidikan Al-Qur’an'
            ],

            [
                'aset_keuangan_id' => 8,
                'jumlah' => 425000000,
                'keterangan' => 'Wakaf renovasi bangunan dan fasilitas masjid'
            ],

        ];

        foreach ($data as $item) {

            AsetWakaf::create($item);

        }
    }
}