@extends('layout.app')
@section('content')
<div class="pagetitle">
    <h1>Edit Data Template Edukasi</h1>
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
            <form action="{{ url('templateedukasi/update/' . $template->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="row mb-3">
                            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="judul" value="{{ old('judul', $template->judul) }}">
                            </div>
                 </div>
                <div class="row mb-3">
                        <label for="content" class="col-sm-2 col-form-label">content</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="content">{{ old('content', $template->content) }}</textarea>
                        </div>
                </div>

                <div class="row mb-3">
                    <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="kategori" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Resiko Tinggi Stunting" {{ old('kategori', $template->kategori) == 'Resiko Tinggi Stunting' ? 'selected' : '' }}>Resiko Tinggi Stunting</option>
                            <option value="Stunting" {{ old('kategori', $template->kategori) == 'Stunting' ? 'selected' : '' }}>Stunting</option>
                            <option value="Normal" {{ old('kategori', $template->kategori) == 'Normal' ? 'selected' : '' }}>Normal</option>
                            <option value="Resiko Gizi Lebih" {{ old('kategori', $template->kategori) == 'Resiko Gizi Lebih' ? 'selected' : '' }}>Resiko Gizi Lebih</option>
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
                                @if($template->image)
                                <div class="mt-2">
                                    <p>Gambar Saat Ini:</p>
                                    <img src="{{ asset('storage/image/' . $template->image) }}" width="200" class="img-thumbnail">
                                </div>
                                @endif
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
