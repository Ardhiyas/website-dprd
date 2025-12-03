<?php

use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\BadanAnggaranController;
use App\Http\Controllers\Admin\BadanKehormatanController;
use App\Http\Controllers\Admin\BadanMusyawarahController;
use App\Http\Controllers\Admin\BadanPembentukanController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FraksiDemokratController;
use App\Http\Controllers\Admin\FraksiGerindraController;
use App\Http\Controllers\Admin\FraksiGolkarController;
use App\Http\Controllers\Admin\FraksiNasdemController;
use App\Http\Controllers\Admin\FraksiPdipController;
use App\Http\Controllers\Admin\FraksiPembangunanController;
use App\Http\Controllers\Admin\FraksiPkbController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\KomisiController;
use App\Http\Controllers\Admin\PimpinanController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [PagesController::class, 'index'])->name('home');
Route::get('/pimpinan-dprd', [PagesController::class, 'pimpinanDprd'])->name('pimpinan-dprd');
Route::get('/anggota-dprd', [PagesController::class, 'anggotaDprd'])->name('anggota-dprd');


Route::get('/komisi', [PagesController::class, 'komisi'])->name('komisi');

Route::get('/fraksi-pkb', [PagesController::class, 'fraksiPkb'])->name('fraksi-pkb');
Route::get('/fraksi-golkar', [PagesController::class, 'fraksiGolkar'])->name('fraksi-golkar');
Route::get('/fraksi-pdip', [PagesController::class, 'fraksiPdip'])->name('fraksi-pdip');
Route::get('/fraksi-nasdem', [PagesController::class, 'fraksiNasdem'])->name('fraksi-nasdem');
Route::get('/fraksi-gerindra', [PagesController::class, 'fraksiGerindra'])->name('fraksi-gerindra');
Route::get('/fraksi-demokrat', [PagesController::class, 'fraksiDemokrat'])->name('fraksi-demokrat');
Route::get('/fraksi-pembangunan', [PagesController::class, 'fraksiPembangunan'])->name('fraksi-pembangunan');

Route::get('/badan-kehormatan', [PagesController::class, 'badanKehormatan'])->name('badan-kehormatan');
Route::get('/badan-anggaran', [PagesController::class, 'badanAnggaran'])->name('badan-anggaran');
Route::get('/badan-musyawarah', [PagesController::class, 'badanMusyawarah'])->name('badan-musyawarah');
Route::get('/badan-pembentukan', [PagesController::class, 'badanPembentukan'])->name('badan-pembentukan');

Route::get('/organisasi', [PagesController::class, 'organisasi'])->name('organisasi');
Route::get('/sakip', [PagesController::class, 'sakip'])->name('sakip');
Route::get('/gallery', [PagesController::class, 'gallery'])->name('gallery');

Route::get('/aspirasi', [PagesController::class, 'aspirasi'])->name('aspirasi');



Route::prefix('admin')->group(function () {
    Route::get('/', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login.submit');
    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('/pimpinan', PimpinanController::class);

    Route::resource('/anggota', AnggotaController::class);

    Route::get('/komisi', [KomisiController::class, 'index'])->name('komisi.index');
    Route::resource('/komisi', KomisiController::class);

    // Route::get('/aspirasi', [AspirasiController::class, 'index'])->name('aspirasi.index');
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::resource('/gallery', GalleryController::class);
    
    Route::get('/pkb', [FraksiPkbController::class, 'index'])->name('pkb.index');
    Route::resource('/pkb', FraksiPkbController::class);

    Route::get('/golkar', [FraksiGolkarController::class, 'index'])->name('golkar.index');
    Route::resource('/golkar', FraksiGolkarController::class);

    Route::get('/pdip', [FraksiPdipController::class, 'index'])->name('pdip.index');
    Route::resource('/pdip', FraksiPdipController::class);

    Route::get('/gerindra', [FraksiGerindraController::class, 'index'])->name('gerindra.index');
    Route::resource('/gerindra', FraksiGerindraController::class);

    Route::get('/nasdem', [FraksiNasdemController::class, 'index'])->name('nasdem.index');
    Route::resource('/nasdem', FraksiNasdemController::class);

    Route::get('/demokrat', [FraksiDemokratController::class, 'index'])->name('demokrat.index');
    Route::resource('/demokrat', FraksiDemokratController::class);

    Route::get('/pembangunan', [FraksiPembangunanController::class, 'index'])->name('pembangunan.index');
    Route::resource('/pembangunan', FraksiPembangunanController::class);

    Route::get('/anggaran', [BadanAnggaranController::class, 'index'])->name('anggaran.index');
    Route::resource('/anggaran', BadanAnggaranController::class);

    Route::get('/kehormatan', [BadanKehormatanController::class, 'index'])->name('kehormatan.index');
    Route::resource('/kehormatan', BadanKehormatanController::class);

    Route::get('/musyawarah', [BadanMusyawarahController::class, 'index'])->name('musyawarah.index');
    Route::resource('/musyawarah', BadanMusyawarahController::class);

    Route::get('/pembentukan', [BadanPembentukanController::class, 'index'])->name('pembentukan.index');
    Route::resource('/pembentukan', BadanPembentukanController::class);


    Route::get('/badan-anggaran', [BadanAnggaranController::class, 'index'])->name('badan-anggaran.index');
    Route::resource('/badan-anggaran', BadanAnggaranController::class);

    Route::get('/badan-kehormatan', [BadanKehormatanController::class, 'index'])->name('badan-kehormatan.index');
    Route::resource('/badan-kehormatan', BadanKehormatanController::class);

    Route::get('/badan-musyawarah', [BadanMusyawarahController::class, 'index'])->name('badan-musyawarah.index');
    Route::resource('/badan-musyawarah', BadanMusyawarahController::class);

    Route::get('/badan-pembentukan', [BadanPembentukanController::class, 'index'])->name('badan-pembentukan.index');
    Route::resource('/badan-pembentukan', BadanPembentukanController::class);

    Route::get('/organisasi', [App\Http\Controllers\Admin\OrganisasiController::class, 'index'])->name('organisasi.index');
    Route::resource('/organisasi', App\Http\Controllers\Admin\OrganisasiController::class);

    Route::get('/sakip', [App\Http\Controllers\Admin\SakipController::class, 'index'])->name('sakip.index');
    Route::resource('/sakip', App\Http\Controllers\Admin\SakipController::class);


});