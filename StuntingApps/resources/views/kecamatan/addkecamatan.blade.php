@extends('layout.app')

@section('content')
<div class="pagetitle">
      <h1>Tambah Data Kecamatan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Elements</li>
        </ol>
      </nav>
    </div>

    <div class="card">
            <div class="card-body">
              <h5 class="card-title">General Form Elements</h5>


              <!-- General Form Elements -->
              <form action="{{ route('kecamatan.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nama Kecamatan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="/kecamatan" class="btn btn-warning">kembali</a>
                  </div>
                </div>

              </form>
            </div>
          </div>



@endsection
