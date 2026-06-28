<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsetWakaf extends Model
{
    protected $table = 'aset_wakaf';

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