<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kegiatan', function (Blueprint $table) {

            $table->id();

            $table->foreignId('cabang_id')
                ->constrained('cabang')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
                
            $table->string('nama_kegiatan',150);

            $table->enum('jenis',[
                'agenda',
                'program_kerja'
            ]);

            $table->text('deskripsi')->nullable();

            $table->string('target',100)->nullable();

            $table->integer('progres_persen')->nullable();

            $table->date('tanggal_mulai')->nullable();

            $table->date('tanggal_selesai')->nullable();

            $table->string('lokasi',150)->nullable();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kegiatan');
    }
};