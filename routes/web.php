<?php

use App\Http\Controllers\CutiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('karyawan/getTerbaru', [KaryawanController::class,'getTerbaru'])->name('karyawan.terbaru');
Route::get('karyawan/getSisaCuti', [KaryawanController::class,'getSisaCuti'])->name('cuti.sisaCuti');

Route::resource('karyawan', KaryawanController::class);
Route::resource('cuti', CutiController::class);

