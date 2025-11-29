<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Kegiatan;
use App\Models\Iuran;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Pastikan user punya data anggota
        if (!$user->anggota) {
            return redirect()->route('anggota.profile.create')
                ->with('error', 'Anda belum memiliki data anggota, lengkapi profil terlebih dahulu.');
        }

        $anggota = $user->anggota;

        // Kegiatan terdekat
        $nextEvent = Kegiatan::orderBy('tanggal', 'asc')->first();

        // Status iuran terbaru
        $lastIuran = Iuran::where('anggota_id', $anggota->id)
            ->orderBy('tanggal', 'desc')
            ->first();

        return view('anggota.dashboard.index', compact(
            'anggota',
            'nextEvent',
            'lastIuran'
        ));
    }
}
