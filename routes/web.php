<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PenyediaController;
use App\Http\Controllers\AreaKerjaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\UnitKerjaController;
use App\Http\Controllers\UnitUtamaController;
use App\Http\Controllers\GedungKemenkesController;
use App\Http\Controllers\KriteriaPenilaianController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function() {

    Route::middleware('guest')->group(function() {
        Route::get('login', 'index')->name('login');
        Route::post('login','authentication');

        Route::get('forgotpassword', 'forgotPassword')->name('password.request');
        Route::post('forgotpassword', 'updatePassword')->name('password.email');
        Route::get('resetpassword/{token}', 'resetToken')->name('password.reset');
        Route::post('resetpassword', 'resetPassword')->name('password.update');
    });
    
    Route::middleware('auth')->group(function() {
        Route:: get('logout', 'logout');
        
        Route::get('change-password', 'changePassword');
        Route::post('change-password', 'processChangePassword');
    });
});

Route::controller(DashboardController::class)->group(function() {
    Route:: get('dashboard', 'index')->name('dashboard');
})->middleware('auth');

Route::controller(PenilaianController::class)->group(function() {
    Route:: get('penilaian', 'index')->name('penilaian');
})->middleware('auth');

Route::controller(KriteriaPenilaianController::class)->group(function() {
    Route:: get('kriteria penilaian', 'index')->name('kriteriapenilaian');
    Route:: get('kriteria-add', 'create');
    Route:: post('kriteria', 'store');
})->middleware('auth');

Route::controller(AreaKerjaController::class)->group(function() {
    Route:: get('area-kerja', 'index')->name('areakerja');
    Route:: get('area-add', 'create');
    Route:: post('area-kerja', 'store');
})->middleware('auth');

Route::controller(GedungKemenkesController::class)->group(function() {
    Route:: get('gedung kemenkes','index')->name('gedungkemenkes');
})->middleware('auth');

Route::controller(UnitUtamaController::class)->group(function() {
    Route::get('unit utama', 'index')->name('unitutama');
})->middleware('auth');

Route::controller(UnitKerjaController::class)->group(function() {
    Route::get('unit kerja', 'index')->name('unitkerja');
})->middleware('auth');

Route::controller(PegawaiController::class)->group(function() {
    Route::get('pegawai', 'index')->name('pegawai');
    Route::get('pegawai-add', 'create');
    Route:: post('pegawai', 'store');
})->middleware('auth');

Route::controller(PenggunaController::class)->group(function() {
    Route::get('pengguna', 'index')->name('pengguna');
})->middleware('auth');

Route::controller(PenyediaController::class)->group(function() {
    Route:: get('penyedia', 'index')->name('penyedia');
})->middleware('auth');