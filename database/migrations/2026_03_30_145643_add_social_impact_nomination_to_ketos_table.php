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
        Schema::table('ketos', function (Blueprint $table) {
            $table->string('portofolio_kegiatan_sosial')->nullable();
            $table->string('google_form_kepuasan_sosial')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ketos', function (Blueprint $table) {
            $table->dropColumn(['portofolio_kegiatan_sosial', 'google_form_kepuasan_sosial']);
        });
    }
};
