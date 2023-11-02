<?php

use App\Http\Controllers\AreaKerjaController;
use App\Http\Controllers\KriteriaPenilaianController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(PegawaiController::class)->group(function() {
    Route::get('pegawai/posisi/{id}', 'getPegawaiByPosisiId');
});

Route::controller(KriteriaPenilaianController::class)->group(function() {
    Route::get('kriteria/area/{id}', 'getKriteriaByAreaId');
    Route::get('kriteria/posisi/{id}', 'getKriteriaByPosisiId');
});

Route::controller(AreaKerjaController::class)->group(function() {
    Route::get('area-kerja/posisi/{id}', 'getAreaKerjaByPosisiId');
});
