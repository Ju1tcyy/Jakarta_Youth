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
        Schema::table('organisasis', function (Blueprint $table) {
            // Outstanding Student Council Innovation
            $table->string('portofolio_program_kerja')->nullable()->after('buktirepost');
            $table->boolean('google_form_kepuasan')->default(0)->after('portofolio_program_kerja');
            
            // Leading Student Council Social Impact
            $table->string('portofolio_kegiatan_sosial')->nullable()->after('google_form_kepuasan');
            $table->boolean('google_form_kepuasan_sosial')->default(0)->after('portofolio_kegiatan_sosial');
            
            // Next-Level Student Council Media
            $table->string('portofolio_sosial_media')->nullable()->after('google_form_kepuasan_sosial');
            $table->boolean('google_form_kepuasan_media')->default(0)->after('portofolio_sosial_media');
            
            // People's Choice Student Council - DKI Jakarta
            $table->string('link_instagram_reels')->nullable()->after('google_form_kepuasan_media');
            $table->boolean('google_form_kepuasan_reels')->default(0)->after('link_instagram_reels');
            
            // Student Council President of the Year 2026
            $table->string('pas_foto_formal')->nullable()->after('google_form_kepuasan_reels');
            $table->string('curriculum_vitae')->nullable()->after('pas_foto_formal');
            $table->string('fotokopi_rapor')->nullable()->after('curriculum_vitae');
            $table->string('video_profil_jakarta')->nullable()->after('fotokopi_rapor');
            $table->string('portofolio_inovasi')->nullable()->after('video_profil_jakarta');
            $table->string('esai_solusi_kepemimpinan')->nullable()->after('portofolio_inovasi');
            $table->string('surat_pernyataan_kedisiplinan')->nullable()->after('esai_solusi_kepemimpinan');
            $table->boolean('google_form_kepuasan_president')->default(0)->after('surat_pernyataan_kedisiplinan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('organisasis', function (Blueprint $table) {
            $table->dropColumn([
                'portofolio_program_kerja',
                'google_form_kepuasan',
                'portofolio_kegiatan_sosial',
                'google_form_kepuasan_sosial',
                'portofolio_sosial_media',
                'google_form_kepuasan_media',
                'link_instagram_reels',
                'google_form_kepuasan_reels',
                'pas_foto_formal',
                'curriculum_vitae',
                'fotokopi_rapor',
                'video_profil_jakarta',
                'portofolio_inovasi',
                'esai_solusi_kepemimpinan',
                'surat_pernyataan_kedisiplinan',
                'google_form_kepuasan_president',
            ]);
        });
    }
};
