<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Menambahkan 'panitia' ke ENUM role di tabel users
     */
    public function up(): void
    {
        // Untuk MySQL, ALTER COLUMN ENUM harus pakai raw SQL
        DB::statement("ALTER TABLE users MODIFY COLUMN role ENUM('admin', 'pendaftar', 'juri', 'panitia') NOT NULL DEFAULT 'pendaftar'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("ALTER TABLE users MODIFY COLUMN role ENUM('admin', 'pendaftar', 'juri') NOT NULL DEFAULT 'pendaftar'");
    }
};
