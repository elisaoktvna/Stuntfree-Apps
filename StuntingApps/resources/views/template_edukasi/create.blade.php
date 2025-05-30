@extends('layout.app')
@section('content')
<div class="pagetitle">
    <h1>Tambah Data Template Edukasi</h1>
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
            <h5 class="card-title">Data Template Edukasi</h5>

            <!-- General Form Elements -->
            <form action="{{ route('template_edukasi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                  <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="judul" value="{{ old('judul') }}">
                    @error('judul')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="content" class="col-sm-2 col-form-label">Content</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="content" value="{{ old('content') }}">
                    @error('content')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="row mb-3">
                <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                    <select name="kategori" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Resiko Tinggi Stunting">Resiko Tinggi Stunting</option>
                        <option value="Stunting">Stunting</option>
                        <option value="Normal">Normal</option>
                        <option value="Resiko Gizi Lebih">Resiko Gizi Lebih</option>
                    </select>
                    @error('kategori')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                </div>

                <div class="row mb-3">
                  <label for="image" class="col-sm-2 col-form-label">Gambar</label>
                  <div class="col-sm-10">
                    <input type="file" name="image" class="form-control">
                    @error('image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{ route('templateedukasi.index') }}" class="btn btn-warning">Kembali</a>
                </div>
            </form><!-- End General Form Elements -->

          </div>
        </div>

      </div>
    </div>
</section>
@endsection
