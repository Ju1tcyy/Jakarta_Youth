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
        Schema::create('organisasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nama_sekolah');
            $table->string('nama_organisasi');
            $table->string('nomor_wa');
            $table->text('alamat');
            $table->string('surat_rekomendasi')->nullable();
            $table->string('struktur_kepengurusan')->nullable();
            $table->string('buktishare')->nullable();
            $table->string('buktirepost')->nullable();
            $table->integer('nilai')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organisasis');
    }
};
