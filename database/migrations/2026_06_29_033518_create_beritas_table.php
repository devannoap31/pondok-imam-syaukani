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
        Schema::create('berita', function (Blueprint $table) {
            $table->id('id_berita'); 
            $table->foreignId('id_users')->constrained('users')->onDelete('cascade'); 
            $table->string('judul'); 
            $table->string('slug'); 
            $table->longText('isi'); 
            $table->string('gambar'); 
            $table->dateTime('tanggal_publish'); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};
