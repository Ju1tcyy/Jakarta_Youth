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
            $table->integer('nilai_innovation')->nullable()->after('nilai');
            $table->integer('nilai_social_impact')->nullable()->after('nilai_innovation');
            $table->integer('nilai_media')->nullable()->after('nilai_social_impact');
            $table->integer('nilai_video_reels')->nullable()->after('nilai_media');
            $table->integer('nilai_president')->nullable()->after('nilai_video_reels');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ketos', function (Blueprint $table) {
            $table->dropColumn([
                'nilai_innovation',
                'nilai_social_impact',
                'nilai_media',
                'nilai_video_reels',
                'nilai_president'
            ]);
        });
    }
};
