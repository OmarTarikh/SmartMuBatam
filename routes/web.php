<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\RantingController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AumController;
use App\Http\Controllers\MasjidController;

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
    | RANTING + CABANG + SUPERADMIN + ANGGOTA
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:superadmin,cabang,ranting')->group(function () {

        Route::get(
            '/organisasi/anggota/get-ranting/{id}',
            [AnggotaController::class, 'getRanting']
        )->name('anggota.getRanting');

        Route::resource(
            'organisasi/ranting',
            RantingController::class
        )->except('show');

        Route::get(
            '/organisasi/ranting/pdf',
            [RantingController::class,'pdf']
        )->name('ranting.pdf');

        Route::get(
            '/organisasi/anggota/pdf',
            [AnggotaController::class,'pdf']
        )->name('anggota.pdf');
    
        Route::resource(
            'organisasi/anggota',
            AnggotaController::class
        )->except('show');
        
    });
    /*
    |--------------------------------------------------------------------------
    | AUM
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:superadmin,aum')->group(function () {

        /*
        |--------------------------------------------------------------------------
        | AJAX RANTING
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/unit-lembaga/aum/get-ranting/{id}',
            [AumController::class, 'getRanting']
        )->name('aum.getRanting');


        /*
        |--------------------------------------------------------------------------
        | SEKOLAH
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/unit-lembaga/aum/sekolah',
            [AumController::class, 'sekolah']
        )->name('aum.sekolah');

        Route::get(
            '/unit-lembaga/aum/sekolah/tambah',
            [AumController::class, 'createSekolah']
        )->name('aum.sekolah.tambah');

        Route::get(
            '/unit-lembaga/aum/sekolah/pdf',
            [AumController::class, 'pdfSekolah']
        )->name('aum.sekolah.pdf');


        /*
        |--------------------------------------------------------------------------
        | KLINIK
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/unit-lembaga/aum/klinik',
            [AumController::class, 'klinik']
        )->name('aum.klinik');

        Route::get(
            '/unit-lembaga/aum/klinik/tambah',
            [AumController::class, 'createKlinik']
        )->name('aum.klinik.tambah');

        Route::get(
            '/unit-lembaga/aum/klinik/pdf',
            [AumController::class, 'pdfKlinik']
        )->name('aum.klinik.pdf');


        /*
        |--------------------------------------------------------------------------
        | CRUD (DIGUNAKAN BERSAMA)
        |--------------------------------------------------------------------------
        */

        Route::post(
            '/unit-lembaga/aum',
            [AumController::class, 'store']
        )->name('aum.store');

        Route::get(
            '/unit-lembaga/aum/{id}/edit',
            [AumController::class, 'edit']
        )->name('aum.edit');

        Route::put(
            '/unit-lembaga/aum/{id}',
            [AumController::class, 'update']
        )->name('aum.update');

        Route::delete(
            '/unit-lembaga/aum/{id}',
            [AumController::class, 'destroy']
        )->name('aum.destroy');

    });
    /*
    |--------------------------------------------------------------------------
    | MASJID
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:superadmin,masjid')->group(function () {

        /*
        |--------------------------------------------------------------------------
        | AJAX RANTING
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/unit-lembaga/masjid/get-ranting/{id}',
            [MasjidController::class, 'getRanting']
        )->name('masjid.getRanting');


        /*
        |--------------------------------------------------------------------------
        | INDEX
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/unit-lembaga/masjid',
            [MasjidController::class, 'index']
        )->name('masjid.index');


        /*
        |--------------------------------------------------------------------------
        | TAMBAH
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/unit-lembaga/masjid/tambah',
            [MasjidController::class, 'create']
        )->name('masjid.create');


        /*
        |--------------------------------------------------------------------------
        | PDF
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/unit-lembaga/masjid/pdf',
            [MasjidController::class, 'pdf']
        )->name('masjid.pdf');


        /*
        |--------------------------------------------------------------------------
        | CRUD
        |--------------------------------------------------------------------------
        */

        Route::post(
            '/unit-lembaga/masjid',
            [MasjidController::class, 'store']
        )->name('masjid.store');

        Route::get(
            '/unit-lembaga/masjid/{id}/edit',
            [MasjidController::class, 'edit']
        )->name('masjid.edit');

        Route::put(
            '/unit-lembaga/masjid/{id}',
            [MasjidController::class, 'update']
        )->name('masjid.update');

        Route::delete(
            '/unit-lembaga/masjid/{id}',
            [MasjidController::class, 'destroy']
        )->name('masjid.destroy');

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