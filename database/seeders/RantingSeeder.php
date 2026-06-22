<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ranting;

class RantingSeeder extends Seeder
{
    public function run(): void
    {
        $data = [

            ['cabang_id'=>1,'nama_ranting'=>'Belian','status'=>'AKTIF'],
            ['cabang_id'=>1,'nama_ranting'=>'Baloi Permai','status'=>'AKTIF'],

            ['cabang_id'=>2,'nama_ranting'=>'Tiban Baru','status'=>'AKTIF'],
            ['cabang_id'=>2,'nama_ranting'=>'Tanjung Pinggir','status'=>'AKTIF'],

            ['cabang_id'=>3,'nama_ranting'=>'Buliang','status'=>'AKTIF'],
            ['cabang_id'=>3,'nama_ranting'=>'Kibing','status'=>'AKTIF'],

            ['cabang_id'=>4,'nama_ranting'=>'Sambau','status'=>'AKTIF'],
            ['cabang_id'=>4,'nama_ranting'=>'Batu Besar','status'=>'AKTIF'],

            ['cabang_id'=>5,'nama_ranting'=>'Sei Lekop','status'=>'AKTIF'],
            ['cabang_id'=>5,'nama_ranting'=>'Sungai Langkai','status'=>'AKTIF'],

            ['cabang_id'=>6,'nama_ranting'=>'Sei Jodoh','status'=>'AKTIF'],
            ['cabang_id'=>6,'nama_ranting'=>'Kampung Seraya','status'=>'AKTIF'],

            ['cabang_id'=>7,'nama_ranting'=>'Lubuk Baja Kota','status'=>'AKTIF'],
            ['cabang_id'=>7,'nama_ranting'=>'Batu Selicin','status'=>'AKTIF'],

            ['cabang_id'=>8,'nama_ranting'=>'Mangsang','status'=>'AKTIF'],
            ['cabang_id'=>8,'nama_ranting'=>'Duriangkang','status'=>'AKTIF'],

        ];

        foreach ($data as $item) {
            Ranting::create($item);
        }
    }
}