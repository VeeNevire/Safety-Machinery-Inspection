<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MesinController;
use App\Http\Controllers\OplController;
use App\Http\Controllers\OmobController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\NotificationController;

// Auth routes
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/cek-login', [LoginController::class, 'login'])->name('cek-login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin routes (authenticated)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Master Data
    Route::resource('mesin', MesinController::class);
    Route::get('/mesin/export', [LaporanController::class, 'exportExcel'])->name('mesin.export');
    Route::post('/mesin/by-lokasi-department', [MesinController::class, 'byLokasiDepartment'])->name('mesin.byLokasiDepartment');
    Route::resource('opl', OplController::class);
    Route::resource('omob', OmobController::class);

    // Users (admin only)
    Route::resource('pengguna', PenggunaController::class)->middleware('level:admin');

    // Area
    Route::resource('lokasi', LokasiController::class);
    Route::resource('department', DepartmentController::class);
    Route::get('/department-by-lokasi', [DepartmentController::class, 'getByLokasi'])->name('department.by-lokasi');

    // Agenda
    Route::resource('agenda', AgendaController::class);
    Route::get('/agenda/events', [AgendaController::class, 'events'])->name('agenda.events');
    Route::post('/agenda/update-status', [AgendaController::class, 'updateStatus'])->name('agenda.updateStatus');

    // Notifications
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');

    // Riwayat
    Route::get('/riwayat/{no_mesin}', [RiwayatController::class, 'index'])->name('riwayat.mesin');
    Route::get('/riwayat', [RiwayatController::class, 'all'])->name('riwayat.index');
    Route::post('/riwayat/fetch', [RiwayatController::class, 'fetch'])->name('riwayat.fetch');

    // Scan
    Route::get('/scan', [ScanController::class, 'show'])->name('scan.index');
    Route::get('/scan/{no_mesin}', [ScanController::class, 'show'])->name('scan.show');

    // Laporan
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/export-excel', [LaporanController::class, 'exportExcel'])->name('laporan.excel');
    Route::get('/laporan/export-pdf', [LaporanController::class, 'exportPdf'])->name('laporan.pdf');
});
