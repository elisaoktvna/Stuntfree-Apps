<?php

use App\Http\Controllers\AnakController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EdukasiController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PengukuranController;
use App\Http\Controllers\PrediksiController;
use App\Http\Controllers\RekomendasiController;

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

Route::get('/dashboard', [DashboardController::class, 'index']);


// route pengguna
Route::get('/pengguna', [PenggunaController::class, 'index']);
Route::get('/addpengguna', [PenggunaController::class, 'create']);

// route anak
Route::get('/anak', [AnakController::class, 'index']);
Route::get('/addanak', [AnakController::class, 'create']);

// route edukasi
Route::get('/edukasi', [EdukasiController::class, 'index']);
Route::get('/addedukasi', [EdukasiController::class, 'create']);

// route pengukuran
Route::get('/pengukuran', [PengukuranController::class, 'index']);
Route::get('/addpengukuran', [PengukuranController::class, 'create']);

// route prediksi
Route::get('/prediksi', [PrediksiController::class, 'index']);
Route::get('/addprediksi', [PrediksiController::class, 'create']);

// route rekomendasi
Route::get('/rekomendasi', [RekomendasiController::class, 'index']);
Route::get('/addrekomendasi', [RekomendasiController::class, 'create']);
