<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Masjid extends Model
{
    protected $table = 'masjid';

    public $timestamps = false;

    protected $fillable = [
        'nama_masjid',
        'ranting_id',
        'alamat',
        'status_legalitas'
    ];

    public function ranting()
    {
        return $this->belongsTo(Ranting::class);
    }

    public function asetKeuangan()
    {
        return $this->hasMany(AsetKeuangan::class);
    }
}