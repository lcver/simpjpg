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

Route::get('login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('login',[AuthController::class, 'authentication'])->middleware('guest');
Route::get('forgotpassword', function () {
    return view('auth.forgotpassword');
})->middleware('guest')->name('password.request');

Route::post('forgotpassword', function (Request $request) {
    $request->validate(['email' => 'required|email']);
    Alert::success('We have emailed your password reset link.');
    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('resetpassword/{token}', function (string $token) {
    return view('auth.resetpassword', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('resetpassword', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user,$password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

Route:: get('logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('change-password', [AuthController::class, 'changePassword'])->middleware('auth');
Route::post('change-password', [AuthController::class, 'processChangePassword'])->middleware('auth');

Route:: get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route:: get('penilaian', [PenilaianController::class, 'index'])->name('penilaian')->middleware('auth');

Route:: get('kriteria penilaian', [KriteriaPenilaianController::class, 'index'])->name('kriteriapenilaian')->middleware('auth');
Route:: get('kriteria-add', [KriteriaPenilaianController::class, 'create'])->middleware('auth');
Route:: post('kriteria',[KriteriaPenilaianController::class, 'store'])->middleware('auth');

Route:: get('area-kerja', [AreaKerjaController::class, 'index'])->name('areakerja')->middleware('auth');
Route:: get('area-add', [AreaKerjaController::class, 'create'])->middleware('auth');
Route:: post('area-kerja', [AreaKerjaController::class, 'store'])->middleware('auth');

Route:: get('gedung kemenkes',[GedungKemenkesController::class, 'index'])->name('gedungkemenkes')->middleware('auth');

Route::get('unit utama',[UnitUtamaController::class, 'index'])->name('unitutama')->middleware('auth');

Route::get('unit kerja', [UnitKerjaController::class, 'index'])->name('unitkerja')->middleware('auth');


Route::get('pegawai', [PegawaiController::class, 'index'])->name('pegawai')->middleware('auth');
Route::get('pegawai-add', [PegawaiController::class, 'create'])->middleware('auth');
Route:: post('pegawai',[PegawaiController::class, 'store'])->middleware('auth');

Route::get('pengguna', [PenggunaController::class, 'index'])->name('pengguna')->middleware('auth');

Route:: get('penyedia', [PenyediaController::class, 'index'])->name('penyedia')->middleware('auth');