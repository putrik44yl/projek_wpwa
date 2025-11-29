<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::orderBy('tanggal', 'desc')->get();

        return view('anggota.kegiatan.index', compact('kegiatan'));
    }

    public function show($id)
    {
        $data = Kegiatan::findOrFail($id);

        return view('anggota.kegiatan.show', compact('data'));
    }
}
