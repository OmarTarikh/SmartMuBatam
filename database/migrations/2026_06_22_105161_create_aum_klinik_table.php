<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('aum_klinik', function (Blueprint $table) {

            $table->id();

            $table->foreignId('aum_id')
                ->unique()
                ->constrained('aum')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->integer('jumlah_pasien')->nullable();

            $table->integer('jumlah_dokter')->nullable();

            $table->integer('kapasitas')->nullable();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aum_klinik');
    }
};