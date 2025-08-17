<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LowonganKerjaController;
use App\Http\Controllers\DashboardLowonganKerjaController;
use App\Http\Controllers\HubungiController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TracerController;
use App\Http\Controllers\PesanController;

Route::get('/', function () {
    return view('pages.home');
})->name('home');
Route::get('/tentang', function () {
    return view('pages.tentang');
})->name('tentang');

Route::get('/layanan', function () {
    return view('pages.layanan');
})->name('layanan');




Route::resource('/hubungi', HubungiController::class);

Route::get('/lowongan-kerja', [DashboardLowonganKerjaController::class, 'index'])->name('dashboard.lowongan-kerja');


Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AdminAuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AdminAuthController::class, 'logout'])->name('logout');

// Hanya halaman admin
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});



Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});
Route::resource('admin/lowongan-kerja', LowonganKerjaController::class)->names('lowongan-kerja');

Route::get('/admin/pesan', [PesanController::class, 'index'])->name('hubungi.admin');
Route::delete('/admin/pesan/{id}', [PesanController::class, 'destroy'])->name('pesan.destroy');

Route::get('/tracer', [TracerController::class, 'create'])->name('tracer.create');
Route::post('/tracer', [TracerController::class, 'store'])->name('tracer.store');