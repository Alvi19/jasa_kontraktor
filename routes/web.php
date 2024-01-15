<?php

use App\Http\Controllers\Admin\PembayaranController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\BangunanProgressController;
use App\Http\Controllers\BangunanTagihanController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ChattingController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormulirController;
use App\Http\Controllers\JasaController;
use App\Http\Controllers\KontraktorController;
use App\Http\Controllers\PenarikanSaldoKontraktorController;
use App\Http\Controllers\PenghasilanController;
use App\Http\Controllers\SewaController;
use App\Http\Controllers\SewaKontraktorController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// FORGOT PASSWORD
Route::get('/reset-password/{token}', [UserController::class, 'resetPassword'])->middleware('guest')->name('password.reset');
Route::post('/reset-password/{token}', [UserController::class, 'resetPasswordPost'])->middleware('guest')->name('password.update');

Route::get('/forgot-password', [UserController::class, 'forgotPassword'])->middleware('guest')->name('password.request');
Route::post('/forgot-password', [UserController::class, 'forgotPasswordPost'])->middleware('guest')->name('password.email');

// AUTH ROUTE
Route::middleware('guest')->group(function () {
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'loginPost']);
    Route::get('register', [UserController::class, 'register'])->name('auth.register');
    Route::post('register', [UserController::class, 'registerPost']);
    Route::get('/otp-verification', [UserController::class, 'otpVerification'])->name('otpVerification');
    Route::post('/otp-verification', [UserController::class, 'otpVerificationPost']);
});

// AFTER LOGIN
Route::middleware('auth:web')->group(function () {
    // LOGOUT
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    // DASHBOARD
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // CHAT FEATURE
    Route::resource('chat', ChatController::class);
    // Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
    // Route::get('/chat/{id}', [ChatController::class, 'show'])->name('chat.show');
    Route::post('/chat/{id}', [ChatController::class, 'send'])->name('chat.send');

    // SEWA FEATURE


    // CLIENT SEWA KONTRAKTOR
    Route::get('/sewakontraktor/detailkontraktor/{id}', [SewaKontraktorController::class,  'show'])->name('detailkontraktor');
    Route::resource('form', FormulirController::class);

    // DATA SEWA
    // - FOR CLIENT
    Route::prefix('/data-sewa')->as('data_sewa.')->group(function () {
        Route::resource('/', SewaController::class);

        Route::group(['prefix' => '{bangunan}'], function () {
            Route::resource('progress', BangunanProgressController::class);
            Route::resource('tagihan', BangunanTagihanController::class);
        });
    });
    // - FOR KONTRAKTOR
    Route::prefix('/data-client')->as('data_client.')->group(function () {
        Route::get('/', [SewaController::class, 'index'])->name('index');
        Route::get('/{bangunan}', [SewaController::class, 'show'])->name('show');
        Route::post('/{bangunan}', [SewaController::class, 'update'])->name('update');
        Route::put('/{bangunan}/reject', [SewaController::class, 'reject'])->name('reject');

        Route::group(['prefix' => '{bangunan}'], function () {
            Route::resource('progress', BangunanProgressController::class);
            Route::resource('tagihan', BangunanTagihanController::class);

            Route::get('tagihan/{tagihan}/pay', [BangunanTagihanController::class, 'pay'])->name('tagihan.pay');
            Route::get('tagihan/{tagihan}/pay-success', [BangunanTagihanController::class, 'paySuccess'])->name('tagihan.pay_success');
            Route::get('tagihan/{tagihan}/pay-failed', [BangunanTagihanController::class, 'payFailed'])->name('tagihan.pay_failed');

            Route::post('tagihan/{tagihan}/kirim', [BangunanTagihanController::class, 'kirim'])->name('tagihan.kirim');
        });
    });

    // KONTRAKTOR ONLY
    Route::resource('kontraktor', KontraktorController::class);
    Route::resource('jasa', JasaController::class);
    Route::prefix('penghasilan')
        ->as('penghasilan.')
        ->controller(PenghasilanController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
        });

    // CLIENT ONLY
    Route::resource('client', ClientController::class);
    Route::resource('sewakontraktor', SewaKontraktorController::class);
    Route::get('penarikan', [PenarikanSaldoKontraktorController::class, 'index'])->name('penarikan-kontraktor');
});

Route::prefix('/admin')->as('admin.')->group(function () {
    Route::post('/pembayaran/{penarikanSaldo}/tolak', [PembayaranController::class, 'tolak'])->name('pembayaran.tolak');
    Route::post('/pembayaran/{penarikanSaldo}', [PembayaranController::class, 'update'])->name('pembayaran.update');
    Route::resource('pembayaran', PembayaranController::class)->except(['update']);
});
