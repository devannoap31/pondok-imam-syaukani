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
        Schema::create('fasilitas_pesantren', function (Blueprint $table) {
            $table->id('id_fasilitas');
            $table->string('nama_fasilitas', 150);
            $table->string('deskripsi_singkat', 255)->nullable();
            $table->text('detail');
            $table->string('icon', 50)->nullable()->default('🏢');
            $table->integer('urutan')->default(0);
            $table->boolean('aktif')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fasilitas_pesantren');
    }
};
