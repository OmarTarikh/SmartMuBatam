<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsetKeuangan extends Model
{
    protected $table = 'aset_keuangan';

    public $timestamps = false;

    protected $fillable = [

        'jenis',
        'cabang_id',
        'masjid_id',
        'lokasi',
        'tanggal'

    ];

    /*
    |--------------------------------------------------------------------------
    | Relasi
    |--------------------------------------------------------------------------
    */

    public function cabang()
    {
        return $this->belongsTo(Cabang::class);
    }

    public function masjid()
    {
        return $this->belongsTo(Masjid::class);
    }

    public function kas()
    {
        return $this->hasOne(AsetKas::class, 'aset_keuangan_id');
    }

    public function wakaf()
    {
        return $this->hasOne(AsetWakaf::class, 'aset_keuangan_id');
    }

    public function infaq()
    {
        return $this->hasOne(AsetInfaq::class, 'aset_keuangan_id');
    }

    public function sedekah()
    {
        return $this->hasOne(AsetSedekah::class, 'aset_keuangan_id');
    }
}