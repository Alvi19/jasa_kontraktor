<?php

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ChattingController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataClientController;
use App\Http\Controllers\DataSewaController;
use App\Http\Controllers\FormulirController;
use App\Http\Controllers\GroupChatController;
use App\Http\Controllers\JasaController;
use App\Http\Controllers\KontraktorController;
use App\Http\Controllers\RiwayatController;
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

Route::get('/', [UserController::class, 'login'])->name('auth.login');
Route::post('/', [UserController::class, 'loginPost']);
Route::get('register', [UserController::class, 'register'])->name('auth.register');
Route::post('register', [UserController::class, 'registerPost']);
Route::get('/otp-verification', [UserController::class, 'otpVerification'])->name('otpVerification');
Route::post('/otp-verification', [UserController::class, 'otpVerificationPost']);

Route::resource('dashboard', DashboardController::class);
Route::resource('kontraktor', KontraktorController::class);
Route::resource('jasa', JasaController::class);
Route::resource('client', ClientController::class);
Route::resource('sewakontraktor', SewaKontraktorController::class);
Route::get('/sewakontraktor/detailkontraktor/{id}', [SewaKontraktorController::class,  'show'])->name('detailkontraktor');
Route::resource('form', FormulirController::class);
Route::resource('data_client', DataClientController::class);
Route::resource('data_sewa', DataSewaController::class);
Route::get('/data_sewa/{id}/sukses', [DataSewaController::class, 'suksesPayment'])->name('data_client.sukses');
Route::get('/data_sewa/{id}/post-sukses', [DataSewaController::class, 'postSuksesPayment'])->name('data_client.postSukses');
Route::get('/data_client/{id}/contractor-progress', [RiwayatController::class, 'index'])->name('data_client.contractor.progress');
Route::get('/data-client/{id}/progress/create', [RiwayatController::class, 'create'])->name('data_client.progress.create');
Route::post('/data-client/{id}/progress/create', [RiwayatController::class, 'store'])->name('data_client.progress.store');
Route::get('/data-client/{id}/progress/{idprogress}/edit', [RiwayatController::class, 'edit'])->name('data_client.progress.edit');
Route::put('/data-client/{id}/progress/{idprogress}/update', [RiwayatController::class, 'update'])->name('data_client.progress.update');
Route::delete('/data-client/{id}/progress/{idprogress}/delete', [RiwayatController::class, 'destroy'])->name('data_client.progress.destroy');
Route::resource('chat', ChatController::class);
Route::post('/chat/{id}', [ChatController::class, 'send'])->name('chat.send');
// Route::get('chat_list', [ChattingController::class, 'index'])->name('chat_list');
// Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
// Route::get('/chat/{id}', [ChatController::class, 'show'])->name('chat.show');
