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
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('admin')->after('email'); // admin, ketos, organisasi
            $table->string('nomor_wa')->nullable()->after('role');
            
            // Common fields for Ketos & Organisasi
            $table->string('asal_sekolah')->nullable();
            
            // Ketos Specific Fields
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('portofolio_program_kerja')->nullable();
            $table->string('google_form_kepuasan')->nullable();
            $table->string('portofolio_kegiatan_sosial')->nullable();
            $table->string('google_form_kepuasan_sosial')->nullable();
            $table->string('portofolio_sosial_media')->nullable();
            $table->string('google_form_kepuasan_media')->nullable();
            $table->string('link_instagram_reels')->nullable();
            $table->string('google_form_kepuasan_reels')->nullable();
            $table->string('pas_foto_formal')->nullable();
            $table->string('curriculum_vitae')->nullable();
            $table->string('fotokopi_rapor')->nullable();
            $table->string('video_profil_jakarta')->nullable();
            $table->string('portofolio_inovasi')->nullable();
            $table->string('esai_solusi_kepemimpinan')->nullable();
            $table->string('google_form_kepuasan_president')->nullable();
            $table->string('surat_pernyataan_kedisiplinan')->nullable();
            $table->decimal('nilai', 10, 2)->default(0);
            $table->decimal('nilai_innovation', 10, 2)->default(0);
            $table->decimal('nilai_social_impact', 10, 2)->default(0);
            $table->decimal('nilai_media', 10, 2)->default(0);
            $table->decimal('nilai_video_reels', 10, 2)->default(0);
            $table->decimal('nilai_president', 10, 2)->default(0);

            // Organisasi Specific Fields
            $table->string('nama_organisasi')->nullable();
            $table->text('alamat')->nullable();
            $table->string('surat_rekomendasi')->nullable();
            $table->string('struktur_kepengurusan')->nullable();
            $table->string('bukti_share_ig')->nullable();
            $table->string('bukti_repost_ig')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'role', 'nomor_wa', 'asal_sekolah', 'tempat_lahir', 'tanggal_lahir',
                'portofolio_program_kerja', 'google_form_kepuasan', 'portofolio_kegiatan_sosial',
                'google_form_kepuasan_sosial', 'portofolio_sosial_media', 'google_form_kepuasan_media',
                'link_instagram_reels', 'google_form_kepuasan_reels', 'pas_foto_formal',
                'curriculum_vitae', 'fotokopi_rapor', 'video_profil_jakarta', 'portofolio_inovasi',
                'esai_solusi_kepemimpinan', 'google_form_kepuasan_president', 'surat_pernyataan_kedisiplinan',
                'nilai', 'nilai_innovation', 'nilai_social_impact', 'nilai_media', 'nilai_video_reels', 'nilai_president',
                'nama_organisasi', 'alamat', 'surat_rekomendasi', 'struktur_kepengurusan',
                'bukti_share_ig', 'bukti_repost_ig'
            ]);
        });
    }
};
