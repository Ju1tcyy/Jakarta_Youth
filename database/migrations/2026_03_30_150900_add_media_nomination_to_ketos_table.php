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
            $table->string('portofolio_sosial_media')->nullable();
            $table->string('google_form_kepuasan_media')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ketos', function (Blueprint $table) {
            $table->dropColumn(['portofolio_sosial_media', 'google_form_kepuasan_media']);
        });
    }
};
