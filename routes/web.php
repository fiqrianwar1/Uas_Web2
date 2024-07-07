<?php

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
    return view('welcome');
});

//route resource
Route::resource('/mahasiswas', \App\Http\Controllers\MahasiswaController::class);
Route::resource('/makuls', \App\Http\Controllers\MakulController::class);
Route::resource('/nilais', \App\Http\Controllers\NilaiController::class);
Route::resource('/dosens', \App\Http\Controllers\DosenController::class);
