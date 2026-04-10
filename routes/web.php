<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\AdminPengaduanController;
use App\Http\Controllers\AdminAspirasiController;

Route::get('/', function () {
    return view('landing');
})->name('home');

/* ================= LOGIN ================= */

Route::view('/login/admin', 'auth.login-admin')->name('login.admin');
Route::view('/login/siswa', 'auth.login-siswa')->name('login.siswa');
Route::post('/login/{type}', [AuthController::class, 'login'])->name('login.post')->where('type', 'admin|siswa');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

/* ================= ADMIN ================= */

Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('kategori', KategoriController::class)
        ->names('kategori')
        ->except(['show']);

    Route::get('/pengaduan', [AdminPengaduanController::class, 'index'])->name('admin.pengaduan.index');
    Route::post('/pengaduan/{pengaduan}/status', [AdminPengaduanController::class, 'updateStatus'])->name('admin.pengaduan.status');

    Route::get('/aspirasi', [AdminAspirasiController::class, 'index'])->name('admin.aspirasi.index');
    Route::post('/aspirasi/{aspirasi}/status', [AdminAspirasiController::class, 'updateStatus'])->name('admin.aspirasi.status');
});

/* ================= SISWA ================= */

Route::middleware('siswa')->prefix('siswa')->group(function () {
    Route::get('/dashboard', [SiswaController::class, 'dashboard'])->name('siswa.dashboard');

    Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('siswa.pengaduan.index');
    Route::get('/pengaduan/create', [PengaduanController::class, 'create'])->name('siswa.pengaduan.create');
    Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('siswa.pengaduan.store');

    Route::get('/aspirasi', [AspirasiController::class, 'index'])->name('siswa.aspirasi.index');
    Route::get('/aspirasi/create', [AspirasiController::class, 'create'])->name('siswa.aspirasi.create');
    Route::post('/aspirasi', [AspirasiController::class, 'store'])->name('siswa.aspirasi.store');
});