@extends('layout.app')
@section('content')
<div class="pagetitle">
    <h1>Edit Data Edukasi</h1>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Data Edukasi</h5>

                    <form action="{{ url('edukasi/update/' . $edukasi->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="judul" value="{{ old('judul', $edukasi->judul) }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="content" class="col-sm-2 col-form-label">Konten</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="content">{{ old('content', $edukasi->content) }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <select class="form-control" name="kategori" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Stunting" {{ old('kategori') == 'stunting' ? 'selected' : '' }}>Stunting</option>
                            <option value="Normal" {{ old('kategori') == 'normal' ? 'selected' : '' }}>Normal</option>
                            <option value="Tall" {{ old('kategori') == 'tall' ? 'selected' : '' }}>Tall</option>
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
                                @if($edukasi->image)
                                <div class="mt-2">
                                    <p>Gambar Saat Ini:</p>
                                    <img src="{{ asset('storage/' . $edukasi->image) }}" width="200" class="img-thumbnail">
                                </div>
                                @endif
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
