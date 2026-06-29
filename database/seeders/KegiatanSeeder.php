<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KegiatanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kegiatan')->insert([

            [
                'cabang_id'        => 1,
                'nama_kegiatan'   => 'Musyawarah Cabang Muhammadiyah',
                'jenis'           => 'agenda',
                'deskripsi'       => 'Musyawarah tahunan cabang Muhammadiyah Batam.',
                'target'          => 'Seluruh Pengurus Cabang',
                'progres_persen'  => 100,
                'tanggal_mulai'   => '2026-07-05',
                'tanggal_selesai' => '2026-07-05',
                'lokasi'          => 'Aula Muhammadiyah Batam'
            ],

            [
                'cabang_id'        => 2,
                'nama_kegiatan'   => 'Kajian Ahad Pagi',
                'jenis'           => 'agenda',
                'deskripsi'       => 'Kajian rutin Ahad pagi bersama masyarakat.',
                'target'          => '500 Jamaah',
                'progres_persen'  => 100,
                'tanggal_mulai'   => '2026-07-13',
                'tanggal_selesai' => '2026-07-13',
                'lokasi'          => 'Masjid Taqwa'
            ],

            [
                'cabang_id'        => 3,
                'nama_kegiatan'   => 'Rapat Program Kerja Pendidikan',
                'jenis'           => 'program_kerja',
                'deskripsi'       => 'Pembahasan program kerja bidang pendidikan.',
                'target'          => 'Program Kerja Bidang Pendidikan Tahun 2026',
                'progres_persen'  => 35,
                'tanggal_mulai'   => '2026-07-20',
                'tanggal_selesai' => '2026-08-10',
                'lokasi'          => 'Gedung Dakwah Muhammadiyah'
            ],

            [
                'cabang_id'        => 4,
                'nama_kegiatan'   => 'Renovasi Gedung Dakwah',
                'jenis'           => 'program_kerja',
                'deskripsi'       => 'Perbaikan dan renovasi gedung dakwah Muhammadiyah.',
                'target'          => 'Gedung Dakwah Siap Digunakan',
                'progres_persen'  => 70,
                'tanggal_mulai'   => '2026-06-15',
                'tanggal_selesai' => '2026-09-30',
                'lokasi'          => 'Batam Center'
            ],

            [
                'cabang_id'        => 5,
                'nama_kegiatan'   => 'Pelatihan Kader Muhammadiyah',
                'jenis'           => 'agenda',
                'deskripsi'       => 'Pelatihan kepemimpinan kader muda Muhammadiyah.',
                'target'          => '100 Peserta',
                'progres_persen'  => 90,
                'tanggal_mulai'   => '2026-08-02',
                'tanggal_selesai' => '2026-08-03',
                'lokasi'          => 'Universitas Muhammadiyah Batam'
            ],

            [
                'cabang_id'        => 1,
                'nama_kegiatan'   => 'Program Santunan Anak Yatim',
                'jenis'           => 'program_kerja',
                'deskripsi'       => 'Penyaluran bantuan kepada anak yatim di wilayah cabang.',
                'target'          => '200 Anak Yatim',
                'progres_persen'  => 45,
                'tanggal_mulai'   => '2026-07-10',
                'tanggal_selesai' => '2026-09-01',
                'lokasi'          => 'PCM Batam Kota'
            ],

            [
                'cabang_id'        => 2,
                'nama_kegiatan'   => 'Pengajian Bulanan',
                'jenis'           => 'agenda',
                'deskripsi'       => 'Pengajian rutin bulanan Muhammadiyah.',
                'target'          => 'Masyarakat Umum',
                'progres_persen'  => 100,
                'tanggal_mulai'   => '2026-08-15',
                'tanggal_selesai' => '2026-08-15',
                'lokasi'          => 'Masjid Al-Hikmah'
            ],

            [
                'cabang_id'        => 3,
                'nama_kegiatan'   => 'Digitalisasi Data AUM',
                'jenis'           => 'program_kerja',
                'deskripsi'       => 'Pembuatan sistem digital seluruh data AUM Muhammadiyah Kota Batam.',
                'target'          => '100% Data Terintegrasi',
                'progres_persen'  => 60,
                'tanggal_mulai'   => '2026-06-01',
                'tanggal_selesai' => '2026-12-31',
                'lokasi'          => 'PDM Kota Batam'
            ],

        ]);
    }
}