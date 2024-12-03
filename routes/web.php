<?php


use App\Http\Controllers\Auth\{
    LoginFormController,
    ForgetPasswordController,
    LogoutController,
};
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Kepegawaian\TimeManagement\Dinas\{
    DashboardController as DinasController,
};
use App\Http\Controllers\Kepegawaian\TimeManagement\CutiController;
use App\Http\Controllers\TimeManagement\izin\{
    IzinController
};
use App\Http\Controllers\Asset\{
    ConfigurationController,
    MasterController as MasterController,
    TRNAssetController as TrnAssetController
    
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
                // 'index' => 'dinas.index',
                // 'create' => 'dinas.create',
                // 'show' => 'dinas.show',
                // 'store' => 'dinas-dashboard.store',
                // 'edit' => 'dinas-dashboard.edit',
                // 'update' => 'dinas-dashboard.update',
                // 'destroy' => 'dinas-dashboard.destroy',
            ]);
            Route::resource("/cuti", CutiController::class)->names(['index' => 'cuti.index']);
            Route::resource("/create", CutiController::class)->names(['index' => 'cuti.create']);
            Route::post('/submit-cuti', [CutiController::class, 'submitCuti'])->name('submit-cuti');
            Route::get("/dinas/{id}/cetak", [DinasController::class, 'cetak'])->name('dinas.cetak');
            Route::get("/dinas/{id}/cetakoperator", [DinasController::class, 'cetakoperator'])->name('dinas.cetakoperator');
            Route::get("/dinas/listoperator", [DinasController::class, 'listoperator'])->name('dinas.listoperator');
        });
    });

    // Asset Management System
    Route::prefix("configuration")->group(function () {
        Route::prefix("/menu")->group(function () {
            Route::get("/index", [ConfigurationController::class, 'index'])->name('configuration.menus.index');
        });
    });
    Route::prefix("master")->group(function () {
        Route::prefix("/type")->group(function () {
            Route::get("/index", [MasterController::class, 'index'])->name('master.type.index');
            Route::get('/create/{condition}', [MasterController::class, 'create'])->name('master.type.create'); // return master view with all of the master dataRoute::get("/create/{condition}")
            Route::post('/store/{condition}', [MasterController::class, 'store'])->name('master.type.store');//send a post request to the API for master_gcm table
            Route::get('/show/{condition}', [MasterController::class, 'show'])->name('master.type.show');//return master view with all of the master data
            Route::put('/update/{masterid}', [MasterController::class, 'update'])->name('master.type.update');//send a post request to the API for master_gcm table
        });
        Route::prefix("/user")->group(function () {
            Route::get("/index", [IzinController::class, 'index'])->name('master.user.index');
        });
    });
    Route::prefix("transaction")->group(function () {
        Route::prefix("/asset")->group(function () {
            Route::get("/index", [TrnAssetController::class, 'create'])->name('transaction.asset.index');

            Route::get('detail/laptop/{assetcode}', [TrnAssetController::class, 'show'])->name('transaction.asset.laptop');
        });        
        Route::prefix("/assign")->group(function () {
            Route::get("/index", [IzinController::class, 'index'])->name('transaction.assign.index');
        });        
        Route::prefix("/loan")->group(function () {
            Route::get("/index", [IzinController::class, 'index'])->name('transaction.loan.index');
        });
        Route::prefix("/maintenance")->group(function () {
            Route::get("/index", [IzinController::class, 'index'])->name('transaction.maintenance.index');
        });
    });

    // End Asset Management System

    Route::prefix("time-management")->group(function () {
        Route::prefix("/izin")->group(function () {
            Route::get("/index", [IzinController::class, 'index'])->name('time-management.izin.index');
            Route::get("/create", [IzinController::class, 'create'])->name('time-management.izin.create');
            Route::get('/show', [IzinController::class, 'show'])->name('time-management.izin.show');
            Route::post("/store", [IzinController::class, 'store'])->name('time-management.izin.store');
            Route::get("/edit", [IzinController::class, 'edit'])->name('time-management.izin.edit');
            Route::post("/batalPegawai", [IzinController::class, 'batalPegawai'])->name('time-management.izin.batalPegawai');
            Route::delete("/destroy", [IzinController::class, 'destroy'])->name('time-management.izin.destroy');
            Route::get('/getHistoryIzin', [IzinController::class, 'getHistoryIzin'])->name('time-management.izin.getHistoryIzin');
            Route::get('/getHistoryIzinAtasan', [IzinController::class, 'getHistoryIzinAtasan'])->name('time-management.izin.getHistoryIzinAtasan');
            Route::get('/cetakIzin', [IzinController::class, 'cetakIzin'])->name('time-management.izin.cetakIzin');
            Route::get('/getStatusIzin', [IzinController::class, 'getStatusIzin'])->name('time-management.izin.getStatusIzin');
            Route::get('/getPengajuanIzin', [IzinController::class, 'getPengajuanIzin'])->name('time-management.izin.getPengajuanIzin');
            Route::get('/show_tanggapi', [IzinController::class, 'show_tanggapi'])->name('time-management.izin.show_tanggapi');
            Route::post('/submit_tanggapi', [IzinController::class, 'submit_tanggapi'])->name('time-management.izin.submit_tanggapi');
            Route::get('/getApprovalIzin', [IzinController::class, 'getApprovalIzin'])->name('time-management.izin.getApprovalIzin');
            Route::get('/show_approvaldetail', [IzinController::class, 'show_approvaldetail'])->name('time-management.izin.show_approvaldetail');
            Route::post("/tolakPengajuanDinas", [IzinController::class, 'tolakPengajuanDinas'])->name('time-management.izin.tolakPengajuanDinas');
        });

        Route::prefix("/dinas")->group(function () {
            Route::get("/create", [DinasController::class, 'create'])->name('time-management.dinas.create');
            Route::get("/index", [DinasController::class, 'index'])->name('time-management.dinas.index');
            Route::get('/getHistoryDinas', [DinasController::class, 'getHistoryDinas'])->name('time-management.dinas.getHistoryDinas');
            Route::get('/getPengajuanDinas', [DinasController::class, 'getPengajuanDinas'])->name('time-management.izin.getPengajuanDinas');
            Route::get('/show_tanggapi_dinas', [DinasController::class, 'show_tanggapi_dinas'])->name('time-management.dinas.show_tanggapi_dinas');
            Route::post('/submit_tanggapi', [DinasController::class, 'submit_tanggapi'])->name('time-management.dinas.submit_tanggapi');
            Route::get('/getHistoryDinasAtasan', [DinasController::class, 'getHistoryDinasAtasan'])->name('time-management.dinas.getHistoryDinasAtasan');
            Route::get('/cetakDinas', [DinasController::class, 'cetakDinas'])->name('time-management.dinas.cetakDinas');







        });
    });

    Route::get('logout', [LogoutController::class, 'logout']);

    // Route::get('/cetak', [IzinController::class, 'cetakPresensi'])->name('time-management.izin.cetakPresensi');
});
