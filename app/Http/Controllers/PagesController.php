<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use App\Models\komisi;
use App\Models\pimpinan;
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
        $data = komisi::all();
        return view('pages.komisi');
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
        return view('pages.fraksi-pembangunan');
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
        return view('pages.badan-pembentukan');
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
        return view('pages.gallery');
    }
    public function aspirasi()
    {
        return view('pages.aspirasi');
    }
    

}

