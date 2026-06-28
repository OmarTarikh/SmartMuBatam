<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AsetSedekah;

class AsetSedekahSeeder extends Seeder
{
    public function run(): void
    {
        $data = [

            [
                'aset_keuangan_id' => 13,
                'jumlah' => 1500000,
                'keterangan' => 'Sedekah jamaah untuk kegiatan sosial'
            ],

            [
                'aset_keuangan_id' => 14,
                'jumlah' => 2750000,
                'keterangan' => 'Sedekah pembangunan fasilitas wudhu'
            ],

            [
                'aset_keuangan_id' => 15,
                'jumlah' => 1800000,
                'keterangan' => 'Sedekah santunan anak yatim'
            ],

            [
                'aset_keuangan_id' => 16,
                'jumlah' => 3200000,
                'keterangan' => 'Sedekah renovasi ruang pengajian'
            ],

        ];

        foreach ($data as $item) {

            AsetSedekah::create($item);

        }
    }
}