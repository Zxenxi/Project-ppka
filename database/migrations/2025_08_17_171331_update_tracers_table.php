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
        Schema::table('tracers', function (Blueprint $table) {
            // Drop old columns
            $table->dropColumn(['nama', 'tahun_lulus', 'email', 'no_hp', 'status', 'instansi', 'pesan']);

            // Add new columns
            $table->string('title')->after('id');
            $table->text('description')->nullable()->after('title');
            $table->string('form_link')->after('description');
            $table->boolean('is_active')->default(false)->after('form_link');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tracers', function (Blueprint $table) {
            // Revert by dropping new columns
            $table->dropColumn(['title', 'description', 'form_link', 'is_active']);

            // Re-add old columns (if needed for rollback, though data would be lost)
            $table->string('nama');
            $table->year('tahun_lulus');
            $table->string('email');
            $table->string('no_hp');
            $table->string('status');
            $table->string('instansi')->nullable();
            $table->text('pesan')->nullable();
        });
    }
};
