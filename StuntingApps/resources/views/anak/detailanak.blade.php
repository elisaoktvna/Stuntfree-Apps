@extends('layout.app')

@section('content')
<div class="container">
    <h2>Detail Anak</h2>

    <p><strong>Nama:</strong> {{ $anak->nama }}</p>
    <p><strong>NIK:</strong> {{ $anak->nik }}</p>
    <p><strong>Jenis Kelamin:</strong> {{ $anak->jenis_kelamin == 1 ? 'Laki-laki' : 'Perempuan' }}</p>
    <p><strong>Tanggal Lahir:</strong> {{ $anak->tanggal_lahir }}</p>

    <hr>

    <h4>Edukasi Terbaru</h4>
    @if($anak->latestEdukasi)
        <p><strong>Kategori:</strong> {{ $anak->latestEdukasi->kategori }}</p>
        <p><strong>Judul:</strong> {{ $anak->latestEdukasi->judul }}</p>
        <p>{{ $anak->latestEdukasi->content }}</p>
        @if($anak->latestEdukasi->image)
            <img src="{{ asset('storage/' . $anak->latestEdukasi->image) }}" width="200">
        @endif
    @else
        <p>Tidak ada edukasi tersedia.</p>
    @endif
</div>
@endsection
