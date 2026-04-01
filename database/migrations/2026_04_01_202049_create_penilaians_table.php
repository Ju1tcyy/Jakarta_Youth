<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('penilaians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organisasi_id')->constrained()->onDelete('cascade');
            $table->foreignId('juri_id')->constrained('users')->onDelete('cascade');
            $table->string('kategori'); // innovation | social_impact | media | video_reels | president

            // Outstanding Student Council Innovation
            $table->decimal('skor_inovasi_kreativitas', 5, 2)->nullable(); // 30%
            $table->decimal('skor_dampak', 5, 2)->nullable();              // 20%
            $table->decimal('skor_efektivitas', 5, 2)->nullable();         // 15%
            $table->decimal('skor_konsistensi', 5, 2)->nullable();         // 15%
            $table->decimal('skor_keterlibatan', 5, 2)->nullable();        // 10%
            $table->decimal('skor_kemitraan', 5, 2)->nullable();           // 10%

            // Leading Student Council Social Impact
            $table->decimal('skor_si_dampak', 5, 2)->nullable();           // 25%
            $table->decimal('skor_si_relevansi', 5, 2)->nullable();        // 15%
            $table->decimal('skor_si_keberlanjutan', 5, 2)->nullable();    // 15%
            $table->decimal('skor_si_data', 5, 2)->nullable();             // 15%
            $table->decimal('skor_si_kreativitas', 5, 2)->nullable();      // 10%
            $table->decimal('skor_si_keterlibatan', 5, 2)->nullable();     // 8%
            $table->decimal('skor_si_kemitraan', 5, 2)->nullable();        // 7%
            $table->decimal('skor_si_empati', 5, 2)->nullable();           // 5%

            // Next-Level Student Council Media
            $table->decimal('skor_me_performa', 5, 2)->nullable();         // 25%
            $table->decimal('skor_me_data', 5, 2)->nullable();             // 15%
            $table->decimal('skor_me_konsistensi', 5, 2)->nullable();      // 15%
            $table->decimal('skor_me_konten', 5, 2)->nullable();           // 15%
            $table->decimal('skor_me_visual', 5, 2)->nullable();           // 10%
            $table->decimal('skor_me_interaksi', 5, 2)->nullable();        // 10%
            $table->decimal('skor_me_kelengkapan', 5, 2)->nullable();      // 10%

            // People's Choice - Video Reels
            $table->decimal('skor_vr_popularitas', 5, 2)->nullable();      // 60%
            $table->decimal('skor_vr_konten', 5, 2)->nullable();           // 15%
            $table->decimal('skor_vr_tema', 5, 2)->nullable();             // 10%
            $table->decimal('skor_vr_kelengkapan', 5, 2)->nullable();      // 5%
            $table->decimal('skor_vr_visual', 5, 2)->nullable();           // 5%
            $table->decimal('skor_vr_kepatuhan', 5, 2)->nullable();        // 5%

            // Student Council President of the Year 2026
            $table->decimal('skor_pr_kepemimpinan', 5, 2)->nullable();     // 25%
            $table->decimal('skor_pr_inovasi', 5, 2)->nullable();          // 15%
            $table->decimal('skor_pr_problem_solving', 5, 2)->nullable();  // 15%
            $table->decimal('skor_pr_branding', 5, 2)->nullable();         // 10%
            $table->decimal('skor_pr_portofolio', 5, 2)->nullable();       // 10%
            $table->decimal('skor_pr_video', 5, 2)->nullable();            // 10%
            $table->decimal('skor_pr_validasi', 5, 2)->nullable();         // 10%
            $table->decimal('skor_pr_berkas', 5, 2)->nullable();           // 5%

            $table->decimal('total_skor', 6, 2)->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();

            $table->unique(['organisasi_id', 'juri_id']); // 1 juri 1 penilaian per organisasi
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penilaians');
    }
};
