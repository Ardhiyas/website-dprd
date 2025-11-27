<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
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
});