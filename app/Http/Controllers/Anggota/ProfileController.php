<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Anggota;
use Auth;

class ProfileController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $anggota = Anggota::where('user_id', $user->id)->first();

        return view('anggota.dashboard', compact('user', 'anggota'));
    }

    public function create()
    {
        $user = Auth::user();

        if ($user->anggota) {
            return redirect()->route('anggota.profile.edit');
        }

        return view('anggota.profile.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'alamat' => 'required',
        ]);

        Anggota::create([
            'user_id' => Auth::id(),
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('anggota.dashboard');
    }

    public function edit()
    {
        $anggota = Auth::user()->anggota;

        return view('anggota.profile.edit', compact('anggota'));
    }

    public function update(Request $request)
    {
        $anggota = Auth::user()->anggota;

        $anggota->update([
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('anggota.dashboard');
    }
}
