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
        Schema::create('penyaluran_dana', function (Blueprint $table) {
            $table->id('id_penyaluran');
            $table->string('judul', 100);
            $table->text('deskripsi');
            $table->string('icon', 100)->default('academic-cap');
            $table->string('tag', 50)->nullable();
            $table->string('warna', 30)->default('emerald');
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
        Schema::dropIfExists('penyaluran_dana');
    }
};
