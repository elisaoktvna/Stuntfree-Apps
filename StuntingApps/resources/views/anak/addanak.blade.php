@extends('layout.app')

@section('content')
<div class="pagetitle">
      <h1>Tambah Data Anak</h1>
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
              <form action="{{ route('anak.store') }}" method="POST">
                @csrf
              
                <div class="row mb-3">
                  <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                  </div>
                </div>
              
                <div class="row mb-3">
                    <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="Laki-laki" {{ (old('jenis_kelamin', $anak->jenis_kelamin ?? '') == 'Laki-laki') ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ (old('jenis_kelamin', $anak->jenis_kelamin ?? '') == 'Perempuan') ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                </div>
              
                <div class="row mb-3">
                  <label for="umur" class="col-sm-2 col-form-label">Umur</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="umur" name="umur" placeholder="Umur" required>
                  </div>
                </div>
              
                <div class="row mb-3">
                  <label for="tanggallahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                  </div>
                </div>
              
                <div class="row mb-3">
                  <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
                  </div>
                </div>
              
                {{-- <div class="text-end">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form> --}}
              
                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="/anak" class="btn btn-warning">kembali</a>
                  </div>
                </div>

              </form>
            </div>
          </div>



@endsection