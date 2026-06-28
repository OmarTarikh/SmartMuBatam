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

            $table->enum('jenis', [
                'kas',
                'wakaf',
                'infaq',
                'sedekah'
            ]);

            $table->foreignId('cabang_id')
                ->nullable()
                ->constrained('cabang')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('masjid_id')
                ->nullable()
                ->constrained('masjid')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->text('lokasi')->nullable();

            $table->dateTime('tanggal')->nullable();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aset_keuangan');
    }
};