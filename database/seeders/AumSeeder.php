<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aum;

class AumSeeder extends Seeder
{
    public function run(): void
    {
        $data = [

            /*
            |--------------------------------------------------------------------------
            | SEKOLAH
            |--------------------------------------------------------------------------
            */

            [
                'id' => 1,
                'nama_aum' => 'SD Muhammadiyah Batam',
                'jenis' => 'sekolah',
                'cabang_id' => 1,
                'ranting_id' => 1,
                'alamat' => 'Belian, Batam Kota',
                'tahun' => 2018,
                'status_perizinan' => 'aktif',
                'bulan' => 'Januari'
            ],

            [
                'id' => 2,
                'nama_aum' => 'SMP Muhammadiyah Batam',
                'jenis' => 'sekolah',
                'cabang_id' => 2,
                'ranting_id' => 3,
                'alamat' => 'Tiban Baru',
                'tahun' => 2019,
                'status_perizinan' => 'aktif',
                'bulan' => 'Januari'
            ],

            [
                'id' => 3,
                'nama_aum' => 'SMK Muhammadiyah Batam',
                'jenis' => 'sekolah',
                'cabang_id' => 3,
                'ranting_id' => 5,
                'alamat' => 'Buliang',
                'tahun' => 2020,
                'status_perizinan' => 'aktif',
                'bulan' => 'Januari'
            ],

            /*
            |--------------------------------------------------------------------------
            | KLINIK
            |--------------------------------------------------------------------------
            */

            [
                'id' => 4,
                'nama_aum' => 'Klinik Muhammadiyah Batam Kota',
                'jenis' => 'klinik',
                'cabang_id' => 1,
                'ranting_id' => 2,
                'alamat' => 'Baloi Permai',
                'tahun' => null,
                'status_perizinan' => 'aktif',
                'bulan' => 'Januari'
            ],

            [
                'id' => 5,
                'nama_aum' => 'Klinik Muhammadiyah Sekupang',
                'jenis' => 'klinik',
                'cabang_id' => 2,
                'ranting_id' => 4,
                'alamat' => 'Tanjung Pinggir',
                'tahun' => null,
                'status_perizinan' => 'aktif',
                'bulan' => 'Januari'
            ],

            [
                'id' => 6,
                'nama_aum' => 'Klinik Muhammadiyah Batam Kota',
                'jenis' => 'klinik',
                'cabang_id' => 1,
                'ranting_id' => 1,
                'alamat' => 'Batam Kota',
                'tahun' => 2018,
                'status_perizinan' => 'aktif',
                'bulan' => 'Januari'
            ],

            [
                'id' => 7,
                'nama_aum' => 'Klinik Muhammadiyah Bengkong',
                'jenis' => 'klinik',
                'cabang_id' => 1,
                'ranting_id' => 2,
                'alamat' => 'Bengkong',
                'tahun' => 2019,
                'status_perizinan' => 'aktif',
                'bulan' => 'Februari'
            ],

            [
                'id' => 8,
                'nama_aum' => 'Klinik Muhammadiyah Batu Aji',
                'jenis' => 'klinik',
                'cabang_id' => 2,
                'ranting_id' => 3,
                'alamat' => 'Batu Aji',
                'tahun' => 2020,
                'status_perizinan' => 'proses izin',
                'bulan' => 'Maret'
            ],

                        [
                'id' => 9,
                'nama_aum' => 'Klinik Muhammadiyah Sekupang',
                'jenis' => 'klinik',
                'cabang_id' => 2,
                'ranting_id' => 4,
                'alamat' => 'Sekupang',
                'tahun' => 2017,
                'status_perizinan' => 'aktif',
                'bulan' => 'April'
            ],

            [
                'id' => 10,
                'nama_aum' => 'Klinik Muhammadiyah Lubuk Baja',
                'jenis' => 'klinik',
                'cabang_id' => 3,
                'ranting_id' => 5,
                'alamat' => 'Lubuk Baja',
                'tahun' => 2021,
                'status_perizinan' => 'tidak aktif',
                'bulan' => 'Mei'
            ],

            [
                'id' => 11,
                'nama_aum' => 'Klinik Muhammadiyah Nongsa',
                'jenis' => 'klinik',
                'cabang_id' => 3,
                'ranting_id' => 6,
                'alamat' => 'Nongsa',
                'tahun' => 2022,
                'status_perizinan' => 'proses izin',
                'bulan' => 'Juni'
            ],

            [
                'id' => 12,
                'nama_aum' => 'Klinik Muhammadiyah Sagulung',
                'jenis' => 'klinik',
                'cabang_id' => 4,
                'ranting_id' => 7,
                'alamat' => 'Sagulung',
                'tahun' => 2016,
                'status_perizinan' => 'aktif',
                'bulan' => 'Juli'
            ],

            [
                'id' => 13,
                'nama_aum' => 'Klinik Muhammadiyah Sei Beduk',
                'jenis' => 'klinik',
                'cabang_id' => 4,
                'ranting_id' => 8,
                'alamat' => 'Sei Beduk',
                'tahun' => 2023,
                'status_perizinan' => 'aktif',
                'bulan' => 'Agustus'
            ],

            [
                'id' => 14,
                'nama_aum' => 'Klinik Muhammadiyah Belakang Padang',
                'jenis' => 'klinik',
                'cabang_id' => 5,
                'ranting_id' => 9,
                'alamat' => 'Belakang Padang',
                'tahun' => 2024,
                'status_perizinan' => 'proses izin',
                'bulan' => 'September'
            ],

            [
                'id' => 15,
                'nama_aum' => 'Klinik Muhammadiyah Galang',
                'jenis' => 'klinik',
                'cabang_id' => 5,
                'ranting_id' => 10,
                'alamat' => 'Galang',
                'tahun' => 2019,
                'status_perizinan' => 'tidak aktif',
                'bulan' => 'Oktober'
            ],

            /*
            |--------------------------------------------------------------------------
            | LAINNYA
            |--------------------------------------------------------------------------
            */

            [
                'id' => 16,
                'nama_aum' => 'Panti Asuhan Muhammadiyah Batam',
                'jenis' => 'lainnya',
                'cabang_id' => 8,
                'ranting_id' => 16,
                'alamat' => 'Duriangkang',
                'tahun' => 2022,
                'status_perizinan' => 'aktif',
                'bulan' => 'Januari'
            ],

            [
                'id' => 17,
                'nama_aum' => 'Panti Asuhan Aisyiyah Batam',
                'jenis' => 'lainnya',
                'cabang_id' => 5,
                'ranting_id' => 10,
                'alamat' => 'Sungai Langkai',
                'tahun' => 2021,
                'status_perizinan' => 'aktif',
                'bulan' => 'Januari'
            ],

                    ];

        foreach ($data as $item) {

            Aum::create($item);

        }
    }
}