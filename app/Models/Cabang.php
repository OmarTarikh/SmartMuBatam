<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    protected $table = 'cabang';

    public $timestamps = false;

    protected $fillable = [
        'nama_cabang',
        'status'
    ];

    public function rantings()
    {
        return $this->hasMany(Ranting::class);
    }
    public function anggota()
    {
        return $this->hasMany(Anggota::class);
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