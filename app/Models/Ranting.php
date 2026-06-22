<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ranting extends Model
{
    protected $table = 'ranting';

    public $timestamps = false;

    protected $fillable = [
        'cabang_id',
        'nama_ranting',
        'status'
    ];

    public function cabang()
    {
        return $this->belongsTo(Cabang::class);
    }

    public function anggota()
    {
        return $this->hasMany(Anggota::class);
    }

    public function masjid()
    {
        return $this->hasMany(Masjid::class);
    }

    public function aum()
    {
        return $this->hasMany(Aum::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}