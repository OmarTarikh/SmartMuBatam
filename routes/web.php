<?php

use Illuminate\Support\Facades\Route;

Route::view('/login', 'auth.login');

Route::view('/register', 'auth.register');

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->name('dashboard');

Route::get('/organisasi/cabang', function () {
    return view('organisasi.cabang.index');
})->name('cabang.index');

Route::view(
    '/organisasi/cabang/tambah',
    'organisasi.cabang.tambah'
);

Route::get('/organisasi/ranting', function () {
    return view('organisasi.ranting.index');
})->name('ranting.index');

Route::view(
    '/organisasi/ranting/tambah',
    'organisasi.ranting.tambah'
);

Route::get('/organisasi/anggota', function () {
    return view('organisasi.anggota.index');
})->name('anggota.index');

Route::view(
    '/organisasi/anggota/tambah',
    'organisasi.anggota.tambah'
);

Route::get('/unit-lembaga/aum/sekolah', function () {
    return view('unit-lembaga.aum.sekolah.index');
});

Route::get('/unit-lembaga/aum/sekolah/tambah', function () {
    return view('unit-lembaga.aum.sekolah.tambah');
});

Route::get('/unit-lembaga/aum/klinik', function () {
    return view('unit-lembaga.aum.klinik.index');
});

Route::get('/unit-lembaga/aum/klinik/tambah', function () {
    return view('unit-lembaga.aum.klinik.tambah');
});

Route::get('/unit-lembaga/masjid', function () {
    return view('unit-lembaga.masjid.index');
});

Route::get('/unit-lembaga/masjid/tambah', function () {
    return view('unit-lembaga.masjid.tambah');
});

Route::get('/keuangan', function () {
    return view('keuangan.index');
});

Route::get('/keuangan/tambah', function () {
    return view('keuangan.tambah');
});

Route::get('/kegiatan', function () {
    return view('kegiatan.index');
});

Route::get('/kegiatan/tambah', function () {
    return view('kegiatan.tambah');
});


