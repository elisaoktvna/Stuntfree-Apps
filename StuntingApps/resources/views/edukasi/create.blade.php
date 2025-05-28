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
                    <label for="id_anak" class="col-sm-2 col-form-label">Anak</label>
                    <div class="col-sm-10">
                        <select name="id_anak" required>
                            <option value="">-- Pilih Anak --</option>
                            @foreach ($anak as $a)
                                <option value="{{ $a->id }}">{{ $a->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="id_pengukuran" class="col-sm-2 col-form-label">Pengukuran</label>
                    <div class="col-sm-10">
                        <select name="id_pengukuran" required>
                            @foreach ($pengukuran as $p)
                                <option value="">-- Pilih Pengukuran --</option>
                                <option value="{{ $p->id }}"> Status: {{ $p->hasil }}</option>
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
