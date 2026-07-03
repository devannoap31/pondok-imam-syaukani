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
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id('id_pendaftaran'); 
            $table->string('nomor_pendaftaran'); 
            $table->string('nama_lengkap', 40); 
            $table->string('tempat_lahir', 40); 
            $table->date('tanggal_lahir'); 
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']); 
            $table->text('alamat'); 
            $table->string('nomor_hp', 40); 
            $table->string('nama_ortu', 40); 
            $table->string('pekerjaan_ortu', 40); 
            $table->enum('status', ['Diverifikasi', 'Diterima', 'Ditolak']); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
