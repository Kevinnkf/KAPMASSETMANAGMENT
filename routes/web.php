<?php

use App\Http\Controllers\Auth\{
    LoginFormController,
    ForgetPasswordController,
    LogoutController,
};
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Kepegawaian\AsesmenPekerja\AsesmenMultirater360\{
    DashboardController as AsesmenMultirater360DashboardController,
    IndikatorKompetensiController,
    PeriodeAsesmenController,
    SkorRekomendasiController
};
use App\Http\Controllers\Kepegawaian\TimeManagement\Dinas\{
    DashboardController as DinasController,
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

Route::resource("/", HomeController::class)->names(['index' => 'landing-page.index']);

Route::middleware(['user-auth'])->group(function () {
    Route::prefix("dashboard")->group(function () {
        Route::get("", [DashboardController::class, 'index'])->name('dashboard.index');
    });

    Route::prefix("kepegawaian")->group(function () {
        Route::prefix("time-management")->group(function () {
            Route::resource("/dinas", DinasController::class)->names([
                'index' => 'dinas.index',
                'create' => 'dinas.create',
                'show' => 'dinas.show',
                // 'store' => 'dinas-dashboard.store',
                // 'edit' => 'dinas-dashboard.edit',
                // 'update' => 'dinas-dashboard.update',
                // 'destroy' => 'dinas-dashboard.destroy',
            ]);
        });
        Route::get("/dinas/{id}/cetak", [DinasController::class, 'cetak'])->name('dinas.cetak');
        Route::get("/dinas/{id}/cetakoperator", [DinasController::class, 'cetakoperator'])->name('dinas.cetakoperator');
        
        Route::get("/dinas/listoperator", [DinasController::class, 'listoperator'])->name('dinas.listoperator');
        
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
