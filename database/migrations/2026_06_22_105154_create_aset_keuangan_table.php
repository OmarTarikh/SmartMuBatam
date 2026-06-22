<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('aset_keuangan', function (Blueprint $table) {

            $table->id();

            $table->enum('jenis',[
                'kas_masuk',
                'kas_keluar',
                'aset_tanah',
                'aset_bangunan'
            ]);

            $table->decimal('jumlah',15,2)->nullable();

            $table->text('keterangan')->nullable();

            $table->text('lokasi')->nullable();

            $table->foreignId('masjid_id')
                ->nullable()
                ->constrained('masjid');

            $table->dateTime('tanggal')->nullable();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aset_keuangan');
    }
};