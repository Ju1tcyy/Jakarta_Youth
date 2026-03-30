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
            $table->string('portofolio_program_kerja')->nullable()->after('nomor_wa');
            $table->string('google_form_kepuasan')->nullable()->after('portofolio_program_kerja');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ketos', function (Blueprint $table) {
            $table->dropColumn(['portofolio_program_kerja', 'google_form_kepuasan']);
        });
    }
};
