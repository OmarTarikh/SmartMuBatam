<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AumKlinik extends Model
{
    protected $table = 'aum_klinik';

    public $timestamps = false;

    protected $fillable = [
        'aum_id',
        'jumlah_pasien',
        'jumlah_dokter',
        'kapasitas'

    ];

    /*
    |--------------------------------------------------------------------------
    | Relasi
    |--------------------------------------------------------------------------
    */

    public function aum()
    {
        return $this->belongsTo(Aum::class, 'aum_id');
    }
}