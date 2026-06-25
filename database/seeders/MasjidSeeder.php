<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasjidSeeder extends Seeder
{
    public function run(): void
    {
        $rantingIds = DB::table('ranting')->pluck('id')->toArray();

        if (empty($rantingIds)) {
            return;
        }

        $namaMasjid = [

            'Masjid At-Taqwa Muhammadiyah',
            'Masjid Al-Ikhlas Muhammadiyah',
            'Masjid Al-Hidayah Muhammadiyah',
            'Masjid Al-Falah Muhammadiyah',
            'Masjid At-Taqwa Batam',
            'Masjid Al-Muhajirin',
            'Masjid Al-Amin',
            'Masjid Al-Muttaqin',
            'Masjid Baiturrahman',
            'Masjid Nurul Iman',
            'Masjid Al-Hikmah',
            'Masjid Al-Kautsar',
            'Masjid Al-Mujahidin',
            'Masjid Al-Ihsan',
            'Masjid Darussalam',
            'Masjid Al-Huda',
            'Masjid Al-Mukhlisin',
            'Masjid Al-Barokah',
            'Masjid Al-Anshar',
            'Masjid Nurul Huda'

        ];

        $alamat = [

            'Jl. Ahmad Yani',
            'Jl. Raja Haji',
            'Jl. Sudirman',
            'Jl. Hang Tuah',
            'Jl. Gajah Mada',
            'Jl. Tiban Indah',
            'Jl. Baloi Permai',
            'Jl. Batu Aji',
            'Jl. Sekupang',
            'Jl. Nongsa'

        ];

        foreach ($namaMasjid as $nama) {

            DB::table('masjid')->insert([

                'nama_masjid' => $nama,

                'ranting_id' => $rantingIds[array_rand($rantingIds)],

                'alamat' => $alamat[array_rand($alamat)],

                'status_legalitas' => collect([
                    'sertifikat',
                    'belum',
                    'proses'
                ])->random()

            ]);

        }
    }
}