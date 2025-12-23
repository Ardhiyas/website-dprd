<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FraksiGolkar;
use Illuminate\Http\Request;


class FraksiGolkarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $data = FraksiGolkar::all();
        return view('admin.fraksi-golkar.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $config = FraksiGolkar::first(); 
    
    // Kirim $config ke view
        return view('admin.fraksi-golkar.create', compact('config'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Cek apakah ini adalah entri pertama atau bukan
    $isFirstEntry = !FraksiGolkar::exists();

    if ($isFirstEntry) {
        // Validasi KETIKA ENTRI PERTAMA (Semua field wajib diisi)
        $request->validate([
            'judul' => 'required',
            'logo' => 'required|image|max:2048',
            'deskripsi' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
        ]);
        $filename = $this->handleLogoUpload($request);
        $judul = $request->judul;
        $deskripsi = $request->deskripsi;

    } else {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
        ]);

        // Ambil data konfigurasi umum dari entri pertama yang sudah ada
        $config = FraksiGolkar::first();
        $judul = $config->judul;
        $deskripsi = $config->deskripsi;
        $filename = $config->logo; // Gunakan logo yang sudah ada

    }

    FraksiGolkar::create([
        'judul' => $judul,
        'logo' => $filename,
        'deskripsi' => $deskripsi,
        'nama' => $request->nama,
        'jabatan' => $request->jabatan,
    ]);

    return redirect()->route('golkar.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

private function handleLogoUpload(Request $request)
{
    if ($request->hasFile('logo')) {
        $filename = time() . '_' . $request->file('logo')->getClientOriginalExtension();
        $request->file('logo')->move(public_path('uploads/fraksi-golkar/'), $filename);
        return $filename;
    }
    return null;
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = FraksiGolkar::findOrFail($id);
        return view('admin.fraksi-golkar.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi seperti biasa
    $request->validate([
        'judul' => 'required',
        'logo' => 'nullable|image|max:2048',
        'deskripsi' => 'required',
        'nama' => 'required',
        'jabatan' => 'required',
    ]);

    $data = FraksiGolkar::findOrFail($id);
    $filename = $data->logo;

    // 1. Handle Logo Upload/Deletion
    if ($request->hasFile('logo')) {
        // Hapus logo lama jika ada
        if ($data->logo && file_exists(public_path('uploads/fraksi-golkar/'.$data->logo))) {
            unlink(public_path('uploads/fraksi-golkar/'.$data->logo));
        }
        $filename = $this->handleLogoUpload($request);
    }
    
    // 2. Data yang akan di-update
    $updateData = [
        'judul' => $request->judul,
        'logo' => $filename,
        'deskripsi' => $request->deskripsi,
        'nama' => $request->nama,
        'jabatan' => $request->jabatan,
    ];

    // 3. Update entri yang sedang diedit (anggota saat ini)
    $data->update($updateData);

    // 4. KUNCI PENTING: Update data konfigurasi umum (judul, logo, deskripsi) 
    //    ke SEMUA entri lainnya, kecuali nama dan jabatan.
    FraksiGolkar::where('id', '!=', $id)->update([
        'judul' => $request->judul,
        'logo' => $filename,
        'deskripsi' => $request->deskripsi,
        // Nama dan jabatan DILEWATI
    ]);

    return redirect()->route('golkar.index')->with('success', 'Data anggota dan konfigurasi fraksi berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = FraksiGolkar::findOrFail($id);
        if ($data->logo && file_exists(public_path('uploads/fraksi-golkar/'.$data->logo))) {
            unlink(public_path('uploads/fraksi-golkar/'.$data->logo));
        }
        $data->delete();
        
        // KOREKSI RUTE
        return redirect()->route('golkar.index')->with('success', 'Data berhasil dihapus.');
    }
}
