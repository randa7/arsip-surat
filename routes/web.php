<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

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


Route::get('/failed', function () {
    toast('Kombinasi Username dan Password salah!','error');


    return redirect('/');
});

Route::get('/home', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('role:admin|operator|user')->get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::put('/profile/update', [App\Http\Controllers\HomeController::class, 'update']);

//surat masuk
Route::get('/suratmasuk', [App\Http\Controllers\SuratMasukController::class, 'index']);
Route::middleware('role:admin|operator')->get('/suratmasuk/create', [App\Http\Controllers\SuratMasukController::class, 'create']);
Route::middleware('role:admin|operator')->post('/suratmasuk', [App\Http\Controllers\SuratMasukController::class, 'store']);
Route::delete('/suratmasuk/{idsuratmasuk}', [App\Http\Controllers\SuratMasukController::class, 'destroy']);
Route::put('/suratmasuk/{idsurat}', [App\Http\Controllers\SuratMasukController::class, 'update']);
Route::middleware('role:admin|operator')->get('/suratmasuk/{suratmasuk}/edit', [App\Http\Controllers\SuratMasukController::class, 'edit']);
Route::get('/suratmasuk/{suratmasuk}/detail', [App\Http\Controllers\SuratMasukController::class, 'detail']);
Route::get('/suratmasuk/{suratmasuk}/disposisi', [App\Http\Controllers\SuratMasukController::class, 'disposisi']);
Route::put('/suratmasuk/disposisi/{idsurat}', [App\Http\Controllers\SuratMasukController::class, 'kirim']);

//surat keluar
Route::get('/suratkeluar', [App\Http\Controllers\SuratKeluarController::class, 'index']);
Route::middleware('role:admin|operator')->get('/suratkeluar/create', [App\Http\Controllers\SuratKeluarController::class, 'create']);
Route::middleware('role:admin|operator')->post('/suratkeluar', [App\Http\Controllers\SuratKeluarController::class, 'store']);
Route::delete('/suratkeluar/{suratkeluar}', [App\Http\Controllers\SuratKeluarController::class, 'destroy']);
Route::put('/suratkeluar/{idsurat}', [App\Http\Controllers\SuratKeluarController::class, 'update']);
Route::middleware('role:admin|operator')->get('/suratkeluar/{suratkeluar}/edit', [App\Http\Controllers\SuratKeluarController::class, 'edit']);
Route::get('/suratkeluar/{suratkeluar}/detail', [App\Http\Controllers\SuratKeluarController::class, 'detail']);
Route::get('/suratkeluar/{suratkeluar}/disposisi', [App\Http\Controllers\SuratKeluarController::class, 'disposisi']);
Route::put('/suratkeluar/disposisi/{idsurat}', [App\Http\Controllers\SuratKeluarController::class, 'kirim']);

//pengguna
Route::middleware('role:admin')->resource('pengguna', App\Http\Controllers\PenggunaController::class);


//laporan
Route::middleware('role:admin|operator')->get('/laporansuratmasuk', [App\Http\Controllers\laporansuratmasukController::class, 'index'])->name('laporansuratmasuk');
Route::middleware('role:admin|operator')->post('/laporansuratmasuk', [App\Http\Controllers\laporansuratmasukController::class, 'excel']);
Route::middleware('role:admin|operator')->get('/laporansuratkeluar', [App\Http\Controllers\laporansuratkeluarController::class, 'index'])->name('laporansuratkeluar');
Route::middleware('role:admin|operator')->post('/laporansuratkeluar', [App\Http\Controllers\laporansuratkeluarController::class, 'excel']);


//templatesurat
Route::get('/tatausaha', [App\Http\Controllers\TemplateSuratController::class, 'tatausaha']);
Route::get('/tatausaha/suratrekomendasi', [App\Http\Controllers\TemplateSuratController::class, 'rekomendasi']);
Route::post('/tatausaha/suratrekomendasi', [App\Http\Controllers\TemplateSuratController::class, 'buatrekomendasi']);
Route::get('/tatausaha/suratberkelakuanbaik', [App\Http\Controllers\TemplateSuratController::class, 'berkelakuanbaik']);
Route::post('/tatausaha/suratberkelakuanbaik', [App\Http\Controllers\TemplateSuratController::class, 'buatberkelakuanbaik']);
Route::get('/sarana/kartupermintaan', [App\Http\Controllers\TemplateSuratController::class, 'permintaan']);
Route::post('/sarana/kartupermintaan', [App\Http\Controllers\TemplateSuratController::class, 'kartupermintaan']);
Route::get('/sarana/kartupeminjaman', [App\Http\Controllers\TemplateSuratController::class, 'peminjaman']);
Route::post('/sarana/kartupeminjaman', [App\Http\Controllers\TemplateSuratController::class, 'kartupeminjaman']);
Route::get('/kesiswaan/suratpemanggilan', [App\Http\Controllers\TemplateSuratController::class, 'pemanggilan']);
Route::post('/kesiswaan/suratpemanggilan', [App\Http\Controllers\TemplateSuratController::class, 'suratpemanggilan']);

Route::get('/humas/suratpengantar', [App\Http\Controllers\TemplateSuratController::class, 'pengantar']);
Route::post('/humas/suratpengantar', [App\Http\Controllers\TemplateSuratController::class, 'suratpengantar']);


Route::get('/humas/suratpenarikan', [App\Http\Controllers\TemplateSuratController::class, 'penarikan']);
Route::post('/humas/suratpenarikan', [App\Http\Controllers\TemplateSuratController::class, 'suratpenarikan']);




Route::get('/kesiswaan', [App\Http\Controllers\TemplateSuratController::class, 'kesiswaan']);
Route::get('/kurikulum', [App\Http\Controllers\TemplateSuratController::class, 'kurikulum']);
Route::get('/sarana', [App\Http\Controllers\TemplateSuratController::class, 'sarana']);
Route::get('/humas', [App\Http\Controllers\TemplateSuratController::class, 'humas']);

