<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\badanpembentukan;
use Illuminate\Http\Request;

class BadanPembentukanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = badanpembentukan::all();
        return view('admin.badan-pembentukan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.badan-pembentukan.create');
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

        $filename=null;
        if($request->hasFile('foto')){
            $filename = time().'_'.$request->file('foto')->extension();
            $request->file('foto')->move(public_path('uploads/badan-pembentukan/'), $filename);
        }

        badanpembentukan::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'foto' => $filename,
        ]);
        return redirect()->route('badan-pembentukan.index')->with('success', 'Data berhasil ditambahkan.');
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
        $data = badanpembentukan::findOrFail($id);
        return view('admin.badan-pembentukan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = badanpembentukan::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'foto' => 'nullable|image|max:2048',
        ]);

        $filename=$data->foto;
        if($request->hasFile('foto')){
            if($data->foto && file_exists(public_path('uploads/badan-pembentukan/'.$data->foto))){
                unlink(public_path('uploads/badan-pembentukan/'.$data->foto));
            }
            $filename = time().'_'.$request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('uploads/badan-pembentukan/'), $filename);
        }
        $data->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'foto' => $filename,
        ]);
        return redirect()->route('badan-pembentukan.index')->with('success', 'Data berhasil diupdate.');   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = badanpembentukan::findOrFail($id);

        if($data->foto && file_exists(public_path('uploads/badan-pembentukan/'.$data->foto))){
            unlink(public_path('uploads/badan-pembentukan/'.$data->foto));
        }
        $data->delete();
        return redirect()->route('badan-pembentukan.index')->with('success', 'Data berhasil dihapus.');
    }
}
