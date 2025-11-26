<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.dashboard');
    }

    public function pimpinanDprd()
    {
        return view('pages.pimpinan-dprd');
    }

    public function anggotaDprd()
    {
        return view('pages.anggota-dprd');
    }
}

