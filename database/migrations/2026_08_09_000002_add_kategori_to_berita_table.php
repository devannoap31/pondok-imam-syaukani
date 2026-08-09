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
        if (Schema::hasTable('berita') && ! Schema::hasColumn('berita', 'kategori')) {
            Schema::table('berita', function (Blueprint $table) {
                $table->string('kategori')->nullable()->after('slug');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('berita') && Schema::hasColumn('berita', 'kategori')) {
            Schema::table('berita', function (Blueprint $table) {
                $table->dropColumn('kategori');
            });
        }
    }
};
