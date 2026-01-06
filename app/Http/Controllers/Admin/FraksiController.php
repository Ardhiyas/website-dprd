<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fraksi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FraksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Fraksi::all();
        return view('admin.fraksi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.fraksi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'logo' => 'nullable|image|max:2048',
            'deskripsi' => 'nullable|string',
        ]);

        $filename = null;
        if ($request->hasFile('logo')) {
            $filename = time() . '_' . $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(public_path('uploads/fraksi/'), $filename);
        }

        Fraksi::create([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
            'logo' => $filename,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('fraksi.index')->with('success', 'Fraksi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fraksi = Fraksi::with('anggotas')->findOrFail($id);
        return view('admin.fraksi.show', compact('fraksi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Fraksi::findOrFail($id);
        return view('admin.fraksi.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Fraksi::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'logo' => 'nullable|image|max:2048',
            'deskripsi' => 'nullable|string',
        ]);

        $filename = $data->logo;
        if ($request->hasFile('logo')) {
            if ($data->logo && file_exists(public_path('uploads/fraksi/' . $data->logo))) {
                unlink(public_path('uploads/fraksi/' . $data->logo));
            }
            $filename = time() . '_' . $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(public_path('uploads/fraksi/'), $filename);
        }

        $data->update([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
            'logo' => $filename,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('fraksi.index')->with('success', 'Fraksi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Fraksi::findOrFail($id);
        if ($data->logo && file_exists(public_path('uploads/fraksi/' . $data->logo))) {
            unlink(public_path('uploads/fraksi/' . $data->logo));
        }
        $data->delete();
        return redirect()->route('fraksi.index')->with('success', 'Fraksi berhasil dihapus.');
    }
}
