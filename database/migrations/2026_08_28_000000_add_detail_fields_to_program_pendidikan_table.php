<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('program_pendidikan', function (Blueprint $table) {
            $table->string('subjudul')->nullable()->after('nama_program');
            $table->json('keunggulan')->nullable()->after('deskripsi');
            $table->boolean('aktif')->default(true)->after('gambar');
            $table->unsignedSmallInteger('urutan')->default(0)->after('aktif');
        });
    }

    public function down(): void
    {
        Schema::table('program_pendidikan', function (Blueprint $table) {
            $table->dropColumn(['subjudul', 'keunggulan', 'aktif', 'urutan']);
        });
    }
};
