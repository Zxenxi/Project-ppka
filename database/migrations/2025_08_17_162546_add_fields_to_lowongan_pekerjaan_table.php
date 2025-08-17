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
        Schema::table('lowongan_pekerjaan', function (Blueprint $table) {
            $table->string('lokasi')->after('deskripsi');
            $table->string('tipe_pekerjaan')->after('lokasi');
            $table->string('nama_perusahaan')->after('tipe_pekerjaan');
            $table->string('tautan_lamaran')->nullable()->after('nama_perusahaan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lowongan_pekerjaan', function (Blueprint $table) {
            $table->dropColumn(['lokasi', 'tipe_pekerjaan', 'nama_perusahaan', 'tautan_lamaran']);
        });
    }
};
