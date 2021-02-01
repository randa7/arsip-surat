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
Route::middleware('role:admin|operator')->delete('/suratmasuk/{idsuratmasuk}', [App\Http\Controllers\SuratMasukController::class, 'destroy']);
Route::middleware('role:admin|operator')->put('/suratmasuk/{idsuratmasuk}', [App\Http\Controllers\SuratMasukController::class, 'update']);
Route::middleware('role:admin|operator')->get('/suratmasuk/{idsuratmasuk}/edit', [App\Http\Controllers\SuratMasukController::class, 'edit']);
Route::middleware('role:admin|operator')->post('/suratmasuk', [App\Http\Controllers\SuratMasukController::class, 'store']);

//surat keluar

Route::get('/suratkeluar', [App\Http\Controllers\SuratKeluarController::class, 'index']);
Route::middleware('role:admin|operator')->get('/suratkeluar/create', [App\Http\Controllers\SuratKeluarController::class, 'create']);
Route::middleware('role:admin|operator')->delete('/suratkeluar/{suratkeluar}', [App\Http\Controllers\SuratKeluarController::class, 'destroy']);
Route::middleware('role:admin|operator')->put('/suratkeluar/{suratkeluar}', [App\Http\Controllers\SuratKeluarController::class, 'update']);
Route::middleware('role:admin|operator')->get('/suratkeluar/{suratkeluar}/edit', [App\Http\Controllers\SuratKeluarController::class, 'edit']);



//admin

Route::middleware('role:admin')->resource('pengguna', App\Http\Controllers\PenggunaController::class);


//operator


//user