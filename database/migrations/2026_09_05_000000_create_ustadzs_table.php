<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ustadzs', function (Blueprint $table) {
            $table->id('id_ustadz');
            $table->string('nama', 100);
            $table->string('gelar', 50)->nullable();
            $table->string('jabatan', 100);
            $table->string('foto')->nullable();
            $table->text('bio')->nullable();
            $table->text('pendidikan')->nullable();
            $table->string('keahlian', 255)->nullable();
            $table->boolean('aktif')->default(true);
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ustadzs');
    }
};
