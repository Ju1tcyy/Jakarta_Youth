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
            $table->string('pas_foto_formal')->nullable();
            $table->string('curriculum_vitae')->nullable();
            $table->string('fotokopi_rapor')->nullable();
            $table->string('video_profil_jakarta')->nullable();
            $table->string('portofolio_inovasi')->nullable();
            $table->string('esai_solusi_kepemimpinan')->nullable();
            $table->string('google_form_kepuasan_president')->nullable();
            $table->string('surat_pernyataan_kedisiplinan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ketos', function (Blueprint $table) {
            $table->dropColumn([
                'pas_foto_formal', 
                'curriculum_vitae', 
                'fotokopi_rapor', 
                'video_profil_jakarta', 
                'portofolio_inovasi', 
                'esai_solusi_kepemimpinan', 
                'google_form_kepuasan_president', 
                'surat_pernyataan_kedisiplinan'
            ]);
        });
    }
};
