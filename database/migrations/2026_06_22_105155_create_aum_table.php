<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('aum', function (Blueprint $table) {

            $table->id();

            $table->string('nama_aum',150);

            $table->enum('jenis',[
                'sekolah',
                'klinik',
                'lainnya'
            ]);

            $table->foreignId('cabang_id')
                ->nullable()
                ->constrained('cabang');

            $table->foreignId('ranting_id')
                ->nullable()
                ->constrained('ranting');

            $table->text('alamat')->nullable();

            $table->integer('jumlah_siswa')->nullable();

            $table->integer('jumlah_guru')->nullable();

            $table->string('akreditasi',10)->nullable();

            $table->year('tahun')->nullable();

            $table->integer('jumlah_pasien')->nullable();

            $table->integer('jumlah_dokter')->nullable();

            $table->integer('kapasitas')->nullable();

            $table->enum('status_perizinan',[
                'aktif',
                'tidak aktif',
                'proses izin'
            ])->nullable();

            $table->string('bulan',20)->nullable();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aum');
    }
};