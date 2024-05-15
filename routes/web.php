<?php

use App\Http\Controllers\Auth\{
    LoginFormController,
    ForgetPasswordController,
    LogoutController,
};
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Kepegawaian\AsesmenPekerja\AsesmenMultirater360\{
    DashboardController as AsesmenMultirater360DashboardController,
    IndikatorKompetensiController,
    PeriodeAsesmenController,
    SkorRekomendasiController
};
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::post('/login-form', [LoginFormController::class, 'authenticate'])->name('login-form');
Route::get('/forget-password', [ForgetPasswordController::class, 'showResetPasswordForm'])->name('forget-password');
Route::post('/reset-lupa-password', [ForgetPasswordController::class, 'postResetPassword'])->name('forget-password.reset');
Route::post('/lupa-password-otp', [ForgetPasswordController::class, 'postResetPasswordOtp'])->name('forget-password.reset-otp');
Route::get('/change-password-form', [ForgetPasswordController::class, 'showChangePasswordForm'])->name('forget-password.change-password-form');
Route::post('/change-password', [ForgetPasswordController::class, 'postChangePassword'])->name('forget-password.change-password');

Auth::routes(['verify' => true]);

Route::middleware(['user-auth'])->group(function () {
    Route::resource("/", DashboardController::class)->names(['index' => 'dashboard.index']);

    Route::prefix("kepegawaian")->group(function () {
        Route::prefix("time-management")->group(function () {
        });

        Route::prefix("asesmen-pekerja")->group(function () {
            Route::prefix("asesmen-multirater-360")->group(function () {
                Route::resource("/", AsesmenMultirater360DashboardController::class)->names(['index' => 'asesmen-multirater-360-dashboard.index']);
                Route::resource("/indikator-kompetensi", IndikatorKompetensiController::class)->names(['index' => 'asesmen-multirater-360-indikator-kompetensi.index']);
                Route::resource("/variabel-skor-rekomendasi", SkorRekomendasiController::class)->names(['index' => 'asesmen-multirater-360-skor-rekomendasi.index']);
                Route::resource("/periode-asesmen", PeriodeAsesmenController::class)->names(['index' => 'asesmen-multirater-360-periode-asesmen.index']);
            });
        });
    });


    Route::get('logout', [LogoutController::class, 'logout']);
});
