<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KomisiD;
use Illuminate\Http\Request;

class KomisiDControlller extends Controller
{
    public function index()
    {
        $data = KomisiD::all();
        return view('admin.komisi-d.index', compact('data'));
    }

    public function create()
    {
        return view('admin.komisi-d.create');
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
            $request->file('foto')->move(public_path('uploads/komisi-d/'), $filename);
        }

        KomisiD::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'foto' => $filename,
        ]);
        return redirect()->route('komisi-d.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $data = KomisiD::findOrFail($id);
        return view('admin.komisi-d.edit', compact('data'));
    }

    public function update(Request $request, string $id)
    {
        $data = KomisiD::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'foto' => 'nullable|image|max:2048',
        ]);

        $filename = $data->foto;
        if ($request->hasFile('foto')) {
            if ($data->foto && file_exists(public_path('uploads/komisi-d/' . $data->foto))) {
                unlink(public_path('uploads/komisi-d/' . $data->foto));
            }
            $filename = time() . '_' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('uploads/komisi-d/'), $filename);
        }
        $data->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'foto' => $filename,
        ]);
        return redirect()->route('komisi-d.index')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy(string $id)
    {
        $data = KomisiD::findOrFail($id);
        if ($data->foto && file_exists(public_path('uploads/komisi-d/' . $data->foto))) {
            unlink(public_path('uploads/komisi-d/' . $data->foto));
        }
        $data->delete();
        return redirect()->route('komisi-d.index')->with('success', 'Data berhasil dihapus.');
    }
}
