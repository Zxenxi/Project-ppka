<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HubungiController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PesanController;
use App\Http\Controllers\Admin\CampusHiringController as AdminCampusHiringController;
use App\Http\Controllers\CampusHiringController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\PengembanganKarirController;
use App\Http\Controllers\Admin\LowonganKerjaController;
use App\Http\Controllers\Admin\BimbinganKarirController;
use App\Http\Controllers\DashboardLowonganKerjaController;
use App\Http\Controllers\TracerController; // This is the public TracerController
use App\Http\Controllers\Admin\TracerController as AdminTracerController; // Alias for Admin TracerController

// Route::get('/', function () {
//     return view('pages.home');
// })->name('home');
Route::get('/tentang', function () {
    return view('pages.tentang');
})->name('tentang');

Route::get('/layanan', function () {
    return view('pages.layanan');
})->name('layanan');

Route::get('/pengembangan-karir', [App\Http\Controllers\PengembanganKarirController::class, 'index'])->name('pengembangan-karir');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::resource('/hubungi', HubungiController::class);

Route::get('/lowongan-kerja', [DashboardLowonganKerjaController::class, 'index'])->name('dashboard.lowongan-kerja');
Route::get('/campus-hiring', [CampusHiringController::class, 'index'])->name('campus-hiring');

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

    Route::resource('bimbingan-karir', BimbinganKarirController::class)->names('admin.bimbingan-karir');
     Route::resource('campus-hiring', AdminCampusHiringController::class)->names('admin.campus-hiring');
});

// Public Tracer Study routes (repurposed)
Route::get('/tracer', [TracerController::class, 'index'])->name('tracer.index');