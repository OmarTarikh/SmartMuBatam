<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsetInfaq extends Model
{
    protected $table = 'aset_infaq';

    public $timestamps = false;

    protected $fillable = [

        'aset_keuangan_id',
        'jumlah',
        'keterangan'

    ];

    /*
    |--------------------------------------------------------------------------
    | Relasi
    |--------------------------------------------------------------------------
    */

    public function asetKeuangan()
    {
        return $this->belongsTo(
            AsetKeuangan::class,
            'aset_keuangan_id'
        );
    }
}