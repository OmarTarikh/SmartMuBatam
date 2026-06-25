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

            /*
            |--------------------------------------------------------------------------
            | KLINIK
            |--------------------------------------------------------------------------
            */

            [
                'nama_aum' => 'Klinik Muhammadiyah Batam Kota',
                'jenis' => 'klinik',
                'cabang_id' => 1,
                'ranting_id' => 1,
                'alamat' => 'Batam Kota',
                'jumlah_siswa' => null,
                'jumlah_guru' => null,
                'akreditasi' => null,
                'tahun' => 2018,
                'jumlah_pasien' => 450,
                'jumlah_dokter' => 10,
                'kapasitas' => 80,
                'status_perizinan' => 'aktif',
                'bulan' => 'Januari'
            ],

            [
                'nama_aum' => 'Klinik Muhammadiyah Bengkong',
                'jenis' => 'klinik',
                'cabang_id' => 1,
                'ranting_id' => 2,
                'alamat' => 'Bengkong',
                'jumlah_siswa' => null,
                'jumlah_guru' => null,
                'akreditasi' => null,
                'tahun' => 2019,
                'jumlah_pasien' => 320,
                'jumlah_dokter' => 8,
                'kapasitas' => 60,
                'status_perizinan' => 'aktif',
                'bulan' => 'Februari'
            ],

            [
                'nama_aum' => 'Klinik Muhammadiyah Batu Aji',
                'jenis' => 'klinik',
                'cabang_id' => 2,
                'ranting_id' => 3,
                'alamat' => 'Batu Aji',
                'jumlah_siswa' => null,
                'jumlah_guru' => null,
                'akreditasi' => null,
                'tahun' => 2020,
                'jumlah_pasien' => 210,
                'jumlah_dokter' => 6,
                'kapasitas' => 45,
                'status_perizinan' => 'proses izin',
                'bulan' => 'Maret'
            ],

            [
                'nama_aum' => 'Klinik Muhammadiyah Sekupang',
                'jenis' => 'klinik',
                'cabang_id' => 2,
                'ranting_id' => 4,
                'alamat' => 'Sekupang',
                'jumlah_siswa' => null,
                'jumlah_guru' => null,
                'akreditasi' => null,
                'tahun' => 2017,
                'jumlah_pasien' => 520,
                'jumlah_dokter' => 12,
                'kapasitas' => 100,
                'status_perizinan' => 'aktif',
                'bulan' => 'April'
            ],

            [
                'nama_aum' => 'Klinik Muhammadiyah Lubuk Baja',
                'jenis' => 'klinik',
                'cabang_id' => 3,
                'ranting_id' => 5,
                'alamat' => 'Lubuk Baja',
                'jumlah_siswa' => null,
                'jumlah_guru' => null,
                'akreditasi' => null,
                'tahun' => 2021,
                'jumlah_pasien' => 180,
                'jumlah_dokter' => 5,
                'kapasitas' => 35,
                'status_perizinan' => 'tidak aktif',
                'bulan' => 'Mei'
            ],

            [
                'nama_aum' => 'Klinik Muhammadiyah Nongsa',
                'jenis' => 'klinik',
                'cabang_id' => 3,
                'ranting_id' => 6,
                'alamat' => 'Nongsa',
                'jumlah_siswa' => null,
                'jumlah_guru' => null,
                'akreditasi' => null,
                'tahun' => 2022,
                'jumlah_pasien' => 150,
                'jumlah_dokter' => 4,
                'kapasitas' => 30,
                'status_perizinan' => 'proses izin',
                'bulan' => 'Juni'
            ],

            [
                'nama_aum' => 'Klinik Muhammadiyah Sagulung',
                'jenis' => 'klinik',
                'cabang_id' => 4,
                'ranting_id' => 7,
                'alamat' => 'Sagulung',
                'jumlah_siswa' => null,
                'jumlah_guru' => null,
                'akreditasi' => null,
                'tahun' => 2016,
                'jumlah_pasien' => 610,
                'jumlah_dokter' => 14,
                'kapasitas' => 120,
                'status_perizinan' => 'aktif',
                'bulan' => 'Juli'
            ],

            [
                'nama_aum' => 'Klinik Muhammadiyah Sei Beduk',
                'jenis' => 'klinik',
                'cabang_id' => 4,
                'ranting_id' => 8,
                'alamat' => 'Sei Beduk',
                'jumlah_siswa' => null,
                'jumlah_guru' => null,
                'akreditasi' => null,
                'tahun' => 2023,
                'jumlah_pasien' => 190,
                'jumlah_dokter' => 5,
                'kapasitas' => 40,
                'status_perizinan' => 'aktif',
                'bulan' => 'Agustus'
            ],

            [
                'nama_aum' => 'Klinik Muhammadiyah Belakang Padang',
                'jenis' => 'klinik',
                'cabang_id' => 5,
                'ranting_id' => 9,
                'alamat' => 'Belakang Padang',
                'jumlah_siswa' => null,
                'jumlah_guru' => null,
                'akreditasi' => null,
                'tahun' => 2024,
                'jumlah_pasien' => 120,
                'jumlah_dokter' => 3,
                'kapasitas' => 20,
                'status_perizinan' => 'proses izin',
                'bulan' => 'September'
            ],

            [
                'nama_aum' => 'Klinik Muhammadiyah Galang',
                'jenis' => 'klinik',
                'cabang_id' => 5,
                'ranting_id' => 10,
                'alamat' => 'Galang',
                'jumlah_siswa' => null,
                'jumlah_guru' => null,
                'akreditasi' => null,
                'tahun' => 2019,
                'jumlah_pasien' => 140,
                'jumlah_dokter' => 4,
                'kapasitas' => 25,
                'status_perizinan' => 'tidak aktif',
                'bulan' => 'Oktober'
            ],

        ];

        

        foreach ($data as $item) {
            Aum::create($item);
        }
    }
}

