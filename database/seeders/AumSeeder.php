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
                'nama_aum' => 'SD Muhammadiyah Batam',
                'jenis' => 'sekolah',
                'cabang_id' => 1,
                'ranting_id' => 1,
                'alamat' => 'Belian, Batam Kota',
                'jumlah_siswa' => 420,
                'jumlah_guru' => 32,
                'akreditasi' => 'A',
                'tahun' => 2018,
                'jumlah_pasien' => null,
                'jumlah_dokter' => null,
                'kapasitas' => null,
                'status_perizinan' => 'aktif',
                'bulan' => 'Januari'
            ],

            [
                'nama_aum' => 'SMP Muhammadiyah Batam',
                'jenis' => 'sekolah',
                'cabang_id' => 2,
                'ranting_id' => 3,
                'alamat' => 'Tiban Baru',
                'jumlah_siswa' => 380,
                'jumlah_guru' => 28,
                'akreditasi' => 'A',
                'tahun' => 2019,
                'jumlah_pasien' => null,
                'jumlah_dokter' => null,
                'kapasitas' => null,
                'status_perizinan' => 'aktif',
                'bulan' => 'Januari'
            ],

            [
                'nama_aum' => 'SMK Muhammadiyah Batam',
                'jenis' => 'sekolah',
                'cabang_id' => 3,
                'ranting_id' => 5,
                'alamat' => 'Buliang',
                'jumlah_siswa' => 510,
                'jumlah_guru' => 40,
                'akreditasi' => 'A',
                'tahun' => 2020,
                'jumlah_pasien' => null,
                'jumlah_dokter' => null,
                'kapasitas' => null,
                'status_perizinan' => 'aktif',
                'bulan' => 'Januari'
            ],

            /*
            |--------------------------------------------------------------------------
            | KLINIK
            |--------------------------------------------------------------------------
            */

            [
                'nama_aum' => 'Klinik Muhammadiyah Batam Kota',
                'jenis' => 'klinik',
                'cabang_id' => 1,
                'ranting_id' => 2,
                'alamat' => 'Baloi Permai',
                'jumlah_siswa' => null,
                'jumlah_guru' => null,
                'akreditasi' => null,
                'tahun' => null,
                'jumlah_pasien' => 1800,
                'jumlah_dokter' => 7,
                'kapasitas' => 50,
                'status_perizinan' => 'aktif',
                'bulan' => 'Januari'
            ],

            [
                'nama_aum' => 'Klinik Muhammadiyah Sekupang',
                'jenis' => 'klinik',
                'cabang_id' => 2,
                'ranting_id' => 4,
                'alamat' => 'Tanjung Pinggir',
                'jumlah_siswa' => null,
                'jumlah_guru' => null,
                'akreditasi' => null,
                'tahun' => null,
                'jumlah_pasien' => 1300,
                'jumlah_dokter' => 5,
                'kapasitas' => 35,
                'status_perizinan' => 'aktif',
                'bulan' => 'Januari'
            ],

            /*
            |--------------------------------------------------------------------------
            | LAINNYA
            |--------------------------------------------------------------------------
            */

            [
                'nama_aum' => 'Panti Asuhan Muhammadiyah Batam',
                'jenis' => 'lainnya',
                'cabang_id' => 8,
                'ranting_id' => 16,
                'alamat' => 'Duriangkang',
                'jumlah_siswa' => null,
                'jumlah_guru' => null,
                'akreditasi' => null,
                'tahun' => 2022,
                'jumlah_pasien' => null,
                'jumlah_dokter' => null,
                'kapasitas' => 120,
                'status_perizinan' => 'aktif',
                'bulan' => 'Januari'
            ],

            [
                'nama_aum' => 'Panti Asuhan Aisyiyah Batam',
                'jenis' => 'lainnya',
                'cabang_id' => 5,
                'ranting_id' => 10,
                'alamat' => 'Sungai Langkai',
                'jumlah_siswa' => null,
                'jumlah_guru' => null,
                'akreditasi' => null,
                'tahun' => 2021,
                'jumlah_pasien' => null,
                'jumlah_dokter' => null,
                'kapasitas' => 80,
                'status_perizinan' => 'aktif',
                'bulan' => 'Januari'
            ],

        ];

        foreach ($data as $item) {
            Aum::create($item);
        }
    }
}