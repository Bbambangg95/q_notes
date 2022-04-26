<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\HafalanController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('/santri', SantriController::class);
Route::resource('/absensi', AbsensiController::class);
Route::resource('/hafalan', HafalanController::class);


Route::post('/hafalan/storeLama', HafalanController::class. '@storeLama');
Route::resource('absensi.id', AbsensiController::class);
Route::post('/absensi/edit', AbsensiController::class. '@view_edit');
Route::post('/absensi/create', AbsensiController::class. '@view_create');
Route::post('/absensi/view_absen', AbsensiController::class. '@view_absen');


Route::post('/hafalan/create',HafalanController::class. '@create');
Route::get('/riwayat',HafalanController::class. '@riwayat');
