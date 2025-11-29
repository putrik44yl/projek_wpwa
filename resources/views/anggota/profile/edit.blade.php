@extends('layouts.anggota')

@section('content')

<h3>Edit Profil</h3>

<div class="card p-3">

<form action="{{ route('anggota.profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Nama</label>
    <input type="text" name="name" class="form-control mb-2" value="{{ Auth::user()->name }}">

    <label>No HP</label>
    <input type="text" name="no_hp" class="form-control mb-2" value="{{ Auth::user()->no_hp }}">

    <label>Foto Profil</label>
    <input type="file" name="foto" class="form-control mb-3">

    <button class="btn btn-success">Simpan</button>
</form>

</div>

@endsection
