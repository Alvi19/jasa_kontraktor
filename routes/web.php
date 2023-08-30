<?php

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

Route::get('/', function () {
    return view('layouts.app');
});


Route::get('kontraktor', [KontraktorController::class, 'index'])->name('kontraktor.index');
Route::resource('jasa', JasaController::class);
