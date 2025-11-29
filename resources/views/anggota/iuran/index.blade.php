@extends('layouts.anggota')

@section('content')
<h3 class="mb-3">Riwayat Iuran</h3>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Bulan</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($iuran as $i)
                <tr>
                    <td>{{ $i->bulan }}</td>
                    <td>Rp {{ number_format($i->jumlah) }}</td>
                    <td>{{ $i->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
