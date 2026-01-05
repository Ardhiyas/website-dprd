<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KomisiC;
use Illuminate\Http\Request;

class KomisiCControlller extends Controller
{
    public function index()
    {
        $komisiC = KomisiC::all();
        return view('admin.komisiC.index', compact('data'));
    }   

/*************  ✨ Windsurf Command ⭐  *************/
    /**
     * Show the form for creating a new komisiC resource.
     *
     * @return \Illuminate\Http\Response
     */
/*******  5d25cb85-76da-4e6f-94aa-b317e603518a  *******/
    public function create(){
        return view('admin.komisiC.create');
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
            $request->file('foto')->move(public_path('uploads/komisi-c/'), $filename);
        }

        KomisiC::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'foto' => $filename,
        ]);
        return redirect()->route('komisi-c.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $data = KomisiC::findOrFail($id);
        return view('admin.komisiC.edit', compact('data'));
    }

    public function update(Request $request, string $id)
    {
        $data = KomisiC::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'foto' => 'nullable|image|max:2048',
        ]);

        $filename=$data->foto;
        if($request->hasFile('foto')){
            if($data->foto && file_exists(public_path('uploads/komisi-c/'.$data->foto))){
                unlink(public_path('uploads/komisi-c/'.$data->foto));
            }
            $filename = time().'_'.$request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('uploads/komisi-c/'), $filename);
        }
        $data->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'foto' => $filename,
        ]);
        return redirect()->route('komisi-c.index')->with('success', 'Data berhasil diupdate.');   
    }

    public function destroy(string $id)
    {
        $data = KomisiC::findOrFail($id);
        if($data->foto && file_exists(public_path('uploads/komisi-c/'.$data->foto))){
            unlink(public_path('uploads/komisi-c/'.$data->foto));
        }
        $data->delete();
        return redirect()->route('komisi-c.index')->with('success', 'Data berhasil dihapus.');
    }
}
