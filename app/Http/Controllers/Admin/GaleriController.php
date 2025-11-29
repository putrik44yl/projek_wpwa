<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    // TAMPILKAN DATA GALERI
    public function index()
    {
        $galeris = Galeri::latest()->get();
        return view('admin.galeri.index', compact('galeris'));
    }

    // FORM TAMBAH
    public function create()
    {
        return view('admin.galeri.create');
    }

    // PROSES SIMPAN DATA BARU
    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'tipe'      => 'required|in:foto,video',
            'file'      => 'required|file'
        ]);

        // Upload file
        $path = $request->file('file')->store('galeri', 'public');

        Galeri::create([
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tipe'      => $request->tipe,
            'file_path' => $path
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Data galeri berhasil ditambahkan');
    }

    // FORM EDIT
    public function edit($id)
    {
        $g = Galeri::findOrFail($id);
        return view('admin.galeri.edit', compact('g'));
    }

    // PROSES UPDATE
    public function update(Request $request, $id)
    {
        $g = Galeri::findOrFail($id);

        $request->validate([
            'judul'     => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'tipe'      => 'required|in:foto,video',
        ]);

        // Jika file baru diupload
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('galeri', 'public');
            $g->file_path = $path;
        }

        $g->update([
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tipe'      => $request->tipe,
            'file_path' => $g->file_path
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Data galeri berhasil diperbarui');
    }

    // HAPUS DATA
    public function destroy($id)
    {
        $g = Galeri::findOrFail($id);
        $g->delete();

        return redirect()->back()->with('success', 'Data galeri berhasil dihapus');
    }
}
