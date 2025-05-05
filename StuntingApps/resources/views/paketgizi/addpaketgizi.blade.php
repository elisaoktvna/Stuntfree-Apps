@extends('layout.app')

@section('content')
<div class="pagetitle">
    <h1>Tambah Tempat Paket Gizi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item">Forms</li>
            <li class="breadcrumb-item active">Tambah Paket Gizi</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-body pt-4">
        <form action="{{ route('paketgizi.store') }}" method="POST">
            @csrf

            <div class="row mb-3">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" required placeholder="Nama">
                </div>
            </div>

            <div class="row mb-3">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" name="alamat" class="form-control" required placeholder="Alamat">
                </div>
            </div>

            <div class="row mb-3">
                <label for="telepon" class="col-sm-2 col-form-label">Telepon</label>
                <div class="col-sm-10">
                    <input type="text" name="telepon" class="form-control" required placeholder="Nomor Telepon">
                </div>
            </div>

            <div class="row mb-3">
                <label for="urlmaps" class="col-sm-2 col-form-label">Google Maps URL</label>
                <div class="col-sm-10">
                    <input type="url" name="urlmaps" class="form-control" required placeholder="https://maps.google.com/...">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('paketgizi.index') }}" class="btn btn-warning">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
