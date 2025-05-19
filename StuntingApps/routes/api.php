<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\api\AnakApiController;
use App\Http\Controllers\KecamatanApiController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/anak', [AnakApiController::class, 'index']);
Route::post('/anak', [AnakApiController::class, 'store']);
Route::get('/anak/{id}', [AnakApiController::class, 'show']);
Route::put('/anak/{id}', [AnakApiController::class, 'update']);
Route::delete('/anak/{id}', [AnakApiController::class, 'destroy']);

// login
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// kecamatan
Route::get('/kecamatan', [KecamatanApiController::class, 'index']);

