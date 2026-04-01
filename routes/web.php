<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SekolahController;
use App\Http\Controllers\PendaftarDashboardController;
use App\Http\Controllers\UnifiedRegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
})->name('home');

Route::get('/tata-cara-pendaftaran', function () {
    return view('tata-cara-pendaftaran');
})->name('tata-cara-pendaftaran');

Route::get('/portal', fn() => redirect()->route('login'))->name('portal.selection');

// Auth routes from Breeze
require __DIR__.'/auth.php';

// Login Aliases for Portal Selection
Route::get('/admin/login', fn() => redirect()->route('login'))->name('admin.login');
Route::get('/organisasi/login', fn() => redirect()->route('login'))->name('organisasi.login');

// Registration
Route::get('/register', [UnifiedRegistrationController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UnifiedRegistrationController::class, 'register']);
Route::get('/daftar', fn() => redirect()->route('register')); // Bridge old path

// Registration Success
Route::get('/registration-success', function () {
    return view('registration-success');
})->name('registration.success');

// Pendaftar Dashboard
Route::middleware(['auth'])->prefix('organisasi')->group(function () {
    Route::get('/dashboard', [PendaftarDashboardController::class, 'index'])->name('organisasi.dashboard');
    Route::post('/upload', [PendaftarDashboardController::class, 'uploadDocuments'])->name('organisasi.upload');
    Route::post('/upload-nomination', [PendaftarDashboardController::class, 'uploadNomination'])->name('organisasi.upload.nomination');
});

// Admin Dashboard (Protected by auth and admin alias)
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index']);
    
    // Sekolah/Organisasi Management
    Route::get('/sekolah', [SekolahController::class, 'index'])->name('sekolah.index');
    Route::get('/sekolah/{id}', [SekolahController::class, 'show'])->name('sekolah.show');
    Route::get('/sekolah/{id}/edit', [SekolahController::class, 'edit'])->name('sekolah.edit');
    Route::put('/sekolah/{id}', [SekolahController::class, 'update'])->name('sekolah.update');
    Route::delete('/sekolah/{id}', [SekolahController::class, 'destroy'])->name('sekolah.destroy');
});