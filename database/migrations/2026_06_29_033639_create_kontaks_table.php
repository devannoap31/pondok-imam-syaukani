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
        Schema::create('kontak', function (Blueprint $table) {
            $table->id('id_kontak'); 
            $table->text('alamat'); 
            $table->string('whatsapp', 30); 
            $table->string('email', 50)->unique(); 
            $table->string('facebook', 50); 
            $table->string('instagram', 50); 
            $table->string('youtube', 50); 
            $table->string('telepon', 30); 
            $table->text('maps_embed'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontaks');
    }
};
