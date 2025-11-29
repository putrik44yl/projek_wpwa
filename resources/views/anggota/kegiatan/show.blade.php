@extends('layouts.anggota')

@section('content')
<h3 class="mb-3">Detail Kegiatan</h3>

<div class="card">
    <div class="card-body">
        <h4>{{ $data->judul }}</h4>
        <p><i class="fa fa-calendar"></i> {{ $data->tanggal }}</p>
        <p><i class="fa fa-map-marker-alt"></i> {{ $data->lokasi }}</p>
        <p>{{ $data->deskripsi }}</p>

        <a href="{{ route('anggota.kegiatan.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </div>
</div>
@endsection
