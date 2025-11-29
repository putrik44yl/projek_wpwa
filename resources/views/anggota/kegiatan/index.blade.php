@extends('layouts.anggota')

@section('content')
<h3 class="mb-3">Daftar Kegiatan</h3>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($kegiatan as $k)
                <tr>
                    <td>{{ $k->judul }}</td>
                    <td>{{ $k->tanggal }}</td>
                    <td>{{ $k->lokasi }}</td>
                    <td>
                        <a href="{{ route('anggota.kegiatan.show', $k->id) }}" class="btn btn-sm btn-primary">
                            Detail
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
