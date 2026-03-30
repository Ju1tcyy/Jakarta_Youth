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
            $table->string('link_instagram_reels')->nullable();
            $table->string('google_form_kepuasan_reels')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ketos', function (Blueprint $table) {
            $table->dropColumn(['link_instagram_reels', 'google_form_kepuasan_reels']);
        });
    }
};
