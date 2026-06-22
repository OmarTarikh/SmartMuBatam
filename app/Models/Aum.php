<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aum extends Model
{
    protected $table = 'aum';

    public $timestamps = false;

    protected $fillable = [
        'nama_aum',
        'jenis',
        'cabang_id',
        'ranting_id',
        'alamat',
        'jumlah_siswa',
        'jumlah_guru',
        'akreditasi',
        'tahun',
        'jumlah_pasien',
        'jumlah_dokter',
        'kapasitas',
        'status_perizinan',
        'bulan'
    ];

    public function cabang()
    {
        return $this->belongsTo(Cabang::class);
    }

    public function ranting()
    {
        return $this->belongsTo(Ranting::class);
    }
}