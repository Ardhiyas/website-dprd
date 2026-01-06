<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Komisi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KomisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Komisi::all();
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
            'bidang' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        Komisi::create([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
            'bidang' => $request->bidang,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('komisi.index')->with('success', 'Komisi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $komisi = Komisi::with('anggotas')->findOrFail($id);
        return view('admin.komisi.show', compact('komisi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Komisi::findOrFail($id);
        return view('admin.komisi.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Komisi::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'bidang' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $data->update([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
            'bidang' => $request->bidang,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('komisi.index')->with('success', 'Komisi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Komisi::findOrFail($id);
        $data->delete();
        return redirect()->route('komisi.index')->with('success', 'Komisi berhasil dihapus.');
    }
}