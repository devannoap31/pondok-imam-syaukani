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
        Schema::create('profile_pondok', function (Blueprint $table) {
            $table->id('id_profile_pondok'); 
            $table->string('nama_pondok', 40); 
            $table->text('visi'); 
            $table->text('misi'); 
            $table->text('sejarah'); 
            $table->text('alamat'); 
            $table->string('telepon', 30); 
            $table->string('email', 40)->unique(); 
            $table->string('maps_url'); 
            $table->string('logo'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_pondoks');
    }
};
