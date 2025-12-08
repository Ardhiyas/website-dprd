<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\fraksiPembangunan;
use Illuminate\Http\Request;

class FraksiPembangunanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = fraksiPembangunan::all();
        return view('admin.fraksi-pembangunan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.fraksi-pembangunan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'judul' => 'required',
        'logo' => 'required|image|max:2048',
        'deskripsi' => 'required',
        'nama' => 'required',
        'jabatan' => 'required',
        ]);

        $filename=null;
        if($request->hasFile('logo')){
            $filename = time().'_'.$request->file('logo')->extension();
            $request->file('logo')->move(public_path('uploads/fraksi-pembangunan/'), $filename);
        }
        fraksiPembangunan::create([
            'judul' => $request->judul,
            'logo' => $filename,
            'deskripsi' => $request->deskripsi,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
        ]);
        return redirect()->route('fraksi-pembangunan.index')->with('success', 'Data
    berhasil ditambahkan.');
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
        $data = fraksiPembangunan::findOrFail($id);
        return view('admin.fraksi-pembangunan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = fraksiPembangunan::findOrFail($id);
        $request->validate([
            'judul' => 'required',
            'logo' => 'nullable|image|max:2048',
            'deskripsi' => 'required',
            'nama' => 'required',
            'jabatan' => 'required',
        ]);
        $filename = $data->logo;
        if($request->hasFile('logo')){
            $filename = time().'_'.$request->file('logo')->extension();
            $request->file('logo')->move(public_path('uploads/fraksi-pembangunan/
'), $filename);

        }
        $data->update([
            'judul' => $request->judul,
            'logo' => $filename,
            'deskripsi' => $request->deskripsi,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
        ]);
        return redirect()->route('fraksi-pembangunan.index')->with('success', 'Data
    berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = fraksiPembangunan::findOrFail($id);
        if($data->logo && file_exists(public_path('uploads/fraksi-pembangunan/'.$data->logo))){
            unlink(public_path('uploads/fraksi-pembangunan/'.$data->logo));
        }
        $data->delete();
        return redirect()->route('fraksi-pembangunan.index')->with('success', 'Data
    berhasil dihapus.');
    }
}
