<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('tracers', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->year('tahun_lulus');
        $table->string('email');
        $table->string('no_hp');
        $table->string('status'); // Bekerja, Kuliah, Wirausaha, dsb
        $table->string('instansi')->nullable(); // tempat kerja/kuliah/usaha
        $table->text('pesan')->nullable(); // pesan/masukan untuk sekolah
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracers');
    }
};
