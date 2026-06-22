<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = 'kegiatan';

    public $timestamps = false;

    protected $fillable = [
        'nama_kegiatan',
        'jenis',
        'deskripsi',
        'target',
        'progres_persen',
        'tanggal_mulai',
        'tanggal_selesai',
        'lokasi'
    ];
}