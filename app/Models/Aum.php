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
        'tahun',
        'status_perizinan',
        'bulan'
    ];

    /*
    |--------------------------------------------------------------------------
    | Relasi Master
    |--------------------------------------------------------------------------
    */

    public function cabang()
    {
        return $this->belongsTo(Cabang::class);
    }

    public function ranting()
    {
        return $this->belongsTo(Ranting::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Relasi Detail
    |--------------------------------------------------------------------------
    */

    public function sekolah()
    {
        return $this->hasOne(AumSekolah::class, 'aum_id');
    }

    public function klinik()
    {
        return $this->hasOne(AumKlinik::class, 'aum_id');
    }
}