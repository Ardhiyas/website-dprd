<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Komisi;
use App\Models\KomisiImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB; // Digunakan untuk transaksi

class KomisiController extends Controller
{
    // Direktori tempat gambar Komisi akan disimpan (di public/)
    private $uploadDir = 'uploads/komisi/';

    /**
     * Menampilkan daftar semua Komisi. (READ - Index)
     */
    public function index()
    {
        // Mengambil semua Komisi, siap untuk ditampilkan di tabel admin
        $komisiList = Komisi::all();
        return view('admin.komisi.index', compact('komisiList'));
    }

    /**
     * Menampilkan formulir untuk membuat Komisi baru. (CREATE - Form)
     */
    public function create()
    {
        return view('admin.komisi.create');
    }

    /**
     * Menyimpan data Komisi baru ke database. (CREATE - Store)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255|unique:komisis,nama', // Nama harus unik
            'deskripsi' => 'required|string',
            'initial_images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Gambar awal (multi-upload)
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
                    if ($image && $image->isValid()) {
                        $filename = time() . '_' . $image->getClientOriginalName();
                        $image->move(public_path($this->uploadDir), $filename);
                        
                        KomisiImage::create([
                            'komisi_id' => $komisi->id,
                            'path_gambar' => $filename,
                        ]);
                    }
                }
            }
            
            DB::commit();
            return redirect()->route('komisi.index')->with('success', 'Komisi ' . $komisi->nama . ' berhasil ditambahkan.');
            
        } catch (\Exception $e) {
            DB::rollback();
            // Jika terjadi error, kembali ke form dengan input sebelumnya
            return redirect()->back()->with('error', 'Gagal menyimpan data Komisi.')->withInput();
        }
    }

    /**
     * Menampilkan formulir untuk mengedit Komisi tertentu. (UPDATE - Form)
     */
    public function edit(string $id)
    {
        // Mengambil Komisi beserta semua relasi gambarnya (eager loading)
        $komisi = Komisi::with('images')->findOrFail($id);
        return view('admin.komisi.edit', compact('komisi'))->with('uploadDir', $this->uploadDir);
    }

    /**
     * Memperbarui data Komisi yang sudah ada. (UPDATE - Store)
     */
    public function update(Request $request, string $id)
    {
        $komisi = Komisi::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'new_images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Gambar baru
            'delete_images_ids' => 'nullable|string', // ID gambar yang akan dihapus (JSON)
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
                    if ($image && $image->isValid()) {
                        $filename = time() . '_' . $image->getClientOriginalName();
                        $image->move(public_path($this->uploadDir), $filename);
                        
                        KomisiImage::create([
                            'komisi_id' => $komisi->id,
                            'path_gambar' => $filename,
                        ]);
                    }
                }
            }
            
            // 3. Handle Hapus Gambar Lama
            if ($request->filled('delete_images_ids')) {
                // Decode array JSON ID gambar yang akan dihapus dari form
                $idsToDelete = json_decode($request->input('delete_images_ids'), true);
                
                if (!empty($idsToDelete)) {
                    // Ambil record gambar yang ID-nya ada dalam daftar
                    $imagesToDelete = KomisiImage::where('komisi_id', $komisi->id)
                                                 ->whereIn('id', $idsToDelete)
                                                 ->get();

                    foreach ($imagesToDelete as $img) {
                        // Hapus file fisik dari server
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
            return redirect()->back()->with('error', 'Gagal mengupdate data Komisi.')->withInput();
        }
    }

    /**
     * Menghapus Komisi dan gambar terkait. (DELETE)
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

            $komisiName = $komisi->nama;
            // Hapus entri Komisi (KomisiImage akan terhapus otomatis karena onDelete('cascade'))
            $komisi->delete();
            
            DB::commit();
            return redirect()->route('komisi.index')->with('success', 'Komisi ' . $komisiName . ' berhasil dihapus.');
            
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Gagal menghapus Komisi.');
        }
    }
}