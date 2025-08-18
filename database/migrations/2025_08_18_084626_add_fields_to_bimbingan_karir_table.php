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
            Schema::table('bimbingan_karir', function (Blueprint $table) {
            // Add the new columns after 'poster_image_path'
            $table->string('kategori')->after('poster_image_path')->default('Online');
            $table->date('start_date')->after('kategori')->nullable();
            $table->date('end_date')->after('start_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::table('bimbingan_karir', function (Blueprint $table) {
            $table->dropColumn(['kategori', 'start_date', 'end_date']);
        });
    }
};