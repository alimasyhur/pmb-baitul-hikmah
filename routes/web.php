<?php

use App\Http\Controllers\PendaftarController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PendaftarController::class, 'home'])->name('home');
Route::post('/daftar', [PendaftarController::class, 'daftar'])->name('daftar');
Route::post('/status-daftar', [PendaftarController::class, 'statusDaftar'])->name('status-daftar');
Route::get('/success-daftar', [PendaftarController::class, 'successDaftar'])->name('success-daftar');
Route::get('/check-status', [PendaftarController::class, 'checkStatus'])->name('check-status');
Route::get('/pendaftar-login', [PendaftarController::class, 'pendaftarLogin'])->name('pendaftar-login');
Route::get('/pendaftar-logout', [PendaftarController::class, 'pendaftarLogout'])->name('pendaftar-logout');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
