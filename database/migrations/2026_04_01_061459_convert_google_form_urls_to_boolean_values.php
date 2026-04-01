<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Convert existing URL values to boolean values (1 for filled URLs, 0 for empty/null)
        DB::table('ketos')->update([
            'google_form_kepuasan' => DB::raw('CASE WHEN google_form_kepuasan IS NOT NULL AND google_form_kepuasan != "" THEN 1 ELSE 0 END'),
            'google_form_kepuasan_sosial' => DB::raw('CASE WHEN google_form_kepuasan_sosial IS NOT NULL AND google_form_kepuasan_sosial != "" THEN 1 ELSE 0 END'),
            'google_form_kepuasan_media' => DB::raw('CASE WHEN google_form_kepuasan_media IS NOT NULL AND google_form_kepuasan_media != "" THEN 1 ELSE 0 END'),
            'google_form_kepuasan_reels' => DB::raw('CASE WHEN google_form_kepuasan_reels IS NOT NULL AND google_form_kepuasan_reels != "" THEN 1 ELSE 0 END'),
            'google_form_kepuasan_president' => DB::raw('CASE WHEN google_form_kepuasan_president IS NOT NULL AND google_form_kepuasan_president != "" THEN 1 ELSE 0 END'),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // This migration is not easily reversible since we're losing URL data
        // We'll just set all values back to null
        DB::table('ketos')->update([
            'google_form_kepuasan' => null,
            'google_form_kepuasan_sosial' => null,
            'google_form_kepuasan_media' => null,
            'google_form_kepuasan_reels' => null,
            'google_form_kepuasan_president' => null,
        ]);
    }
};
