@extends('layouts.admin')

@section('content')

<div class="container-xxl p-4">

    <h3>Tambah Galeri</h3>

    <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Judul</label>
        <input type="text" name="judul" class="form-control mb-2">

        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control mb-2"></textarea>

        <label>Tipe</label>
        <select name="tipe" class="form-control mb-2">
            <option value="foto">Foto</option>
            <option value="video">Video</option>
        </select>

        <label>File</label>
        <input type="file" name="file" class="form-control mb-3">

        <button class="btn btn-primary">Simpan</button>

    </form>

</div>

@endsection
