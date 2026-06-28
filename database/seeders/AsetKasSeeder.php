<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AsetKas;

class AsetKasSeeder extends Seeder
{
    public function run(): void
    {
        $data = [

            [
                'aset_keuangan_id' => 1,
                'tipe' => 'masuk',
                'jumlah' => 25000000,
                'keterangan' => 'Saldo awal kas Cabang Batam Kota'
            ],

            [
                'aset_keuangan_id' => 2,
                'tipe' => 'keluar',
                'jumlah' => 5500000,
                'keterangan' => 'Pembayaran operasional kantor cabang'
            ],

            [
                'aset_keuangan_id' => 3,
                'tipe' => 'masuk',
                'jumlah' => 18000000,
                'keterangan' => 'Penerimaan iuran anggota'
            ],

            [
                'aset_keuangan_id' => 4,
                'tipe' => 'keluar',
                'jumlah' => 3200000,
                'keterangan' => 'Pembelian perlengkapan sekretariat'
            ],

        ];

        foreach ($data as $item) {

            AsetKas::create($item);

        }
    }
}