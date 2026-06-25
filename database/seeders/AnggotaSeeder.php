<?php

namespace Database\Seeders;

use App\Models\Anggota;
use App\Models\Ranting;
use Illuminate\Database\Seeder;

class AnggotaSeeder extends Seeder
{
    public function run(): void
    {
        $rantings = Ranting::with('cabang')->get();

        foreach ($rantings as $ranting) {

            $jumlahAnggota = rand(8, 15);

            for ($i = 1; $i <= $jumlahAnggota; $i++) {

                Anggota::create([

                    'nik' => fake()->unique()
                        ->numerify('2171############'),

                    'nama' => fake()->name(),

                    'jenis_kelamin' => fake()
                        ->randomElement([
                            'L',
                            'P'
                        ]),

                    'tanggal_lahir' => fake()
                        ->dateTimeBetween(
                            '-60 years',
                            '-17 years'
                        )
                        ->format('Y-m-d'),

                    'alamat' => fake()->address(),

                    'cabang_id' => $ranting->cabang_id,

                    'ranting_id' => $ranting->id,

                    'pekerjaan' => fake()
                        ->randomElement([
                            'Pelajar',
                            'Mahasiswa',
                            'Guru',
                            'Karyawan Swasta',
                            'Wiraswasta',
                            'PNS',
                            'Petani',
                            'Nelayan'
                        ]),

                    'pendidikan' => fake()
                        ->randomElement([
                            'SD',
                            'SMP',
                            'SMA',
                            'D3',
                            'S1',
                            'S2'
                        ]),

                    'status' => fake()
                        ->randomElement([
                            'Aktif',
                            'Aktif',
                            'Aktif',
                            'Aktif',
                            'Aktif',
                            'Aktif',
                            'Kurang Aktif',
                            'Kurang Aktif',
                            'Vakum'
                        ])

                ]);
            }
        }
    }
}