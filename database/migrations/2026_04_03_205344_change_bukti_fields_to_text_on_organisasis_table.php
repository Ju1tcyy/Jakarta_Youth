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
            $table->text('buktishare')->nullable()->change();
            $table->text('buktirepost')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('organisasis', function (Blueprint $table) {
            $table->string('buktishare')->nullable()->change();
            $table->string('buktirepost')->nullable()->change();
        });
    }
};
