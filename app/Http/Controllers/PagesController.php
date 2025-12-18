<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use App\Models\badanpembentukan;
use App\Models\komisi;
use App\Models\pimpinan;
use App\Models\fraksiPembangunan;
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
        $data = Komisi::with('images')->orderBy('nama')->get(); 
        return view('pages.komisi', compact('data'));
    }
    public function fraksiPkb()
    {
        return view('pages.fraksi-pkb');
    }
    public function fraksiGolkar()
    {
        return view('pages.fraksi-golkar');
    }
    public function fraksiPdip()
    {
        return view('pages.fraksi-pdip');
    }
    public function fraksiNasdem()
    {
        return view('pages.fraksi-nasdem');
    }
    public function fraksiGerindra()
    {
        return view('pages.fraksi-gerindra');
    }
    public function fraksiDemokrat()
    {
        return view('pages.fraksi-demokrat');
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
        return view('pages.badan-anggaran');
    }
    public function badanMusyawarah()
    {
        return view('pages.badan-musyawarah');
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

