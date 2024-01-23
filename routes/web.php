<?php

use App\Http\Controllers\CalonController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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
Route::post('/import-mahasiswa', [UserController::class,'importMahasiswa'])->name('Import Data Mahasiswa');
Route::post('/daftar-mahasiswa/{id}/edit', [UserController::class,'update'])->name('Update Data Mahasiswa');
Route::get('/daftar-mahasiswa/delete/{id}', [UserController::class,'destroy'])->name('Delete Data Mahasiswa');

Route::get('/daftar-mahasiswa-susulan', [HomeController::class,'susulan'])->name('Daftar Mahasiswa Susulan');
Route::post('/import-mahasiswa-susulan', [UserController::class,'importSusulan'])->name('Import Data Mahasiswa Susulan');
Route::post('/daftar-mahasiswa-susulan/{id}/edit', [UserController::class,'updateSusulan'])->name('Update Data Mahasiswa Susulan');
Route::post('/daftar-mahasiswa-susulan/verifikasi/{id}', [UserController::class,'verification'])->name('Verifikasi Data');
Route::get('/daftar-mahasiswa-susulan/delete/{id}', [UserController::class,'destroySusulan'])->name('Delete Data Mahasiswa Susulan');

Route::get('/daftar-calon', [HomeController::class,'calon'])->name('Daftar Calon');
Route::post('/daftar-calon-susulan/{id}/edit', [CalonController::class,'update'])->name('Update Data calon');
Route::get('/daftar-calon-susulan/delete/{id}', [CalonController::class,'destroy'])->name('Delete Data Calon');