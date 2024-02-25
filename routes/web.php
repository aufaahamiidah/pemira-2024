<?php

use App\Http\Controllers\CalonController;
use App\Http\Controllers\KelasController;
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

Route::middleware('guest')->group(function () {
    Route::get('/', [HomeController::class, 'welcome'])->name('Welcome To Pemira 2024');
    Route::get('/login', [UserController::class, 'index'])->name('login');
    Route::post('/authenticate', [UserController::class, 'authenticate'])->name('Authenticate');
    // Route::get('/signup', [UserController::class, 'register'])->name('Halaman Sign Up');
    // Route::post('/register', [UserController::class, 'store'])->name('Registrasi');

});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [UserController::class, 'logout'])->name('Logout');

    Route::get('/home', [HomeController::class,'index'])->name('home');

    // Routing Daftar Mahasiswa
    Route::get('/daftar-mahasiswa', [HomeController::class,'mahasiswa'])->name('Daftar Mahasiswa');
    Route::post('/import-mahasiswa', [UserController::class,'importMahasiswa'])->name('Import Data Mahasiswa');
    Route::post('/daftar-mahasiswa/{id}/edit', [UserController::class,'update'])->name('Update Data Mahasiswa');
    Route::get('/daftar-mahasiswa/delete/{id}', [UserController::class,'destroy'])->name('Delete Data Mahasiswa');

    // Routing Daftar Mahasiswa Susulan
    Route::get('/daftar-mahasiswa-susulan', [HomeController::class,'susulan'])->name('Daftar Mahasiswa Susulan');
    Route::post('/import-mahasiswa-susulan', [UserController::class,'importSusulan'])->name('Import Data Mahasiswa Susulan');
    Route::post('/daftar-mahasiswa-susulan/{id}/edit', [UserController::class,'updateSusulan'])->name('Update Data Mahasiswa Susulan');
    Route::post('/daftar-mahasiswa-susulan/verifikasi/{id}', [UserController::class,'verification'])->name('Verifikasi Data');
    Route::get('/daftar-mahasiswa-susulan/delete/{id}', [UserController::class,'destroySusulan'])->name('Delete Data Mahasiswa Susulan');

    // Daftar Calon Pemira
    Route::get('/daftar-calon', [HomeController::class,'calon'])->name('Daftar Calon');
    Route::post('/import-calon', [CalonController::class,'import'])->name('Import Data Calon');
    Route::post('/daftar-calon/{id}/edit', [CalonController::class,'update'])->name('Update Data Calon');
    Route::get('/daftar-calon/delete/{id}', [CalonController::class,'destroy'])->name('Delete Data Calon');

    // Daftar Kelas
    Route::get('/daftar-kelas', [KelasController::class, 'index'])->name('Daftar Kelas');
    Route::post('/import-kelas', [KelasController::class, 'store'])->name('Import Data Kelas');

    // Routing Pemilihan Raya 2024
    Route::get('/beranda', [HomeController::class, 'beranda'])->name('Beranda');
    Route::get('/upload-foto-mahasiswa', [HomeController::class,'uploadFoto'])->name('Upload Foto Mahasiswa');
    Route::post('/update-foto-mahasiswa', [UserController::class,'updateFoto'])->name('Update Foto Mahasiswa');
    // Routing Pemilihan Raya 2024 Himpunan
    Route::get('/pemilihan/hmj/{id}', [HomeController::class,'tampilHMJ'])->name('Pemilihan Ketua Himpunan Mahasiswa Jurusan');
    Route::post('/pemilihan/hmj/submit', [CalonController::class,'submitHMJ'])->name('submitHMJ');

    // Routing Pemilihan Raya 2024 BEM
    Route::get('/pemilihan/bem/{id}',[HomeController::class, 'tampilBEM'])->name('Pemilihan Presiden Mahasiswa');
    Route::post('/pemilihan/bem/submit', [CalonController::class, 'submitBEM'])->name('submitBEM');

    //Routing Pemilihan Raya 2024 BPM
    Route::get('/pemilihan/bpm/{id}', [HomeController::class, 'tampilBPM'])->name('Pemilihan Anggota Badan Perwakilan Mahasiswa');
    Route::post('/pemilihan/bpm/submit', [CalonController::class, 'submitBPM'])->name('submitBPM');

    Route::post('/pemilihan/submit', [CalonController::class, 'submitPilihan'])->name('submitPilihan');
});

