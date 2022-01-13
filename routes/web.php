<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;

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
    return view('landing-page');
});

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    // Data Dasar
    Route::resource('/member', AnggotaController::class);
    Route::get('/dataanggota',[AnggotaController::class, 'data'])->name('anggota-data');

    Route::resource('/pengunjung', KunjunganController::class);
    Route::get('/datapengunjung',[KunjunganController::class, 'data'])->name('pengunjung-data');

    Route::resource('/koleksi',KoleksiController::class);
    Route::get('/datakoleksi',[KoleksiController::class, 'data'])->name('koleksi-data');

    // Data Tambahan
    Route::resource('/peminjaman', PeminjamanController::class);
    Route::get('/datapeminjam',[PeminjamanController::class, 'data'])->name('pinjam-data');

    Route::resource('/pengembalian', PengembalianController::class);
    Route::get('/datapengembalian',[PengembalianController::class, 'data'])->name('pengembalian-data');
});
