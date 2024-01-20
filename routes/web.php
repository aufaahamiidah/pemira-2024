<?php

use App\Http\Controllers\HomeController;
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

Route::get('/home', [HomeController::class,'index'])->name('home');
Route::get('/daftar-mahasiswa', [HomeController::class,'mahasiswa'])->name('Daftar Mahasiswa');
Route::get('/daftar-mahasiswa-susulan', [HomeController::class,'susulan'])->name('Daftar Mahasiswa Susulan');
Route::get('/daftar-calon', [HomeController::class,'calon'])->name('Daftar Calon');
