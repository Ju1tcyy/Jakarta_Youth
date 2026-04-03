<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SekolahController;
use App\Http\Controllers\Juri\PenilaianController;
use App\Http\Controllers\PendaftarDashboardController;
use App\Http\Controllers\UnifiedRegistrationController;
use App\Http\Controllers\Panitia\DashboardController as PanitiaDashboardController;
use App\Http\Controllers\Panitia\SekolahController as PanitiaSekolahController;
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

// Login Aliases
Route::get('/admin/login', fn() => redirect()->route('login'))->name('admin.login');
Route::get('/organisasi/login', fn() => redirect()->route('login'))->name('organisasi.login');

// Registration
Route::get('/register', [UnifiedRegistrationController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UnifiedRegistrationController::class, 'register']);
Route::get('/daftar', fn() => redirect()->route('register'));

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

// Admin Dashboard
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/sekolah', [SekolahController::class, 'index'])->name('sekolah.index');
    Route::get('/sekolah/{id}', [SekolahController::class, 'show'])->name('sekolah.show');
    Route::get('/sekolah/{id}/edit', [SekolahController::class, 'edit'])->name('sekolah.edit');
    Route::put('/sekolah/{id}', [SekolahController::class, 'update'])->name('sekolah.update');
    Route::put('/sekolah/{id}/password', [SekolahController::class, 'updatePassword'])->name('sekolah.password');
    Route::delete('/sekolah/{id}', [SekolahController::class, 'destroy'])->name('sekolah.destroy');

    // Admin scoring route
    Route::post('/sekolah/{id}/nilai', [PenilaianController::class, 'adminStore'])->name('sekolah.nilai');

    // Juri management
    Route::get('/juri', [SekolahController::class, 'juriIndex'])->name('admin.juri.index');
    Route::post('/juri', [SekolahController::class, 'juriStore'])->name('admin.juri.store');
    Route::delete('/juri/{id}', [SekolahController::class, 'juriDestroy'])->name('admin.juri.destroy');

    // Leaderboard
    Route::get('/leaderboard/{kategori}', [SekolahController::class, 'leaderboard'])->name('admin.leaderboard');
});

// Panitia Dashboard
Route::middleware(['auth', 'role:panitia'])->prefix('panitia')->group(function () {
    Route::get('/', [PanitiaDashboardController::class, 'index'])->name('panitia.dashboard');
    Route::get('/dashboard', [PanitiaDashboardController::class, 'index']);
    
    Route::get('/sekolah', [PanitiaSekolahController::class, 'index'])->name('panitia.sekolah.index');
    Route::get('/sekolah/{id}', [PanitiaSekolahController::class, 'show'])->name('panitia.sekolah.show');
    Route::get('/leaderboard/{kategori}', [PanitiaSekolahController::class, 'leaderboard'])->name('panitia.leaderboard');
});

// Juri Dashboard
Route::middleware(['auth', 'role:juri'])->prefix('juri')->group(function () {
    Route::get('/dashboard', [PenilaianController::class, 'index'])->name('juri.dashboard');
    Route::get('/peserta/{id}', [PenilaianController::class, 'show'])->name('juri.show');
    Route::post('/peserta/{id}/nilai', [PenilaianController::class, 'store'])->name('juri.store');
});