<?php

use App\Http\Controllers\DashboardAdminC;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RawatController;
use App\Http\Controllers\SuratPasienController;
use App\Http\Controllers\TransaksiAdminPdfC;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TransaksiPdfController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Role : 
| Admin : CRUD 
| 
|
*/



Route::get('/', [DashboardAdminC::class, 'index'])->name('root.index')->middleware('auth');
Route::get('/dashboard', [DashboardAdminC::class, 'index'])->name('root.index')->middleware('auth');

Route::get('/informasi', function () {
    $title = "Informasi Pages";
    return view('info' , compact('title'));
});
Route::get('/pdf', function () {
    $title = "PDF Transaksi Pages";
    return view('viewtransaksiadmin' , compact('title'));
});

Route::get('/generate-pdf', [TransaksiAdminPdfC::class, 'generatePdf'])->name('generate.pdf');

// ADMIN DAN DOKTER
Route::middleware(['UserAkses:admin,dokter'])->group(function () {
    Route::get('pasien', [PasienController::class, 'index'])->name('pasien.index');
    Route::get('pasien/create', [PasienController::class, 'create'])->name('pasien.create');
    Route::post('pasien/store', [PasienController::class, 'store'])->name('pasien.store');
    Route::get('pasien/{id}/edit', [PasienController::class, 'edit'])->name('pasien.edit');
    Route::put('pasien/update/{id}', [PasienController::class, 'update'])->name('pasien.update');
    Route::delete('pasien/destroy/{id}', [PasienController::class, 'destroy'])->name('pasien.destroy');
    Route::get('pasien/pdf/{id}', [SuratPasienController::class,'pdf'])->name('pasien.pdf');
});

// ADMIN DAN FARMASI
Route::middleware(['UserAkses:admin,farmasi'])->group(function () {
    Route::get('obat', [ObatController::class, 'index'])->name('obat.index');
    Route::get('obat/create', [ObatController::class, 'create'])->name('obat.create');
    Route::post('obat/store', [ObatController::class, 'store'])->name('obat.store');
    Route::get('obat/{id}/edit', [ObatController::class, 'edit'])->name('obat.edit');
    Route::put('obat/{id}/update', [ObatController::class, 'update'])->name('obat.update');
    Route::delete('obat/destroy/{id}', [ObatController::class, 'destroy'])->name('obat.destroy');
});

// ADMIN DAN KASIR
Route::middleware(['UserAkses:admin,kasir'])->group(function () {
    Route::get('transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
    Route::post('transaksi/store',[TransaksiController::class,'store'])->name('transaksi.store');
    Route::get('transaksi/{id}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit');
    Route::put('transaksi/update/{id}', [TransaksiController::class, 'update'])->name('transaksi.update');
    Route::delete('transaksi/destroy/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');
    Route::get('transaksi/pdf/{id}', [TransaksiPdfController::class,'pdf'])->name('transaksi.pdf');
});

// ADMIN
Route::middleware(['UserAkses:admin'])->group(function () {
    Route::get('rawat', [RawatController::class, 'index'])->name('rawat.index');
    Route::get('rawat/create', [RawatController::class, 'create'])->name('rawat.create');
    Route::post('rawat/store', [RawatController::class, 'store'])->name('rawat.store');
    Route::get('rawat/{id}/edit', [RawatController::class, 'edit'])->name('rawat.edit');
    Route::put('rawat/update/{id}', [RawatController::class, 'update'])->name('rawat.update');
    Route::delete('rawat/destroy/{id}', [RawatController::class, 'destroy'])->name('rawat.destroy');

    Route::get('user', [UserController::class, 'index'])->name('user.index');
    Route::get('user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    Route::get('user/changepassword/{id}',[UserController::class,'changepassword'])->name('user.changepassword');
    Route::put('user/change/{id}',[UserController::class,'change'])->name('user.change');

});

// ALL ROLE
Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');

Route::get('login', [LoginController::class,'login'])->name('login');
Route::post('login', [LoginController::class,'login_action'])->name('login.action');

Route::get('logout', [LoginController::class,'logout'])->name('logout');

Route::get('log',[LogController::class,'index'])->name('log.index');

