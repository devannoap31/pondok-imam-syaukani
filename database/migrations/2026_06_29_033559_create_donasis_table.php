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
        Schema::create('donasi', function (Blueprint $table) {
            $table->id('id_donasi'); 
            $table->string('nama_donatur', 40); 
            $table->decimal('nominal', 15, 2); 
            $table->dateTime('tanggal_donasi'); 
            $table->text('keterangan'); 
            $table->bigInteger('id_transaksi')->unique(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donasis');
    }
};
