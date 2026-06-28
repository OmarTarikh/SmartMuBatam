<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('aset_infaq', function (Blueprint $table) {

            $table->id();

            $table->foreignId('aset_keuangan_id')
                ->constrained('aset_keuangan')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->decimal('jumlah',15,2);

            $table->text('keterangan')->nullable();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aset_infaq');
    }
};