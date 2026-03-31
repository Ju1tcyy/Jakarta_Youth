<?php
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KetosController as AdminKetosController;
use App\Http\Controllers\Admin\SekolahController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\KetosController as PublicKetosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
})->name('home');

// Auth defaults from Breeze
require __DIR__.'/auth.php';

// Unified Registration Override
Route::get('/register', [App\Http\Controllers\UnifiedRegistrationController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\UnifiedRegistrationController::class, 'register']);
Route::get('/daftar', fn() => redirect()->route('register')); // Redirect old path

// Unified Login Override
Route::get('/login', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store']);

// Redirection routes for old links
Route::get('/organisasi/login', fn() => redirect()->route('login'))->name('organisasi.login');
Route::get('/ketos/login', fn() => redirect()->route('login'))->name('ketos.login');

Route::get('/organisasi/dashboard', [App\Http\Controllers\OrganisasiAuthController::class, 'dashboard'])->middleware('auth')->name('organisasi.dashboard');
Route::post('/organisasi/upload', [App\Http\Controllers\OrganisasiAuthController::class, 'uploadDocuments'])->middleware('auth')->name('organisasi.upload');
Route::get('/organisasi/logout', [App\Http\Controllers\OrganisasiAuthController::class, 'logout'])->name('organisasi.logout');

Route::get('/ketos/dashboard', [App\Http\Controllers\KetosAuthController::class, 'dashboard'])->middleware('auth')->name('ketos.dashboard');
Route::post('/ketos/upload-nomination', [App\Http\Controllers\KetosAuthController::class, 'uploadNomination'])->middleware('auth')->name('ketos.upload.nomination');
Route::put('/ketos/update-profile', [App\Http\Controllers\KetosAuthController::class, 'updateProfile'])->middleware('auth')->name('ketos.update.profile');
Route::get('/ketos/logout', [App\Http\Controllers\KetosAuthController::class, 'logout'])->name('ketos.logout');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index']);
    
    // Routes untuk Ketos Admin
    Route::get('/ketos', [AdminKetosController::class, 'index'])->name('ketos.index');
    Route::get('/ketos/{id}', [AdminKetosController::class, 'show'])->name('ketos.show');
    Route::get('/ketos/{id}/edit', [AdminKetosController::class, 'edit'])->name('ketos.edit');
    Route::put('/ketos/{id}', [AdminKetosController::class, 'update'])->name('ketos.update');
    Route::delete('/ketos/{id}', [AdminKetosController::class, 'destroy'])->name('ketos.destroy');
    
    // Routes untuk Organisasi Admin
    Route::get('/sekolah', [SekolahController::class, 'index'])->name('sekolah.index');
    Route::get('/sekolah/{id}', [SekolahController::class, 'show'])->name('sekolah.show');
    Route::get('/sekolah/{id}/edit', [SekolahController::class, 'edit'])->name('sekolah.edit');
    Route::put('/sekolah/{id}', [SekolahController::class, 'update'])->name('sekolah.update');
    Route::delete('/sekolah/{id}', [SekolahController::class, 'destroy'])->name('sekolah.destroy');
});