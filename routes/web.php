<?php

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\JasaController;
use App\Http\Controllers\KontraktorController;
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

Route::get('register', [UserController::class, 'register'])->name('auth.register');
Route::post('register', [UserController::class, 'registerPost']);
Route::get('/', [UserController::class, 'login'])->name('auth.login');
Route::post('/', [UserController::class, 'loginPost']);



Route::resource('kontraktor', KontraktorController::class);
Route::resource('jasa', JasaController::class);
