<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardLowonganKerjaController;
use App\Http\Controllers\HubungiController;
use App\Http\Controllers\TracerController; // This is the public TracerController
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LowonganKerjaController;
use App\Http\Controllers\Admin\PesanController;
use App\Http\Controllers\Admin\TracerController as AdminTracerController; // Alias for Admin TracerController

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
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});



Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('lowongan-kerja', LowonganKerjaController::class)->names('lowongan-kerja');
    Route::resource('tracer', AdminTracerController::class)->names('admin.tracer');
    Route::post('tracer/{tracer}/toggle-active', [AdminTracerController::class, 'toggleActive'])->name('admin.tracer.toggleActive');

    Route::get('/pesan', [PesanController::class, 'index'])->name('hubungi.admin'); // Moved from outside
    Route::delete('/pesan/{id}', [PesanController::class, 'destroy'])->name('pesan.destroy'); // Moved from outside
});

// Public Tracer Study routes (repurposed)
Route::get('/tracer', [TracerController::class, 'index'])->name('tracer.index');