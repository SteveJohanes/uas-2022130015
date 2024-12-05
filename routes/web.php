<?php

use App\Http\Controllers\KategoriKursusController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PengajarController;
use App\Http\Controllers\MateriKursusController;
use App\Http\Controllers\PendaftaranKursusController;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\PembayaranKursusController;

Auth::routes();

Route::get('/', fn() => view('home'))->name('home');


Route::middleware(['auth', \App\Http\Middleware\RoleMiddleware::class . ':siswa'])->group(function () {
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('/materi/{id}', [SiswaController::class, 'show'])->name('materi.show');
    Route::get('/pendaftaran-kursus', [PendaftaranKursusController::class, 'create'])->name('pendaftaran.create');
    Route::post('/pendaftaran-kursus', [PendaftaranKursusController::class, 'store'])->name('pendaftaran.store');
    Route::resource('siswa', SiswaController::class);
    Route::get('/pembayaran', [PembayaranKursusController::class, 'index'])->name('pembayaran.index');
    Route::post('/pembayaran', [PembayaranKursusController::class, 'store'])->name('pembayaran.store');
});

Route::middleware(['auth', \App\Http\Middleware\RoleMiddleware::class . ':pengajar'])->group(function () {
    Route::get('/pengajar', [PengajarController::class, 'index'])->name('pengajar.index');
    Route::get('/materi-kursus', [MateriKursusController::class, 'index'])->name('materi-kursus.index');
    Route::post('/materi-kursus', [MateriKursusController::class, 'store'])->name('materi-kursus.store');
    Route::resource('pengajar', PengajarController::class);
    Route::resource('kursus', KursusController::class);
    Route::resource('materi-kursus', MateriKursusController::class);
    Route::resource('kategori-kursus', KategoriKursusController::class);
});
