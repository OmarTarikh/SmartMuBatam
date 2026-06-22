<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('masjid', function (Blueprint $table) {

            $table->id();

            $table->string('nama_masjid',150);

            $table->foreignId('ranting_id')
                ->nullable()
                ->constrained('ranting');

            $table->text('alamat')->nullable();

            $table->enum('status_legalitas',[
                'sertifikat',
                'belum',
                'proses'
            ])->nullable();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('masjid');
    }
};