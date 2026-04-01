<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // SQLite doesn't support dropping columns directly, so we need to recreate the table
        
        // Step 1: Create a new temporary table with the correct structure
        Schema::create('organisasis_new', function (Blueprint $table) {
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
        
        // Step 2: Copy data from old table to new table (if any exists)
        DB::statement('
            INSERT INTO organisasis_new (id, user_id, nama_sekolah, nama_organisasi, nomor_wa, alamat, surat_rekomendasi, struktur_kepengurusan, buktishare, buktirepost, nilai, created_at, updated_at)
            SELECT id, 
                   COALESCE(user_id, 0) as user_id,
                   nama_sekolah, 
                   nama_organisasi, 
                   nomor_wa, 
                   alamat, 
                   surat_rekomendasi, 
                   struktur_kepengurusan, 
                   buktishare, 
                   buktirepost, 
                   nilai, 
                   created_at, 
                   updated_at
            FROM organisasis
            WHERE user_id IS NOT NULL AND user_id > 0
        ');
        
        // Step 3: Drop the old table
        Schema::dropIfExists('organisasis');
        
        // Step 4: Rename the new table to the original name
        Schema::rename('organisasis_new', 'organisasis');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // This migration is not easily reversible
        // You would need to recreate the old structure if needed
    }
};
