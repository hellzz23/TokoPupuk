<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PupukController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('register', [RegisterController::class, 'index'])->name('register');

Route::post('register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'proses'])->name('login.proses'); 

Route::get('login/keluar',[LoginController::class, 'keluar'])->name('login.keluar');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

Route::get('/admin/pesanan', [PesananController::class, 'admin'])->name('pesanan.admin')->middleware('auth');

Route::resource('pupuk', PupukController::class)->middleware('auth');

Route::get('/pesan/{id}', [PesananController::class, 'create'])->name('pesanan.create')->middleware('auth');
Route::post('/pesan/{id}', [PesananController::class, 'store'])->name('pesanan.store')->middleware('auth');

Route::get('/riwayat', [PesananController::class, 'riwayat'])->name('riwayat.pesanan')->middleware('auth');

Route::get('/about', function () {
    return view('about');
})->name('about')->middleware('auth');
Route::get('/about', [AboutController::class, 'index'])->name('about')->middleware('auth');