@extends('layouts.admin')

@section('content')

<div class="container-xxl p-4">

    <h3>Edit Galeri</h3>

    <form action="{{ route('admin.galeri.update', $g->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Judul</label>
        <input type="text" name="judul" value="{{ $g->judul }}" class="form-control mb-2">

        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control mb-2">{{ $g->deskripsi }}</textarea>

        <label>Tipe</label>
        <select name="tipe" class="form-control mb-2">
            <option value="foto" {{ $g->tipe == 'foto' ? 'selected' : '' }}>Foto</option>
            <option value="video" {{ $g->tipe == 'video' ? 'selected' : '' }}>Video</option>
        </select>

        <label>File Saat Ini</label>
        <div class="mb-3">

            @if($g->tipe == 'foto')
                <img src="{{ asset('storage/'.$g->file_path) }}" width="200" class="img-thumbnail">
            @else
                <video width="250" controls>
                    <source src="{{ asset('storage/'.$g->file_path) }}">
                </video>
            @endif

        </div>

        <label>Upload File Baru (opsional)</label>
        <input type="file" name="file" class="form-control mb-3">

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">Kembali</a>

    </form>

</div>

@endsection
