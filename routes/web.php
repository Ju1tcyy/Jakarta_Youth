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

Route::get('/organisasi/daftar', [OrganisasiController::class, 'create'])->name('organisasi.create');
Route::post('/organisasi', [OrganisasiController::class, 'store'])->name('organisasi.store');

// Routes untuk login organisasi
Route::get('/organisasi/login', [App\Http\Controllers\OrganisasiAuthController::class, 'showLoginForm'])->name('organisasi.login');
Route::post('/organisasi/login', [App\Http\Controllers\OrganisasiAuthController::class, 'login']);
Route::get('/organisasi/dashboard', [App\Http\Controllers\OrganisasiAuthController::class, 'dashboard'])->name('organisasi.dashboard');
Route::post('/organisasi/upload', [App\Http\Controllers\OrganisasiAuthController::class, 'uploadDocuments'])->name('organisasi.upload');
Route::get('/organisasi/logout', [App\Http\Controllers\OrganisasiAuthController::class, 'logout'])->name('organisasi.logout');

Route::get('/ketos/daftar', [PublicKetosController::class, 'create'])->name('ketos.create');
Route::post('/ketos', [PublicKetosController::class, 'store'])->name('ketos.store');

// Routes untuk login ketos
Route::get('/ketos/login', [App\Http\Controllers\KetosAuthController::class, 'showLoginForm'])->name('ketos.login');
Route::post('/ketos/login', [App\Http\Controllers\KetosAuthController::class, 'login']);
Route::get('/ketos/dashboard', [App\Http\Controllers\KetosAuthController::class, 'dashboard'])->name('ketos.dashboard');
Route::post('/ketos/upload-nomination', [App\Http\Controllers\KetosAuthController::class, 'uploadNomination'])->name('ketos.upload.nomination');
Route::get('/ketos/logout', [App\Http\Controllers\KetosAuthController::class, 'logout'])->name('ketos.logout');

Route::post('/registration', [RegistrationController::class, 'store'])->name('registration.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

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