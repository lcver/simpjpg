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
        Route::get('logout', 'logout');
        
        Route::get('change-password', 'changePassword');
        Route::post('change-password', 'processChangePassword');
    });
});

Route::controller(DashboardController::class)->middleware('auth')->group(function() {
    Route::get('dashboard', 'index')->name('dashboard');
});

Route::controller(PenilaianController::class)->middleware('auth')->group(function() {
    Route::get('penilaian', 'index')->name('penilaian');
    Route::get('penilaian/detail/{id}', 'detail')->name('penilaian.detail');
    Route::get('penilaian/destroy/{id}', 'destroy')->name('penilaian.destroy');
    Route::post('penilaian/store', 'store')->name('penilaian.store');
});

Route::controller(KriteriaPenilaianController::class)->middleware('auth')->group(function() {
    Route::get('kriteria-penilaian', 'index')->name('kriteriapenilaian');
    Route::get('kriteria-penilaian/add', 'create')->name('kriteriapenilaian.create');
    Route::get('kriteria-penilaian/edit/{id}', 'edit')->name('kriteriapenilaian.edit');
    Route::post('kriteria-penilaian/store', 'store')->name('kriteriapenilaian.store');
    Route::post('kriteria-penilaian/update/{id}', 'update')->name('kriteriapenilaian.update');
    Route::get('kriteria-penilaian/delete/{id}', 'destroy')->name('kriteriapenilaian.destroy');
});

Route::controller(AreaKerjaController::class)->middleware('auth')->group(function() {
    Route::get('area-kerja', 'index')->name('areakerja');
    Route::get('area-kerja/add', 'create')->name('areakerja.create');
    Route::get('area-kerja/edit/{id}', 'edit')->name('areakerja.edit');
    Route::post('area-kerja/store', 'store')->name('areakerja.store');
    Route::post('area-kerja/update/{id}', 'update')->name('areakerja.update');
    Route::get('area-kerja/delete/{id}', 'destroy')->name('areakerja.destroy');
});

Route::controller(GedungKemenkesController::class)->middleware('auth')->group(function() {
    Route::get('kemenkes', 'index')->name('gedungkemenkes');
    Route::get('kemenkes/add', 'create')->name('gedungkemenkes.create');
    Route::get('kemenkes/edit/{id}', 'edit')->name('gedungkemenkes.edit');
    Route::post('kemenkes/store', 'store')->name('gedungkemenkes.store');
    Route::post('kemenkes/update/{id}', 'update')->name('gedungkemenkes.update');
    Route::get('kemenkes/delete/{id}', 'destroy')->name('gedungkemenkes.delete');
});

Route::controller(UnitUtamaController::class)->middleware('auth')->group(function() {
    Route::get('unit-utama', 'index')->name('unitutama');
    Route::get('unit-utama/add', 'create')->name('unitutama.create');
    Route::get('unit-utama/edit/{id}', 'edit')->name('unitutama.edit');
    Route::post('unit-utama/store', 'store')->name('unitutama.store');
    Route::post('unit-utama/update/{id}', 'update')->name('unitutama.update');
    Route::get('unit-utama/delete/{id}', 'destroy')->name('unitutama.delete');
});

Route::controller(UnitKerjaController::class)->middleware('auth')->group(function() {
    Route::get('unit-kerja', 'index')->name('unitkerja');
    Route::get('unit-kerja/add', 'create')->name('unitkerja.create');
    Route::get('unit-kerja/edit/{id}', 'edit')->name('unitkerja.edit');
    Route::post('unit-kerja/store', 'store')->name('unitkerja.store');
    Route::post('unit-kerja/update/{id}', 'update')->name('unitkerja.update');
    Route::get('unit-kerja/delete/{id}', 'destroy')->name('unitkerja.delete');
});

Route::controller(PegawaiController::class)->middleware('auth')->group(function() {
    Route::get('pegawai', 'index')->name('pegawai');
    Route::get('pegawai/add', 'create')->name('pegawai.create');
    Route::get('pegawai/edit/{id}', 'edit')->name('pegawai.edit');
    Route::post('pegawai/store', 'store')->name('pegawai.store');
    Route::post('pegawai/update/{id}', 'update')->name('pegawai.update');
    Route::get('pegawai/delete/{id}', 'destroy')->name('pegawai.destroy');
});

Route::controller(PenggunaController::class)->middleware('auth')->group(function() {
    Route::get('pengguna', 'index')->name('pengguna');
    Route::get('pengguna/add', 'create')->name('pengguna.create');
    Route::get('pengguna/edit/{id}', 'edit')->name('pengguna.edit');
    Route::post('pengguna/store', 'store')->name('pengguna.store');
    Route::post('pengguna/update/{id}', 'update')->name('pengguna.update');
    Route::get('pengguna/delete/{id}', 'destroy')->name('pengguna.destroy');
});

Route::controller(PenyediaController::class)->middleware('auth')->group(function() {
    Route::get('penyedia', 'index')->name('penyedia');
    Route::get('penyedia/add', 'create')->name('penyedia.create');
    Route::get('penyedia/edit/{id}', 'edit')->name('penyedia.edit');
    Route::post('penyedia/store', 'store')->name('penyedia.store');
    Route::post('penyedia/update/{id}', 'update')->name('penyedia.update');
    Route::get('penyedia/delete/{id}', 'destroy')->name('penyedia.destroy');
});