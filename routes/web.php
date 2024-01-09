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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/siswa', [App\Http\Controllers\SiswaController::class, 'index']);
Route::get('/siswa/create', [App\Http\Controllers\SiswaController::class, 'create']);
Route::post('/siswa', [App\Http\Controllers\SiswaController::class, 'store']);
Route::get('/siswa/edit/{id}', [App\Http\Controllers\SiswaController::class, 'edit']);
Route::patch('/siswa/{id}', [App\Http\Controllers\SiswaController::class, 'update']);
Route::delete('/siswa/{id}', [App\Http\Controllers\SiswaController::class, 'destroy']);
Route::get('/siswa/cari', [App\Http\Controllers\SiswaController::class, 'cari']);

Route::get('/kegiatan', [App\Http\Controllers\KegiatanController::class, 'index']);
Route::get('/kegiatan/create', [App\Http\Controllers\KegiatanController::class, 'create']);
Route::post('/kegiatan', [App\Http\Controllers\KegiatanController::class, 'store']);
Route::get('/kegiatan/edit/{id}', [App\Http\Controllers\KegiatanController::class, 'edit']);
Route::patch('/kegiatan/{id}', [App\Http\Controllers\KegiatanController::class, 'update']);
Route::delete('/kegiatan/{id}', [App\Http\Controllers\KegiatanController::class, 'destroy']);
Route::get('/kegiatan/cari', [App\Http\Controllers\KegiatanController::class, 'cari']);

Route::get('/absensi', [App\Http\Controllers\AbsensiController::class, 'index']);
Route::get('/absensi/create', [App\Http\Controllers\AbsensiController::class, 'create']);
Route::post('/absensi', [App\Http\Controllers\AbsensiController::class, 'store']);
Route::get('/absensi/edit/{id}', [App\Http\Controllers\AbsensiController::class, 'edit']);
Route::patch('/absensi/{id}', [App\Http\Controllers\AbsensiController::class, 'update']);
Route::delete('/absensi/{id}', [App\Http\Controllers\AbsensiController::class, 'destroy']);
Route::get('/absensi/cari', [App\Http\Controllers\AbsensiController::class, 'cari']);