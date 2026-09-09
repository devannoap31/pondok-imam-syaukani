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
        Schema::create('tujuan_donasi', function (Blueprint $table) {
            $table->id('id_tujuan');
            $table->string('nomor', 10)->default('01');
            $table->string('judul', 150);
            $table->text('deskripsi');
            $table->string('warna', 30)->default('primary');
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
        Schema::dropIfExists('tujuan_donasi');
    }
};
