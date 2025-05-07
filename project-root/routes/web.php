<?php

//use App\Http\Controllers\HalamanController;
//use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormMahasiswaController;
use App\Http\Controllers\DisplayNilaiController;
use App\Http\Controllers\FormDosenController;
use App\Http\Controllers\DisplayDosenController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\NilaiController;

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
//127.0.0.1:8000/ ==> view welcome
Route::get('/', [DashboardController::class,'index']);
Route::get('/form-mahasiswa', [FormMahasiswaController::class,'index']);
Route::get('/login-dosen', [FormDosenController::class,'index']);
Route::get('/display-nilai/{npm}', [MahasiswaController::class,'showNilai']);



Route::get('/display-mahasiswa', [MahasiswaController::class,'index'])->name('display.mahasiswa');
Route::get('/login-mahasiswa', [FormMahasiswaController::class, 'loginForm'])->name('login.mahasiswa.index');
Route::post('/login-mahasiswa', [FormMahasiswaController::class, 'login'])->name('login.mahasiswa');


// Dosen
Route::post('/login-dosen', [FormDosenController::class, 'login'])->name('dosen.login');

Route::get('/display-dosen', [DisplayDosenController::class,'index'])->name('display.dosen');
Route::get('/mata-kuliah', [MataKuliahController::class,'index']);

Route::get('matkul-dosen', [MataKuliahController::class, 'matkulDosen'])->name('dosen.matkul');
Route::delete('matkul-dosen/{id}', [MataKuliahController::class, 'destroy'])->name('dosen.matkul.destroy');
Route::put('matkul-dosen/{id}', [MataKuliahController::class, 'update'])->name('dosen.matkul.update');

Route::post('matkul-dosen', [MataKuliahController::class, 'store'])->name('dosen.matkul.store');
Route::get('/form-mahasiswa', [FormMahasiswaController::class, 'index'])->name('form.mahasiswa');
Route::post('/form-mahasiswa/store', [FormMahasiswaController::class, 'store'])->name('form.mahasiswa.store');
Route::get('/nilai-mahasiswa', [NilaiController::class, 'index'])->name('dosen.nilai-mahasiswa.index');
Route::post('/nilai-mahasiswa/tambah', [NilaiController::class, 'store'])->name('dosen.nilai-mahasiswa.store');

Route::delete('/nilai-mahasiswa/{id}', [NilaiController::class, 'destroy'])->name('dosen.nilai-mahasiswa.destroy');

Route::put('/nilai-mahasiswa/{id}', [NilaiController::class, 'update'])->name('dosen.nilai-mahasiswa.update');

