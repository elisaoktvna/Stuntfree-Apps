@extends('layout.app')
@section('content')
<div class="pagetitle">
      <h1>Edit Data Anak</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Elements</li>
        </ol>
      </nav>
    </div>

{{-- <div class="pagetitle">
    <h1>Edit Anak</h1>
</div> --}}

<section class="section">
    <div class="row">
        <div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Edit Anak</h5>

                    <form action="{{ route('anak.update', $anak->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="nama" name="nama" value="{{ $anak->nama }}" required>
                            </div>
                          </div>
                        
                          <div class="row mb-3">
                            <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="Laki-laki" {{ old('jenis_kelamin', $anak->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin', $anak->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        
                          <div class="row mb-3">
                            <label for="umur" class="col-sm-2 col-form-label">Umur</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="umur" name="umur" value="{{ $anak->umur }}" required>
                            </div>
                          </div>
                        
                          <div class="row mb-3">
                            <label for="tanggallahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                              <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $anak->tanggal_lahir }}" required>
                            </div>
                          </div>
                        
                          <div class="row mb-3">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $anak->alamat }}" required>
                            </div>
                          </div>

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="{{ route('anak.index') }}" class="btn btn-secondary">Batal</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
