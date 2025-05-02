@extends('layout.app')
@section('content')
<div class="pagetitle">
    <h1>Edit Data Fasilitas Kesehatan</h1>
    <nav>
      {{-- <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Forms</li>
        <li class="breadcrumb-item active">Elements</li>
      </ol> --}}
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Fasilitas Kesehatan</h5>

            <!-- General Form Elements -->
            <form action="{{ route('faskes.update', $faskes->id) }}" method="POST">
                @csrf
                @method('PUT') {{-- atau PATCH --}}
                <div class="row mb-3">
                  <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" value="{{ old('nama', $faskes->nama) }}">
                    @error('nama')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="alamat" value="{{ old('alamat', $faskes->alamat) }}">
                    @error('alamat')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="telepon" class="col-sm-2 col-form-label">Telepon</label>
                  <div class="col-sm-10">
                    <input type="text" name="telepon" class="form-control" value="{{ old('telepon', $faskes->telepon) }}">
                    @error('telepon')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="row mb-3">
                    <label for="urlmaps" class="col-sm-2 col-form-label">Url Maps</label>
                    <div class="col-sm-10">
                      <input type="text" name="urlmaps" class="form-control" value="{{ old('urlmaps', $faskes->urlmaps) }}">
                      @error('urlmaps')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{ route('faskes.index') }}" class="btn btn-warning">Kembali</a>
                </div>
            </form><!-- End General Form Elements -->

          </div>
        </div>

      </div>
    </div>
</section>
@endsection
