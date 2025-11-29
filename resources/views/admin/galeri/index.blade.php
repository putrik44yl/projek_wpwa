@extends('layouts.admin')

@section('content')

<div class="container-xxl p-4">

    <h3>Galeri</h3>

    <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary mb-3">+ Tambah Galeri</a>

    <div class="row">
        @foreach ($galeris as $g)
            <div class="col-md-4">
                <div class="card mb-3">

                    @if($g->tipe == 'foto')
                        <img src="{{ asset('storage/'.$g->file_path) }}" class="card-img-top" alt="">
                    @else
                        <video class="w-100" controls>
                            <source src="{{ asset('storage/'.$g->file_path) }}">
                        </video>
                    @endif

                    <div class="card-body">
                        <h5>{{ $g->judul ?? 'Tanpa Judul' }}</h5>
                        <p>{{ $g->deskripsi }}</p>

                        <a href="{{ route('admin.galeri.edit', $g->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('admin.galeri.destroy', $g->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')">Hapus</button>
                        </form>

                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>

@endsection
