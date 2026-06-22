<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsetKeuangan extends Model
{
    protected $table = 'aset_keuangan';

    public $timestamps = false;

    protected $fillable = [
        'jenis',
        'jumlah',
        'keterangan',
        'lokasi',
        'masjid_id',
        'tanggal'
    ];

    public function masjid()
    {
        return $this->belongsTo(Masjid::class);
    }
}