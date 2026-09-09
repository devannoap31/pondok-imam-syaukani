<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rekening_bank', function (Blueprint $table) {
            $table->id('id_rekening');
            $table->string('nama_bank', 50);
            $table->string('kode_bank', 10)->nullable();
            $table->string('nomor_rekening', 40);
            $table->string('atas_nama', 100);
            $table->string('logo')->nullable();
            $table->integer('urutan')->default(1);
            $table->boolean('aktif')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekening_bank');
    }
};
