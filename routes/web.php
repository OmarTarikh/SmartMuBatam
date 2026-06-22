<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CabangController;

/*
|--------------------------------------------------------------------------
| LANDING PAGE
|--------------------------------------------------------------------------
*/

Route::view('/', 'welcome')->name('welcome');

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'index'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| SEMUA HALAMAN YANG HARUS LOGIN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | SUPERADMIN
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:superadmin')->group(function () {

        Route::get('/dashboard', function () {
            return view('dashboard.dashboard');
        })->name('dashboard');

        Route::get('/kegiatan', function () {
            return view('kegiatan.index');
        });

        Route::get('/kegiatan/tambah', function () {
            return view('kegiatan.tambah');
        });

    });


    /*
    |--------------------------------------------------------------------------
    | CABANG + SUPERADMIN
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:superadmin,cabang')->group(function () {

        Route::get(
            '/organisasi/cabang/pdf',
            [CabangController::class, 'pdf']
        )->name('cabang.pdf');

        Route::resource(
            'organisasi/cabang',
            CabangController::class
        );

    });

    /*
    |--------------------------------------------------------------------------
    | RANTING + CABANG + SUPERADMIN
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:superadmin,cabang,ranting')->group(function () {

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

    });


    /*
    |--------------------------------------------------------------------------
    | AUM
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:superadmin,aum')->group(function () {

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

    });


    /*
    |--------------------------------------------------------------------------
    | MASJID
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:superadmin,masjid')->group(function () {

        Route::get('/unit-lembaga/masjid', function () {
            return view('unit-lembaga.masjid.index');
        });

        Route::get('/unit-lembaga/masjid/tambah', function () {
            return view('unit-lembaga.masjid.tambah');
        });

    });


    /*
    |--------------------------------------------------------------------------
    | KEUANGAN
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:superadmin,keuangan')->group(function () {

        Route::get('/keuangan', function () {
            return view('keuangan.index');
        });

        Route::get('/keuangan/tambah', function () {
            return view('keuangan.tambah');
        });

    });

});