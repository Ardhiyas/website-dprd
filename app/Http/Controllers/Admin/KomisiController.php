<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Komisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB; // Digunakan untuk transaksi

class KomisiController extends Controller
{
    private $uploadDir = 'uploads/komisi/';

    /**
     * Menampilkan daftar semua Komisi.
     */
    public function index()
    {
        $komisiList = Komisi::all();
        // Asumsi view index admin terletak di admin/komisi/index.blade.php
        return view('admin.komisi.index', compact('komisiList'));
    }

    /**
     * Menampilkan formulir untuk membuat Komisi baru.
     */
    public function create()
    {
        return view('admin.komisi.create');
    }

    /**
     * Menyimpan data Komisi baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255|unique:komisis,nama',
            'deskripsi' => 'required|string',
            'initial_images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        DB::beginTransaction();
        try {
            // 1. Buat Komisi
            $komisi = Komisi::create([
                'nama' => $validated['nama'],
                'deskripsi' => $validated['deskripsi'],
            ]);

            // 2. Handle Upload Gambar Awal
            if ($request->hasFile('initial_images')) {
                foreach ($request->file('initial_images') as $image) {
                    $filename = time() . '_' . $image->getClientOriginalName();
                    $image->move(public_path($this->uploadDir), $filename);
                    
                    Komisi::create([
                        'komisi_id' => $komisi->id,
                        'path_gambar' => $filename,
                    ]);
                }
            }
            
            DB::commit();
            return redirect()->route('komisi.index')->with('success', 'Komisi ' . $komisi->nama . ' berhasil ditambahkan.');
            
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Gagal menyimpan data Komisi.')->withInput();
        }
    }

    /**
     * Menampilkan formulir untuk mengedit Komisi tertentu.
     */
    public function edit(string $id)
    {
        // Mengambil Komisi dengan relasi gambarnya
        $komisi = Komisi::with('images')->findOrFail($id);
        return view('admin.komisi.edit', compact('komisi'));
    }

    /**
     * Memperbarui data Komisi yang sudah ada.
     */
    public function update(Request $request, string $id)
    {
        $komisi = Komisi::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255', // Asumsi nama tidak diubah/dijaga agar tetap unik di form
            'deskripsi' => 'required|string',
            // Validasi untuk gambar baru (jika diunggah)
            'new_images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', 
            'delete_images_ids' => 'nullable|string', // Untuk JSON array ID yang akan dihapus
        ]);

        DB::beginTransaction();
        try {
            // 1. Update Data Dasar Komisi (Nama & Deskripsi)
            $komisi->update([
                'nama' => $validated['nama'],
                'deskripsi' => $validated['deskripsi'],
            ]);

            // 2. Handle Upload Gambar Baru
            if ($request->hasFile('new_images')) {
                foreach ($request->file('new_images') as $image) {
                    // Cek apakah file valid sebelum diproses
                    if ($image && $image->isValid()) {
                        $filename = time() . '_' . $image->getClientOriginalName();
                        $image->move(public_path($this->uploadDir), $filename);
                        
                        Komisi::create([
                            'komisi_id' => $komisi->id,
                            'path_gambar' => $filename,
                        ]);
                    }
                }
            }
            
            // 3. Handle Hapus Gambar Lama
            if ($request->filled('delete_images_ids')) {
                $idsToDelete = json_decode($request->input('delete_images_ids'), true);
                
                if (!empty($idsToDelete)) {
                    $imagesToDelete = Komisi::where('komisi_id', $komisi->id)
                                                 ->whereIn('id', $idsToDelete)
                                                 ->get();

                    foreach ($imagesToDelete as $img) {
                        // Hapus file fisik
                        File::delete(public_path($this->uploadDir . $img->path_gambar));
                        // Hapus dari database
                        $img->delete();
                    }
                }
            }

            DB::commit();
            return redirect()->route('komisi.index')->with('success', 'Data Komisi ' . $komisi->nama . ' berhasil diupdate.');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Gagal mengupdate data Komisi. Error: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Menghapus Komisi dan gambar terkait.
     */
    public function destroy(string $id)
    {
        $komisi = Komisi::findOrFail($id);
        
        DB::beginTransaction();
        try {
            // Hapus semua gambar fisik yang terkait
            foreach ($komisi->images as $img) {
                File::delete(public_path($this->uploadDir . $img->path_gambar));
            }

            // Hapus entri Komisi (KomisiImage akan otomatis terhapus karena onDelete('cascade') di migration)
            $komisiName = $komisi->nama;
            $komisi->delete();
            
            DB::commit();
            return redirect()->route('komisi.index')->with('success', 'Komisi ' . $komisiName . ' dan seluruh gambarnya berhasil dihapus.');
            
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Gagal menghapus Komisi.');
        }
    }

    // show() tidak diimplementasikan karena tidak diperlukan dalam konteks ini

    // private function handleImageUpload(Request $request) { ... } // (Disertakan di method store dan update)
}