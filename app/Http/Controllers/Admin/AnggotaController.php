<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\anggota;
use App\Models\Fraksi;
use App\Models\Komisi;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = anggota::all();
        return view('admin.anggota.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'foto' => 'nullable|image|max:2048',
        ]);

        $filename = null;
        if ($request->hasFile('foto')) {
            $filename = time() . '_' . $request->file('foto')->extension();
            $request->file('foto')->move(public_path('uploads/anggota/'), $filename);
        }

        anggota::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'foto' => $filename,
        ]);
        return redirect()->route('anggota.index')->with('success', 'Data berhasil ditambahkan.');
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
        $data = anggota::findOrFail($id);
        return view('admin.anggota.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = anggota::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'foto' => 'nullable|image|max:2048',
        ]);

        $filename = $data->foto;
        if ($request->hasFile('foto')) {
            if ($data->foto && file_exists(public_path('uploads/anggota/' . $data->foto))) {
                unlink(public_path('uploads/anggota/' . $data->foto));
            }
            $filename = time() . '_' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('uploads/anggota/'), $filename);
        }
        $data->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'foto' => $filename,
        ]);
        return redirect()->route('anggota.index')->with('success', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = anggota::findOrFail($id);

        if ($data->foto && file_exists(public_path('uploads/anggota/' . $data->foto))) {
            unlink(public_path('uploads/anggota/' . $data->foto));
        }
        $data->delete();
        return redirect()->route('anggota.index')->with('success', 'Data berhasil dihapus.');
    }
}