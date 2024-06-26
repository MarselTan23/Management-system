<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\IuranController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\ListlatihanController;
use App\Http\Controllers\PembayaranController;

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

Route::get('/',[AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/postlogin',[AuthController::class, 'postlogin'])->name('postlogin')->middleware('guest');
Route::get('/logout',[AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::middleware(['auth', 'admin'])->group(function () {
Route::get('/fakultas', [FakultasController::class, 'index'])->name('fakultas');
Route::post('/tambah_fakultas', [FakultasController::class, 'tambah_data'])->name('tambah_fakultas');
Route::post('/update_fakultas', [FakultasController::class, 'update_data'])->name('update_fakultas');
Route::get('/hapus_fakultas/{id}', [FakultasController::class, 'hapus_data'])->name('hapus_fakultas');
Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan');
Route::post('/tambah_jurusan', [JurusanController::class, 'tambah_data'])->name('tambah_jurusan');
Route::post('/update_jurusan', [JurusanController::class, 'update_jurusan'])->name('update_jurusan');
Route::get('/hapus_jurusan/{id}', [JurusanController::class, 'hapus_jurusan'])->name('hapus_jurusan');
Route::get('/iuran', [IuranController::class, 'index'])->name('iuran');
Route::post('ubah_nominalkas', [IuranController::class, 'ubah_nominalkas'])->name('ubah_nominalkas');
Route::get('/listlatihan/create', [ListlatihanController::class, 'create'])->name("listlatihan.create");
Route::post('/listlatihan/store', [ListlatihanController::class, 'store'])->name("listlatihan.store");

Route::get('hapus_listlatihan/{id}', [ListlatihanController::class, 'destroy']);

Route::get('/anggota/create', [AnggotaController::class, 'create'])->name('tambah_anggota');
Route::post('/anggota/store', [AnggotaController::class, 'store'])->name("anggota.store");
Route::get('/anggota/{id}/edit', [AnggotaController::class, 'edit'])->name("anggota.edit");
Route::put('/anggota/{id}', [AnggotaController::class, 'update'])->name("anggota.update");
Route::get('/hapus_anggota/{id}', [AnggotaController::class, 'destroy']);

Route::get('/jurusan/{fakultas_id}', [JurusanController::class, 'getJurusanByFakultas'])->name('getJurusanByFakultas');
Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran')->middleware('auth');
Route::get('/pembayaran/create', [PembayaranController::class, 'create'])->name('pembayaran.create');
Route::post('/pembayaran/store', [PembayaranController::class, 'store'])->name("pembayaran.store");
Route::get('hapus_bayar/{id}', [PembayaranController::class, 'destroy']);
Route::get('/pembayaran/{id}/edit', [PembayaranController::class, 'edit'])->name("pembayaran.edit");
Route::put('/pembayaran/{id}', [PembayaranController::class, 'update'])->name("pembayaran.update");

});

Route::get('/listlatihan', [ListlatihanController::class, 'index'])->name("listlatihan");



Route::get('/detail_listlatihan', [ListlatihanController::class, 'anggota_yangikutlatihan'])->name("anggota_yangikutlatihan")->middleware('auth');
Route::get('/detail_listlatihann', [ListlatihanController::class, 'detail_listlatihandaridashboard'])->name("detail_listlatihandaridashboard")->middleware('auth');


Route::get('/anggota', [AnggotaController::class, 'index'])->name("anggota");





// Route::get('/jurusan/{fakultas_id}', [JurusanController::class, 'getJurusanByFakultas'])->name('getJurusanByFakultas');


