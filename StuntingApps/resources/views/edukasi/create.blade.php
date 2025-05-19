@extends('layout.app')
@section('content')
<div class="pagetitle">
    <h1>Tambah Data Edukasi</h1>
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
            <h5 class="card-title">Data Edukasi</h5>

            <!-- General Form Elements -->
            <form action="{{ route('edukasi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="id_anak" class="col-sm-2 col-form-label">Id Anak</label>
                    <div class="col-sm-10">
                        <select name="id_anak" required>
                            @foreach ($anak as $index => $an)
                                <option value="{{ $anak->id }}">{{ $anak->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="id_pengukuran" class="col-sm-2 col-form-label">Id Pengukuran</label>
                    <div class="col-sm-10">
                        <select name="id_pengukuran" required>
                            @foreach ($pengukuran as $pk)
                                <option value="{{ $pk->id }}">Pengukuran {{ $pk->created_at->format('d M Y') }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
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
                  <label for="content" class="col-sm-2 col-form-label">Konten</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="content" value="{{ old('konten') }}">
                    @error('konten')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="row mb-3">
                <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                    <select name="kategori" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="stunting">Stunting</option>
                        <option value="normal">Normal</option>
                        <option value="tall">Tall</option>
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
                    @error('gambar')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="{{ route('edukasi.index') }}" class="btn btn-warning">Kembali</a>
                </div>
            </form><!-- End General Form Elements -->

          </div>
        </div>

      </div>
    </div>
</section>
@endsection
