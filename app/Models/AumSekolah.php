<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AumSekolah extends Model
{
    protected $table = 'aum_sekolah';

    public $timestamps = false;

    protected $fillable = [
        'aum_id',
        'jumlah_siswa',
        'jumlah_guru',
        'akreditasi'
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