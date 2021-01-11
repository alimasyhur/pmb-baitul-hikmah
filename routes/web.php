<?php

use App\Http\Controllers\PendaftarController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Yajra\DataTables\Facades\DataTables;

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
Route::get('/cetak-bukti-daftar', [PendaftarController::class, 'cetakBuktiDaftar'])->name('cetak-bukti-daftar');
Route::get('/generate-bukti-daftar', [PendaftarController::class, 'generateBuktiDaftar'])->name('generate-bukti-daftar');
Route::get('/preview-kartu-peserta', [PendaftarController::class, 'previewKartuPeserta'])->name('preview-kartu-peserta');
Route::get('/generate-kartu-peserta', [PendaftarController::class, 'generateKartuPeserta'])->name('generate-kartu-peserta');
Route::get('/pembayaran', [PendaftarController::class, 'pembayaran'])->name('pembayaran');
Route::post('/upload-pembayaran', [PendaftarController::class, 'uploadPembayaran'])->name('upload-pembayaran');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/jalur-masuk/create', [App\Http\Controllers\JalurMasukController::class, 'create'])->name('jalur-masuk.create');
Route::post('/admin/jalur-masuk/store', [App\Http\Controllers\JalurMasukController::class, 'store'])->name('jalur-masuk.store');
Route::patch('/admin/jalur-masuk/update/{id}', [App\Http\Controllers\JalurMasukController::class, 'update'])->name('jalur-masuk.update');
Route::get('/admin/jalur-masuk/edit/{id}', [App\Http\Controllers\JalurMasukController::class, 'edit'])->name('jalur-masuk.edit');
Route::get('/admin/jalur-masuk', [App\Http\Controllers\JalurMasukController::class, 'index'])->name('jalur-masuk.index');
Route::delete('/admin/jalur-masuk/delete/{id}', [App\Http\Controllers\JalurMasukController::class, 'destroy'])->name('jalur-masuk.delete');

Route::get('/admin/pendaftar/create', [App\Http\Controllers\JalurMasukController::class, 'create'])->name('jalur-masuk.create');
Route::post('/admin/pendaftar/store', [App\Http\Controllers\JalurMasukController::class, 'store'])->name('jalur-masuk.store');
Route::patch('/admin/pendaftar/update/{id}', [App\Http\Controllers\AdminPendaftarController::class, 'update'])->name('pendaftar.update');
Route::get('/admin/pendaftar/edit/{id}', [App\Http\Controllers\AdminPendaftarController::class, 'edit'])->name('pendaftar.edit');
Route::get('/admin/pendaftar/verifikasi-pembayaran/{id}', [App\Http\Controllers\AdminPendaftarController::class, 'verifikasiPembayaran'])->name('pendaftar.verifikasi-pembayaran');
Route::patch('/admin/pendaftar/update-pembayaran/{id}', [App\Http\Controllers\AdminPendaftarController::class, 'updatePembayaran'])->name('pendaftar.update-pembayaran');
Route::get('/admin/pendaftar', [App\Http\Controllers\AdminPendaftarController::class, 'index'])->name('pendaftar.index');
