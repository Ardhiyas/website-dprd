<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use App\Models\BadanAnggaran;
use App\Models\BadanMusyawarah;
use App\Models\badanpembentukan;
use App\Models\fraksiDemokrat;
use App\Models\FraksiGerindra;
use App\Models\FraksiGolkar;
use App\Models\FraksiNasdem;
use App\Models\FraksiPdip;
use App\Models\komisi;
use App\Models\pimpinan;
use App\Models\fraksiPembangunan;
use App\Models\FraksiPkb;
use App\Models\Gallery;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.dashboard');
    }

    public function pimpinanDprd()
    {
        $data = pimpinan::all();
        return view('pages.pimpinan-dprd', compact('data'));
    }

    public function anggotaDprd()
    {
        $data = anggota::all();
        return view('pages.anggota-dprd', compact('data'));
    }

    public function komisi()
    {
            // Ambil semua data komisi dan urutkan berdasarkan kategori (A-D)
        $all_data = \App\Models\Komisi::orderBy('kategori', 'asc')->get();

        // Kelompokkan data berdasarkan kategori agar mudah di-looping di Blade
        // Ini akan memisahkan mana yang Info dan mana yang Anggota otomatis
        $data_komisi = $all_data->groupBy('kategori');

        return view('pages.komisi', compact('data_komisi'));
    }
    public function fraksiPkb()
    {
        $fraksiData = FraksiPkb::all();
        
        // Ambil entri pertama untuk judul, logo, dan deskripsi
        $config = $fraksiData->first();

        // Kirimkan kedua variabel ke view
        return view('pages.fraksi-pkb', compact('fraksiData', 'config'));
    }
    public function fraksiGolkar()
    {
        $fraksiData = FraksiGolkar::all();
        
        // Ambil entri pertama untuk judul, logo, dan deskripsi
        $config = $fraksiData->first();

        // Kirimkan kedua variabel ke view
        return view('pages.fraksi-golkar', compact('fraksiData', 'config'));
    }
    public function fraksiPdip()
    {
        $fraksiData = FraksiPdip::all();
        
        // Ambil entri pertama untuk judul, logo, dan deskripsi
        $config = $fraksiData->first();

        // Kirimkan kedua variabel ke view
        return view('pages.fraksi-pdip', compact('fraksiData', 'config'));
    }
    public function fraksiNasdem()
    {
        $fraksiData = FraksiNasdem::all();
        
        // Ambil entri pertama untuk judul, logo, dan deskripsi
        $config = $fraksiData->first();

        // Kirimkan kedua variabel ke view
        return view('pages.fraksi-nasdem', compact('fraksiData', 'config'));
    }
    public function fraksiGerindra()
    {
        $fraksiData = FraksiGerindra::all();
        
        // Ambil entri pertama untuk judul, logo, dan deskripsi
        $config = $fraksiData->first();

        // Kirimkan kedua variabel ke view
        return view('pages.fraksi-gerindra', compact('fraksiData', 'config'));
    }
    public function fraksiDemokrat()
    {
        $fraksiData = fraksiDemokrat::all();
        
        // Ambil entri pertama untuk judul, logo, dan deskripsi
        $config = $fraksiData->first();

        // Kirimkan kedua variabel ke view
        return view('pages.fraksi-demokrat', compact('fraksiData', 'config'));
    }
    public function fraksiPembangunan()
    {
        // Ambil semua data fraksi pembangunan
        $fraksiData = FraksiPembangunan::all();
        
        // Ambil entri pertama untuk judul, logo, dan deskripsi
        $config = $fraksiData->first();

        // Kirimkan kedua variabel ke view
        return view('pages.fraksi-pembangunan', compact('fraksiData', 'config'));
    }
    public function badanKehormatan()
    {
        return view('pages.badan-kehormatan');
    }
    public function badanAnggaran()
    {
        $data = BadanAnggaran::all();
        return view('pages.badan-anggaran', compact('data'));
    }
    public function badanMusyawarah()
    {
        $data = BadanMusyawarah::all();
        return view('pages.badan-musyawarah', compact('data'));
    }
    public function badanPembentukan()
    {
        $data = badanpembentukan::all();
        return view('pages.badan-pembentukan', compact('data'));
    }
    
    public function organisasi()
    {
        return view('pages.organisasi');
    }
    public function sakip()
    {
        return view('pages.sakip');
    }
    public function gallery()
    {
        // Ambil semua item gallery, diurutkan berdasarkan tanggal terbaru
        $galleryItems = Gallery::orderBy('created_at', 'desc')->get();
        
        // Kirimkan data ke view
        return view('pages.gallery', compact('galleryItems'));
    }
    public function aspirasi()
    {
        return view('pages.aspirasi');
    }
    

}

