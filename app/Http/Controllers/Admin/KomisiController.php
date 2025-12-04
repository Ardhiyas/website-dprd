<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Komisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KomisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Komisi::orderBy('id', 'desc')->get();
        return view('admin.komisi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.komisi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'komisi' => 'required|string|max:5',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $filename = null;
        if ($request->hasFile('foto')) {
            $filename = time() . '_' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('uploads/komisi/'), $filename);
        }

        Komisi::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'komisi' => strtoupper($request->komisi),
            'foto' => $filename,
        ]);

        return redirect()->route('admin.komisi.index')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Komisi::findOrFail($id);
        return view('admin.komisi.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Komisi::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'komisi' => 'required|string|max:5',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $filename = $data->foto;
        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($data->foto && File::exists(public_path('uploads/komisi/' . $data->foto))) {
                File::delete(public_path('uploads/komisi/' . $data->foto));
            }

            // Upload foto baru
            $filename = time() . '_' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('uploads/komisi/'), $filename);
        }

        $data->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'komisi' => strtoupper($request->komisi),
            'foto' => $filename,
        ]);

        return redirect()->route('admin.komisi.index')->with('success', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Komisi::findOrFail($id);

        // Hapus foto jika ada
        if ($data->foto && File::exists(public_path('uploads/komisi/' . $data->foto))) {
            File::delete(public_path('uploads/komisi/' . $data->foto));
        }

        $data->delete();
        return redirect()->route('admin.komisi.index')->with('success', 'Data berhasil dihapus.');
    }
}
