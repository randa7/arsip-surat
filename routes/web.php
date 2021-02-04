<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

//surat masuk

Route::get('/suratmasuk', [App\Http\Controllers\SuratMasukController::class, 'index']);
Route::middleware('role:admin|operator')->get('/suratmasuk/create', [App\Http\Controllers\SuratMasukController::class, 'create']);
Route::middleware('role:admin|operator')->post('/suratmasuk', [App\Http\Controllers\SuratMasukController::class, 'store']);

Route::delete('/suratmasuk/{idsuratmasuk}', [App\Http\Controllers\SuratMasukController::class, 'destroy']);
Route::put('/suratmasuk/{idsuratmasuk}', [App\Http\Controllers\SuratMasukController::class, 'update']);
Route::get('/suratmasuk/{idsuratmasuk}/edit', [App\Http\Controllers\SuratMasukController::class, 'edit']);
Route::get('/suratmasuk/{idsuratmasuk}/detail', [App\Http\Controllers\SuratMasukController::class, 'detail']);

//surat keluar
Route::get('/suratkeluar', [App\Http\Controllers\SuratKeluarController::class, 'index']);
Route::middleware('role:admin|operator')->get('/suratkeluar/create', [App\Http\Controllers\SuratKeluarController::class, 'create']);
Route::middleware('role:admin|operator')->post('/suratkeluar', [App\Http\Controllers\SuratKeluarController::class, 'store']);
Route::delete('/suratkeluar/{suratkeluar}', [App\Http\Controllers\SuratKeluarController::class, 'destroy']);
Route::put('/suratkeluar/{suratkeluar}', [App\Http\Controllers\SuratKeluarController::class, 'update']);
Route::get('/suratkeluar/{suratkeluar}/edit', [App\Http\Controllers\SuratKeluarController::class, 'edit']);
Route::get('/suratkeluar/{suratkeluar}/detail', [App\Http\Controllers\SuratKeluarController::class, 'detail']);




//admin

Route::middleware('role:admin')->resource('pengguna', App\Http\Controllers\PenggunaController::class);


//laporan

Route::get('/laporansuratmasuk', [App\Http\Controllers\laporansuratmasukController::class, 'index'])->name('laporansuratmasuk');
Route::get('/laporansuratkeluar', [App\Http\Controllers\laporansuratkeluarController::class, 'index'])->name('laporansuratmasuk');

//user