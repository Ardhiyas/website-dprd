<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KomisiA;
use Illuminate\Http\Request;

class KomisiAControlller extends Controller
{
    public function index()
    {
        $komisiA = KomisiA::all();
        return view('admin.komisiA.index', compact('data'));
    }   

    public function create(){
        return view('admin.komisiA.create');
    }

    public function store(Request $request){
                $request->validate([
        'nama' => 'required',
        'jabatan' => 'required',
        'foto' => 'nullable|image|max:2048',
        ]);

        $filename=null;
        if($request->hasFile('foto')){
            $filename = time().'_'.$request->file('foto')->extension();
            $request->file('foto')->move(public_path('uploads/komisi-a/'), $filename);
        }

        KomisiA::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'foto' => $filename,
        ]);
        return redirect()->route('komisi-a.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $data = KomisiA::findOrFail($id);
        return view('admin.komisiA.edit', compact('data'));
    }

    public function update(Request $request, string $id)
    {
        $data = KomisiA::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'foto' => 'nullable|image|max:2048',
        ]);

        $filename=$data->foto;
        if($request->hasFile('foto')){
            if($data->foto && file_exists(public_path('uploads/komisi-a/'.$data->foto))){
                unlink(public_path('uploads/komisi-a/'.$data->foto));
            }
            $filename = time().'_'.$request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('uploads/komisi-a/'), $filename);
        }
        $data->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'foto' => $filename,
        ]);
        return redirect()->route('komisi-a.index')->with('success', 'Data berhasil diupdate.');   
    }

    public function destroy(string $id)
    {
        $data = KomisiA::findOrFail($id);
        if($data->foto && file_exists(public_path('uploads/komisi-a/'.$data->foto))){
            unlink(public_path('uploads/komisi-a/'.$data->foto));
        }
        $data->delete();
        return redirect()->route('komisi-a.index')->with('success', 'Data berhasil dihapus.');
    }
}
