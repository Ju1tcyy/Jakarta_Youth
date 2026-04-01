<?php
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SekolahController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\OrganisasiAuthController as AuthOrganisasiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
})->name('home');

Route::get('/tata-cara-pendaftaran', function () {
    return view('tata-cara-pendaftaran');
})->name('tata-cara-pendaftaran');

Route::get('/portal', function () {
    return view('portal-selection');
})->name('portal.selection');

// Separate Login Systems
// Admin Login
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Organisasi Login
Route::get('/organisasi/login', [AuthOrganisasiController::class, 'showLoginForm'])->name('organisasi.login');
Route::post('/organisasi/login', [AuthOrganisasiController::class, 'login'])->name('organisasi.login.post');
Route::post('/organisasi/logout', [AuthOrganisasiController::class, 'logout'])->name('organisasi.logout');

// Auth defaults from Breeze (for general registration)
require __DIR__.'/auth.php';

// Unified Registration Override
Route::get('/register', [App\Http\Controllers\UnifiedRegistrationController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\UnifiedRegistrationController::class, 'register']);
Route::get('/daftar', fn() => redirect()->route('register')); // Redirect old path

// Registration Success Page
Route::get('/registration-success', function () {
    return view('registration-success');
})->name('registration.success');

// Organisasi Dashboard Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/organisasi/dashboard', [App\Http\Controllers\OrganisasiAuthController::class, 'dashboard'])->name('organisasi.dashboard');
    Route::post('/organisasi/upload', [App\Http\Controllers\OrganisasiAuthController::class, 'uploadDocuments'])->name('organisasi.upload');
});

// Admin Dashboard Routes
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index']);
    
    // Routes untuk Organisasi Admin
    Route::get('/sekolah', [SekolahController::class, 'index'])->name('sekolah.index');
    Route::get('/sekolah/{id}', [SekolahController::class, 'show'])->name('sekolah.show');
    Route::get('/sekolah/{id}/edit', [SekolahController::class, 'edit'])->name('sekolah.edit');
    Route::put('/sekolah/{id}', [SekolahController::class, 'update'])->name('sekolah.update');
    Route::delete('/sekolah/{id}', [SekolahController::class, 'destroy'])->name('sekolah.destroy');
});