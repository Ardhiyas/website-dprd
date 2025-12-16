<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    // Folder penyimpanan gambar
    private $uploadDir = 'uploads/gallery/';

    public function index()
    {
        $galleryItems = Gallery::orderBy('created_at', 'desc')->get();
        return view('admin.gallery.index', compact('galleryItems'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi_singkat' => 'required|string|max:500',
            'path_gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
            'slug' => 'nullable|string|unique:galleries,slug',
        ]);

        $filename = $this->handleImageUpload($request);
        $slug = $request->slug ? Str::slug($request->slug) : Str::slug($request->judul) . '-' . time();

        Gallery::create([
            'judul' => $validated['judul'],
            'deskripsi_singkat' => $validated['deskripsi_singkat'],
            'path_gambar' => $filename,
            'slug' => $slug,
        ]);

        return redirect()->route('gallery.index')->with('success', 'Konten galeri berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $galleryItem = Gallery::findOrFail($id);
        // Menggunakan nama variabel galleryItem di view edit
        return view('admin.gallery.edit', ['galleryItem' => $galleryItem]); 
    }

    public function update(Request $request, string $id)
    {
        $galleryItem = Gallery::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi_singkat' => 'required|string|max:500',
            'path_gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'slug' => 'nullable|string|unique:galleries,slug,' . $id, // Slug harus unik kecuali dirinya sendiri
        ]);

        $filename = $galleryItem->path_gambar;

        if ($request->hasFile('path_gambar')) {
            // Hapus gambar lama jika ada
            if ($galleryItem->path_gambar) {
                File::delete(public_path($this->uploadDir . $galleryItem->path_gambar));
            }
            $filename = $this->handleImageUpload($request);
        }
        
        $slug = $request->slug ? Str::slug($request->slug) : Str::slug($request->judul);

        $galleryItem->update([
            'judul' => $validated['judul'],
            'deskripsi_singkat' => $validated['deskripsi_singkat'],
            'path_gambar' => $filename,
            'slug' => $slug,
        ]);

        return redirect()->route('gallery.index')->with('success', 'Konten galeri berhasil diupdate.');
    }

    public function destroy(string $id)
    {
        $galleryItem = Gallery::findOrFail($id);
        
        // Hapus file gambar dari server
        if ($galleryItem->path_gambar) {
            File::delete(public_path($this->uploadDir . $galleryItem->path_gambar));
        }

        $galleryItem->delete();
        return redirect()->route('gallery.index')->with('success', 'Konten galeri berhasil dihapus.');
    }

    /**
     * Helper function untuk mengunggah gambar.
     */
    private function handleImageUpload(Request $request)
    {
        $file = $request->file('path_gambar');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path($this->uploadDir), $filename);
        return $filename;
    }
}