<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('jurusan', JurusanController::class)->except(['show']);
    Route::resource('mahasiswa', MahasiswaController::class)->except(['show']);
    Route::resource('matakuliah', MatakuliahController::class)->except(['show']);
});

// simple route to home when authenticated
Route::get('/home', function () {
    return redirect()->route('dashboard');
})->middleware('auth');

// proteksi halaman mahasiswa
Route::middleware('auth')->group(function () {

    Route::get('/mahasiswa/export-csv', [MahasiswaController::class, 'exportCsv'])->name('mahasiswa.exportCsv');
    Route::get('/mahasiswa/print', [MahasiswaController::class, 'print'])->name('mahasiswa.print');
    Route::get('/jurusan/export-excel', [JurusanController::class, 'exportExcel'])->name('jurusan.exportExcel');
    Route::get('/jurusan/export-pdf', [JurusanController::class, 'exportPdf'])->name('jurusan.exportPdf');
    Route::resource('mahasiswa', MahasiswaController::class);
});