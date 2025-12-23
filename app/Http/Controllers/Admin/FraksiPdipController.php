<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// Koreksi: Menggunakan nama Model yang sesuai konvensi PascalCase
use App\Models\FraksiPdip; 
use Illuminate\Http\Request;

// Koreksi: Menggunakan nama Model yang sesuai konvensi PascalCase
class FraksiPdipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = FraksiPdip::all();
        return view('admin.fraksi-pdip.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil entri pertama (data konfigurasi), jika ada.
        $config = FraksiPdip::first(); 
    
    // Kirim $config ke view
        return view('admin.fraksi-pdip.create', compact('config'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // app/Http/Controllers/Admin/FraksiPembangunanController.php

// ...

/**
 * Store a newly created resource in storage.
 */
public function store(Request $request)
{
    // Cek apakah ini adalah entri pertama atau bukan
    $isFirstEntry = !FraksiPdip::exists();

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
        $config = FraksiPdip::first();
        $judul = $config->judul;
        $deskripsi = $config->deskripsi;
        $filename = $config->logo; // Gunakan logo yang sudah ada

    }

    FraksiPdip::create([
        'judul' => $judul,
        'logo' => $filename,
        'deskripsi' => $deskripsi,
        'nama' => $request->nama,
        'jabatan' => $request->jabatan,
    ]);

    return redirect()->route('pdip.index')->with('success', 'Anggota berhasil ditambahkan.');
}

private function handleLogoUpload(Request $request)
{
    if ($request->hasFile('logo')) {
        $filename = time() . '_' . $request->file('logo')->getClientOriginalExtension();
        $request->file('logo')->move(public_path('uploads/fraksi-pdip/'), $filename);
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
        // Koreksi: Menggunakan nama Model yang benar
        $data = FraksiPdip::findOrFail($id);
        return view('admin.fraksi-pdip.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    // app/Http/Controllers/Admin/FraksiPembangunanController.php

// ...

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

    $data = FraksiPdip::findOrFail($id);
    $filename = $data->logo;

    // 1. Handle Logo Upload/Deletion
    if ($request->hasFile('logo')) {
        // Hapus logo lama jika ada
        if ($data->logo && file_exists(public_path('uploads/fraksi-pdip/'.$data->logo))) {
            unlink(public_path('uploads/fraksi-pdip/'.$data->logo));
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
    FraksiPdip::where('id', '!=', $id)->update([
        'judul' => $request->judul,
        'logo' => $filename,
        'deskripsi' => $request->deskripsi,
        // Nama dan jabatan DILEWATI
    ]);

    return redirect()->route('pdip.index')->with('success', 'Data anggota dan konfigurasi fraksi berhasil diupdate.');
}

// ... (pastikan fungsi handleLogoUpload juga sudah ada)

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         // Koreksi: Menggunakan nama Model yang benar
        $data = FraksiPdip::findOrFail($id);
        if ($data->logo && file_exists(public_path('uploads/fraksi-pdip/'.$data->logo))) {
            unlink(public_path('uploads/fraksi-pdip/'.$data->logo));
        }
        $data->delete();
        
        // KOREKSI RUTE
        return redirect()->route('pdip.index')->with('success', 'Data berhasil dihapus.');
    }
}