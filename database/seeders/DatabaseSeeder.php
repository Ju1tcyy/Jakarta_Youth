<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Menyemai akun Admin dengan password
        User::updateOrCreate(
        ['email' => 'admin@gmail.com'], // Ganti dengan email asli admin jika ada
        [
            'name' => 'Administrator',
            'password' => bcrypt('admin123'), // Ini adalah password admin
            'role' => 'admin', // Sesuai dengan default role
        ]
        );
    }
}