@extends('layouts.anggota')

@section('content')
<h3 class="mb-3">Riwayat Kehadiran</h3>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kegiatan</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kehadiran as $h)
                <tr>
                    <td>{{ $h->kegiatan->judul }}</td>
                    <td>{{ $h->kegiatan->tanggal }}</td>
                    <td>{{ $h->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
