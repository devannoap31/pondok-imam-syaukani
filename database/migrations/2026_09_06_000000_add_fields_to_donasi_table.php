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
        Schema::table('donasi', function (Blueprint $table) {
            $table->string('institusi', 100)->nullable()->after('nama_donatur');
            $table->string('metode_pembayaran', 50)->nullable()->after('keterangan');
            $table->string('bukti_pembayaran')->nullable()->after('metode_pembayaran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('donasi', function (Blueprint $table) {
            $table->dropColumn(['institusi', 'metode_pembayaran', 'bukti_pembayaran']);
        });
    }
};
