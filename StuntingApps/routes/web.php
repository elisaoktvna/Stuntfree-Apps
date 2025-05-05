<?php

use App\Http\Controllers\AnakController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EdukasiController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\FaskesController;
use App\Http\Controllers\PengukuranController;
use App\Http\Controllers\PrediksiController;
use App\Http\Controllers\PaketGiziController;
use App\Http\Controllers\KecamatanController;
use App\Models\PaketGizi;

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

Route::get('/ortu', [OrtuController::class, 'index']);
Route::get('/addortu', [OrtuController::class, 'create']);
Route::post('/addortucreate', [OrtuController::class, 'store']);
Route::get('/editortu/{id}', [OrtuController::class, 'edit']);
Route::put('/update/{id}', [OrtuController::class, 'update']);


// route kecamatan
route::get('/kecamatan', [KecamatanController::class, 'index'])->name('kecamatan.index');
route::get('/addkecamatan', [KecamatanController::class, 'create'])->name('kecamatan.create');
route::post('/addkecamatancreate', [KecamatanController::class, 'store'])->name('kecamatan.store');
route::get('/kecamatan/edit/{kecamatan}', [KecamatanController::class, 'edit'])->name('kecamatan.edit');
route::put('/kecamatan/update/{kecamatan}', [KecamatanController::class, 'update'])->name('kecamatan.update');
route::delete('/kecamatan/delete{kecamatan}', [KecamatanController::class, 'destroy'])->name('kecamatan.destroy');

// route pengguna
Route::get('/orangtua', [OrtuController::class, 'index']);
Route::get('/addortu', [OrtuController::class, 'create']);
Route::post('/addortucreate', [OrtuController::class, 'store']);

// route anak
Route::get('/anak', [AnakController::class, 'index'])->name('anak.index');
Route::get('/addanak', [AnakController::class, 'create'])->name('anak.create');
Route::post('/addanakcreate', [AnakController::class, 'store'])->name('anak.store');
Route::get('/anak/edit/{anak}', [AnakController::class, 'edit'])->name('anak.edit');
Route::put('/anak/update/{anak}', [AnakController::class, 'update'])->name('anak.update');
Route::delete('/anak/delete/{anak}', [AnakController::class, 'destroy'])->name('anak.destroy');


// route edukasi
Route::get('/edukasi', [EdukasiController::class, 'index'])->name('edukasi.index');
Route::get('/edukasi/create', [EdukasiController::class, 'create'])->name('edukasi.create'); // Menampilkan form tambah edukasi
Route::post('/edukasi', [EdukasiController::class, 'store'])->name('edukasi.store'); // Menyimpan data edukasi baru
Route::get('edukasi/edit/{id}', [EdukasiController::class, 'edit'])->name('edukasi.edit');
Route::put('edukasi/update/{id}', [EdukasiController::class, 'update'])->name('edukasi.update');
Route::delete('/edukasi/{id}', [EdukasiController::class, 'destroy'])->name('edukasi.destroy');


// route pengukuran
Route::get('/pengukuran', [PengukuranController::class, 'index']);
Route::get('/addpengukuran', [PengukuranController::class, 'create']);

// route prediksi
Route::get('/prediksi', [PrediksiController::class, 'index']);
Route::get('/addprediksi', [PrediksiController::class, 'create']);

// route rekomendasi
Route::get('/rekomendasi', [RekomendasiController::class, 'index']);
Route::get('/addrekomendasi', [RekomendasiController::class, 'create']);
