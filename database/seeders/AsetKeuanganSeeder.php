<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AsetKeuangan;

class AsetKeuanganSeeder extends Seeder
{
    public function run(): void
    {
        $data = [

            /*
            |--------------------------------------------------------------------------
            | KAS
            |--------------------------------------------------------------------------
            */

            [
                'id' => 1,
                'jenis' => 'kas',
                'cabang_id' => 1,
                'masjid_id' => null,
                'lokasi' => 'Kantor Cabang Batam Kota',
                'tanggal' => '2026-01-10 08:00:00'
            ],

            [
                'id' => 2,
                'jenis' => 'kas',
                'cabang_id' => 2,
                'masjid_id' => null,
                'lokasi' => 'Kantor Cabang Batu Aji',
                'tanggal' => '2026-01-15 09:00:00'
            ],

            [
                'id' => 3,
                'jenis' => 'kas',
                'cabang_id' => 3,
                'masjid_id' => null,
                'lokasi' => 'Kantor Cabang Bengkong',
                'tanggal' => '2026-02-01 10:00:00'
            ],

            [
                'id' => 4,
                'jenis' => 'kas',
                'cabang_id' => 4,
                'masjid_id' => null,
                'lokasi' => 'Kantor Cabang Sekupang',
                'tanggal' => '2026-02-10 08:30:00'
            ],

            /*
            |--------------------------------------------------------------------------
            | WAKAF
            |--------------------------------------------------------------------------
            */

            [
                'id' => 5,
                'jenis' => 'wakaf',
                'cabang_id' => 1,
                'masjid_id' => null,
                'lokasi' => 'Batam Kota',
                'tanggal' => '2026-03-01 09:30:00'
            ],

            [
                'id' => 6,
                'jenis' => 'wakaf',
                'cabang_id' => 2,
                'masjid_id' => null,
                'lokasi' => 'Batu Aji',
                'tanggal' => '2026-03-12 10:15:00'
            ],

            [
                'id' => 7,
                'jenis' => 'wakaf',
                'cabang_id' => 3,
                'masjid_id' => null,
                'lokasi' => 'Lubuk Baja',
                'tanggal' => '2026-03-20 13:00:00'
            ],

            [
                'id' => 8,
                'jenis' => 'wakaf',
                'cabang_id' => 4,
                'masjid_id' => null,
                'lokasi' => 'Sekupang',
                'tanggal' => '2026-03-28 11:45:00'
            ],

            /*
            |--------------------------------------------------------------------------
            | INFAQ
            |--------------------------------------------------------------------------
            */

            [
                'id' => 9,
                'jenis' => 'infaq',
                'cabang_id' => 1,
                'masjid_id' => 1,
                'lokasi' => 'Masjid Muhammadiyah Batam Kota',
                'tanggal' => '2026-04-05 12:00:00'
            ],

            [
                'id' => 10,
                'jenis' => 'infaq',
                'cabang_id' => 2,
                'masjid_id' => 3,
                'lokasi' => 'Masjid Muhammadiyah Batu Aji',
                'tanggal' => '2026-04-12 12:30:00'
            ],

            [
                'id' => 11,
                'jenis' => 'infaq',
                'cabang_id' => 3,
                'masjid_id' => 5,
                'lokasi' => 'Masjid Muhammadiyah Bengkong',
                'tanggal' => '2026-04-20 13:00:00'
            ],

            [
                'id' => 12,
                'jenis' => 'infaq',
                'cabang_id' => 4,
                'masjid_id' => 7,
                'lokasi' => 'Masjid Muhammadiyah Sekupang',
                'tanggal' => '2026-04-28 13:30:00'
            ],

            /*
            |--------------------------------------------------------------------------
            | SEDEKAH
            |--------------------------------------------------------------------------
            */

            [
                'id' => 13,
                'jenis' => 'sedekah',
                'cabang_id' => 1,
                'masjid_id' => 2,
                'lokasi' => 'Masjid Muhammadiyah Batam Kota',
                'tanggal' => '2026-05-02 08:00:00'
            ],

            [
                'id' => 14,
                'jenis' => 'sedekah',
                'cabang_id' => 2,
                'masjid_id' => 4,
                'lokasi' => 'Masjid Muhammadiyah Batu Aji',
                'tanggal' => '2026-05-10 09:00:00'
            ],

            [
                'id' => 15,
                'jenis' => 'sedekah',
                'cabang_id' => 3,
                'masjid_id' => 6,
                'lokasi' => 'Masjid Muhammadiyah Lubuk Baja',
                'tanggal' => '2026-05-18 10:00:00'
            ],

            [
                'id' => 16,
                'jenis' => 'sedekah',
                'cabang_id' => 4,
                'masjid_id' => 8,
                'lokasi' => 'Masjid Muhammadiyah Sekupang',
                'tanggal' => '2026-05-25 11:00:00'
            ],

        ];

        foreach ($data as $item) {
            AsetKeuangan::create($item);
        }
    }
}