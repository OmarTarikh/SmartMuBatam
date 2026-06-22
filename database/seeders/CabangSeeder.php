<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cabang;

class CabangSeeder extends Seeder
{
    public function run(): void
    {
        $data = [

            ['nama_cabang'=>'Batam Kota','status'=>'AKTIF'],
            ['nama_cabang'=>'Sekupang','status'=>'AKTIF'],
            ['nama_cabang'=>'Batu Aji','status'=>'AKTIF'],
            ['nama_cabang'=>'Nongsa','status'=>'AKTIF'],
            ['nama_cabang'=>'Sagulung','status'=>'AKTIF'],
            ['nama_cabang'=>'Batu Ampar','status'=>'AKTIF'],
            ['nama_cabang'=>'Lubuk Baja','status'=>'AKTIF'],
            ['nama_cabang'=>'Sei Beduk','status'=>'AKTIF'],
            ['nama_cabang'=>'Bengkong','status'=>'AKTIF'],

        ];

        foreach ($data as $item) {
            Cabang::create($item);
        }
    }
}