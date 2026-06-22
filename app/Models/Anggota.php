<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';

    protected $primaryKey = 'nik';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'nik',
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'alamat',
        'cabang_id',
        'ranting_id',
        'pekerjaan',
        'pendidikan',
        'status_keanggotaan'
    ];

    public function cabang()
    {
        return $this->belongsTo(Cabang::class);
    }

    public function ranting()
    {
        return $this->belongsTo(Ranting::class);
    }
}