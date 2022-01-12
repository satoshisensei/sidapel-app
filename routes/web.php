<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\PengunjungController;

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
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    // Data Dasar
    Route::resource('/member', MemberController::class);
    Route::get('/dataanggota',[MemberController::class, 'data'])->name('anggota-data');

    Route::resource('/pengunjung', PengunjungController::class);
    Route::get('/datapengunjung',[PengunjungController::class, 'data'])->name('pengunjung-data');

    Route::resource('/koleksi',KoleksiController::class);
    Route::get('/datakoleksi',[KoleksiController::class, 'data'])->name('koleksi-data');

});
