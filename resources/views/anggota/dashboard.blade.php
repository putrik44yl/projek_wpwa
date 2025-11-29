@extends('layouts.anggota')

@section('content')
<h3 class="mb-4">Dashboard Anggota</h3>

<div class="row">

    {{-- DATA DIRI --}}
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5>Data Pribadi</h5>
                <hr>

                <p><strong>Nama:</strong> {{ $anggota->nama }}</p>
                <p><strong>Status:</strong> {!! $anggota->statusBadge !!}</p>
                <p><strong>Tanggal Gabung:</strong> {{ $anggota->tanggal_gabung ?? '-' }}</p>
            </div>
        </div>
    </div>

    {{-- KEGIATAN TERDEKAT --}}
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5>Kegiatan Terdekat</h5>
                <hr>

                @if($nextEvent)
                    <p><strong>{{ $nextEvent->judul }}</strong></p>
                    <p><i class="fa fa-calendar"></i> {{ $nextEvent->tanggal }}</p>
                    <p><i class="fa fa-map-marker-alt"></i> {{ $nextEvent->lokasi }}</p>
                @else
                    <p>Tidak ada kegiatan terdekat.</p>
                @endif
            </div>
        </div>
    </div>

    {{-- STATUS IURAN --}}
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5>Status Iuran</h5>
                <hr>

                @if($statusIuran)
                    <p><strong>Status:</strong> {{ $statusIuran->status }}</p>
                    <p><strong>Total:</strong> Rp {{ number_format($statusIuran->jumlah) }}</p>
                @else
                    <p>Belum ada data iuran.</p>
                @endif
            </div>
        </div>
    </div>

</div>
@endsection
