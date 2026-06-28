<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AumSekolah;

class AumSekolahSeeder extends Seeder
{
    public function run(): void
    {
        $data = [

            [
                'aum_id' => 1,
                'jumlah_siswa' => 420,
                'jumlah_guru' => 32,
                'akreditasi' => 'A'
            ],

            [
                'aum_id' => 2,
                'jumlah_siswa' => 380,
                'jumlah_guru' => 28,
                'akreditasi' => 'A'
            ],

            [
                'aum_id' => 3,
                'jumlah_siswa' => 510,
                'jumlah_guru' => 40,
                'akreditasi' => 'A'
            ],

        ];

        foreach ($data as $item) {
            AumSekolah::create($item);
        }
    }
}