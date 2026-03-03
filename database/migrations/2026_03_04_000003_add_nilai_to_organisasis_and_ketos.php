<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('organisasis', function (Blueprint $table) {
            $table->integer('nilai')->nullable()->after('alamat');
        });

        Schema::table('ketos', function (Blueprint $table) {
            $table->integer('nilai')->nullable()->after('nomor_wa');
        });
    }

    public function down(): void
    {
        Schema::table('organisasis', function (Blueprint $table) {
            $table->dropColumn('nilai');
        });

        Schema::table('ketos', function (Blueprint $table) {
            $table->dropColumn('nilai');
        });
    }
};
