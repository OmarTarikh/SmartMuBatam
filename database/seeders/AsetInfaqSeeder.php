<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AsetInfaq;

class AsetInfaqSeeder extends Seeder
{
    public function run(): void
    {
        $data = [

            [
                'aset_keuangan_id' => 9,
                'jumlah' => 4500000,
                'keterangan' => 'Infaq Jumat Masjid Muhammadiyah Batam Kota'
            ],

            [
                'aset_keuangan_id' => 10,
                'jumlah' => 3250000,
                'keterangan' => 'Infaq Jumat Masjid Muhammadiyah Batu Aji'
            ],

            [
                'aset_keuangan_id' => 11,
                'jumlah' => 5100000,
                'keterangan' => 'Infaq kegiatan kajian rutin'
            ],

            [
                'aset_keuangan_id' => 12,
                'jumlah' => 2800000,
                'keterangan' => 'Infaq jamaah shalat Idul Adha'
            ],

        ];

        foreach ($data as $item) {

            AsetInfaq::create($item);

        }
    }
}