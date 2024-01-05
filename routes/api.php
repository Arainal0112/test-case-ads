<?php

use App\Http\Controllers\API\KaryawanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('karyawan/getTerbaru', [KaryawanController::class,'getTerbaru']);
Route::get('karyawan/getCuti', [KaryawanController::class,'getCuti']);
Route::get('karyawan/getSisaCuti', [KaryawanController::class,'getSisaCuti']);
Route::resource('karyawan', KaryawanController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
