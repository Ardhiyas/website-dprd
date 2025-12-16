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
*/

// --- RUTE PUBLIK ---
// Rute Publik Utama
Route::get('/', [PagesController::class, 'index'])->name('home');
Route::get('/welcome', function () {
    return view('welcome');
});

// Rute Publik Anggota dan Pimpinan
Route::get('/pimpinan-dprd', [PagesController::class, 'pimpinanDprd'])->name('pimpinan-dprd');
Route::get('/anggota-dprd', [PagesController::class, 'anggotaDprd'])->name('anggota-dprd');

// Rute Publik Komisi dan Alat Kelengkapan
Route::get('/komisi', [PagesController::class, 'komisi'])->name('komisi');
// Route Komisi A (Contoh tambahan)
Route::get('/komisi-a', [PagesController::class, 'komisiA'])->name('page.komisi.a'); // Pastikan komisiA ada di PagesController

// Rute Publik Fraksi
Route::get('/fraksi-pkb', [PagesController::class, 'fraksiPkb'])->name('fraksi-pkb');
Route::get('/fraksi-golkar', [PagesController::class, 'fraksiGolkar'])->name('fraksi-golkar');
Route::get('/fraksi-pdip', [PagesController::class, 'fraksiPdip'])->name('fraksi-pdip');
Route::get('/fraksi-nasdem', [PagesController::class, 'fraksiNasdem'])->name('fraksi-nasdem');
Route::get('/fraksi-gerindra', [PagesController::class, 'fraksiGerindra'])->name('fraksi-gerindra');
Route::get('/fraksi-demokrat', [PagesController::class, 'fraksiDemokrat'])->name('fraksi-demokrat');
Route::get('/fraksi-pembangunan', [PagesController::class, 'fraksiPembangunan'])->name('fraksi-pembangunan');

// Rute Publik Badan (Alat Kelengkapan DPRD)
Route::get('/badan-kehormatan', [PagesController::class, 'badanKehormatan'])->name('badan-kehormatan');
Route::get('/badan-anggaran', [PagesController::class, 'badanAnggaran'])->name('badan-anggaran');
Route::get('/badan-musyawarah', [PagesController::class, 'badanMusyawarah'])->name('badan-musyawarah');
Route::get('/badan-pembentukan', [PagesController::class, 'badanPembentukan'])->name('badan-pembentukan');

// Rute Publik Lainnya
Route::get('/organisasi', [PagesController::class, 'organisasi'])->name('organisasi');
Route::get('/sakip', [PagesController::class, 'sakip'])->name('sakip');
Route::get('/gallery', [PagesController::class, 'gallery'])->name('gallery');
Route::get('/gallery/{slug}', [PagesController::class, 'showGalleryItem'])->name('gallery.show');
Route::get('/aspirasi', [PagesController::class, 'aspirasi'])->name('aspirasi');

// --- RUTE ADMIN ---
Route::prefix('admin')->group(function () {
    // Rute Autentikasi Admin
    Route::get('/', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login.submit');
    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');

    // Rute Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Rute Resource Umum
    Route::resource('/pimpinan', PimpinanController::class);
    Route::resource('/anggota', AnggotaController::class);
    // CATATAN: Ganti nama rute resource gallery agar tidak bentrok dengan yang di dalam
    Route::resource('/gallery', GalleryController::class); 

    // Rute Komisi (Dihapus duplikasi prefix 'admin')
    Route::resource('/komisi', KomisiController::class);

    // Rute Resource Fraksi (Disederhanakan, dihapus Route::get redundan)
    Route::resource('/pkb', FraksiPkbController::class);
    Route::resource('/golkar', FraksiGolkarController::class);
    Route::resource('/pdip', FraksiPdipController::class);
    Route::resource('/gerindra', FraksiGerindraController::class);
    Route::resource('/nasdem', FraksiNasdemController::class);
    Route::resource('/demokrat', FraksiDemokratController::class);
    Route::resource('/pembangunan', FraksiPembangunanController::class);

    // Rute Resource Badan (Disederhanakan, menggunakan nama rute yang lebih pendek: anggaran, kehormatan, dll.)
    Route::resource('/badan-anggaran', BadanAnggaranController::class);
    Route::resource('/badan-kehormatan', BadanKehormatanController::class);
    Route::resource('/badan-musyawarah', BadanMusyawarahController::class);
    Route::resource('/badan-pembentukan', BadanPembentukanController::class);

    // Rute Resource Lainnya
    Route::resource('/organisasi', App\Http\Controllers\Admin\OrganisasiController::class);
    Route::resource('/sakip', App\Http\Controllers\Admin\SakipController::class);
});