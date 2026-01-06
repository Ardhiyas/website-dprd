<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KomisiB;
use Illuminate\Http\Request;

class KomisiBControlller extends Controller
{
    public function index()
    {
        $data = KomisiB::all();
        return view('admin.komisi-b.index', compact('data'));
    }

    public function create()
    {
        return view('admin.komisi-b.create');
    }

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
            $request->file('foto')->move(public_path('uploads/komisi-b/'), $filename);
        }

        KomisiB::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'foto' => $filename,
        ]);
        return redirect()->route('komisi-b.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $data = KomisiB::findOrFail($id);
        return view('admin.komisi-b.edit', compact('data'));
    }

    public function update(Request $request, string $id)
    {
        $data = KomisiB::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'foto' => 'nullable|image|max:2048',
        ]);

        $filename = $data->foto;
        if ($request->hasFile('foto')) {
            if ($data->foto && file_exists(public_path('uploads/komisi-b/' . $data->foto))) {
                unlink(public_path('uploads/komisi-b/' . $data->foto));
            }
            $filename = time() . '_' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('uploads/komisi-b/'), $filename);
        }
        $data->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'foto' => $filename,
        ]);
        return redirect()->route('komisi-b.index')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy(string $id)
    {
        $data = KomisiB::findOrFail($id);
        if ($data->foto && file_exists(public_path('uploads/komisi-b/' . $data->foto))) {
            unlink(public_path('uploads/komisi-b/' . $data->foto));
        }
        $data->delete();
        return redirect()->route('komisi-b.index')->with('success', 'Data berhasil dihapus.');
    }
}
