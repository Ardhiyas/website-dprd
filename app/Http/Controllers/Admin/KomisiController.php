<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Komisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KomisiController extends Controller
{
    // Tambahkan "= null" agar parameter kategori tidak wajib diisi
    public function index($kategori = null)
    {
        $data = \App\Models\Komisi::orderBy('kategori', 'asc')->get();
        return view('admin.komisi.index', compact('data'));
    }

    // Fungsi untuk menyimpan deskripsi komisi (Sesuai rencana Anda)
    public function store_info(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            'deskripsi' => 'required'
        ]);

        // UpdateOrCreate: Jika data info komisi sudah ada maka update, jika belum maka buat baru
        Komisi::updateOrCreate(
            ['kategori' => $request->kategori, 'type' => 'info'],
            [
                'judul' => 'KOMISI ' . $request->kategori,
                'deskripsi' => $request->deskripsi,
                'gambar' => '-' // Kosongkan karena ini hanya data teks
            ]
        );

        return back()->with('success', 'Deskripsi Komisi ' . $request->kategori . ' berhasil diperbarui.');
    }
    // File: app/Http/Controllers/PagesController.php

    public function showKomisi($kategori)
    {
        $kategoriUpper = strtoupper($kategori);

        // 1. Ambil deskripsi singkat (yang type-nya 'info')
        $info = \App\Models\Komisi::where('kategori', $kategoriUpper)
                ->where('type', 'info')
                ->first();

        // 2. Ambil semua foto anggota (yang type-nya 'anggota')
        $galeri = \App\Models\Komisi::where('kategori', $kategoriUpper)
                ->where('type', 'anggota')
                ->get();

        return view('pages.komisi', compact('info', 'galeri', 'kategoriUpper'));
    }

    // Fungsi untuk menyimpan foto anggota
    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_anggota_' . strtolower($request->kategori) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/komisi'), $filename);

            Komisi::create([
                'kategori' => $request->kategori,
                'judul' => 'Anggota Komisi ' . $request->kategori,
                'deskripsi' => $request->deskripsi,
                'gambar' => $filename,
                'type' => 'anggota'
            ]);

            return back()->with('success', 'Foto anggota berhasil ditambahkan.');
        }
    }

    public function destroy($id)
    {
        $item = Komisi::findOrFail($id);
        if ($item->gambar && $item->gambar != '-') {
            $path = public_path('uploads/komisi/' . $item->gambar);
            if (File::exists($path)) { File::delete($path); }
        }
        $item->delete();
        return back()->with('success', 'Data berhasil dihapus.');
    }
}