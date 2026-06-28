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
                ->constrained('cabang')
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->foreignId('ranting_id')
                ->nullable()
                ->constrained('ranting')
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->text('alamat')->nullable();

            $table->year('tahun')->nullable();

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