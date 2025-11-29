@extends('layouts.anggota')

@section('content')
<h3 class="mb-3">Profil Saya</h3>

<div class="card">
    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('anggota.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $anggota->nama }}">
            </div>

            <div class="mb-3">
                <label>No HP</label>
                <input type="text" name="no_hp" class="form-control" value="{{ $anggota->no_hp }}">
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control">{{ $anggota->alamat }}</textarea>
            </div>

            <div class="mb-3">
                <label>Bio</label>
                <textarea name="bio" class="form-control">{{ $anggota->bio }}</textarea>
            </div>

            <div class="mb-3">
                <label>Foto Profil</label><br>

                <img src="{{ $anggota->foto_url }}" width="100" class="img-thumbnail mb-2">

                <input type="file" name="foto" class="form-control">
            </div>

            <button class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
