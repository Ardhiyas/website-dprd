<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\anggota;
use App\Models\Fraksi;
use App\Models\Komisi;
use App\Models\gallery;

class DashboardController extends Controller
{
    public function index()
    {
        $count = [
            'anggota' => anggota::count(),
            'fraksi' => Fraksi::count(),
            'komisi' => Komisi::count(),
            'gallery' => gallery::count(),
        ];

        $recentGalleries = gallery::latest()->limit(5)->get();

        return view('admin.dashboard', compact('count', 'recentGalleries'));
    }
}
