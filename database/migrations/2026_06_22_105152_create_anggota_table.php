<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('anggota', function (Blueprint $table) {

            $table->string('nik',20)->primary();

            $table->string('nama',100);

            $table->enum('jenis_kelamin',['L','P'])->nullable();

            $table->date('tanggal_lahir')->nullable();

            $table->text('alamat')->nullable();

            $table->foreignId('cabang_id')
                ->nullable()
                ->constrained('cabang');

            $table->foreignId('ranting_id')
                ->nullable()
                ->constrained('ranting');

            $table->string('pekerjaan',100)->nullable();

            $table->string('pendidikan',100)->nullable();

            $table->enum('status',[
                'aktif',
                'kurang aktif',
                'vakum'
            ])->default('aktif');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anggota');
    }
};