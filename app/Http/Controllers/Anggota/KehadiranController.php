<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\Kehadiran;
use App\Models\Anggota;
use Illuminate\Support\Facades\Auth;

class KehadiranController extends Controller
{
    public function index()
    {
        $anggota = Anggota::where('user_id', Auth::id())->first();

        $kehadiran = Kehadiran::where('anggota_id', $anggota->id)
            ->latest()
            ->get();

        return view('anggota.kehadiran.index', compact('kehadiran'));
    }
}
