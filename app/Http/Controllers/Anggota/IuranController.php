<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\Iuran;
use App\Models\Anggota;
use Illuminate\Support\Facades\Auth;

class IuranController extends Controller
{
    public function index()
    {
        $anggota = Anggota::where('user_id', Auth::id())->first();

        $iuran = Iuran::where('anggota_id', $anggota->id)->get();

        return view('anggota.iuran.index', compact('iuran'));
    }
}
