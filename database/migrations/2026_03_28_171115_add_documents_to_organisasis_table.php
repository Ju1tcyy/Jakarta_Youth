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
            $table->string('surat_rekomendasi')->nullable()->after('alamat');
            $table->string('struktur_kepengurusan')->nullable()->after('surat_rekomendasi');
            $table->string('bukti_share_ig')->nullable()->after('struktur_kepengurusan');
            $table->string('bukti_repost_ig')->nullable()->after('bukti_share_ig');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('organisasis', function (Blueprint $table) {
            $table->dropColumn(['surat_rekomendasi', 'struktur_kepengurusan', 'bukti_share_ig', 'bukti_repost_ig']);
        });
    }
};
