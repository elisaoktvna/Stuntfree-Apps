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
              <form action="/addanakcreate" method="POST">
                @csrf

                {{-- @if (Auth::user()->role == 'admin') --}}
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label">Pilih Data ortu</label>
                    <div class="col-sm-10">
                      <select name="id_orangtua" class="form-select" aria-label="Default select example" >
                        <option selected>Pilih Orang Tua</option>
                       @foreach ($ortu as $user)
                        <option value="{{ $user->id }}">{{ $user->nama }}</option>

                       @endforeach
                      </select>
                    </div>
                  </div>
                  {{-- @endif --}}

                  <div class="row mb-3">
                    <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" required>
                    </div>
                  </div>

                <div class="row mb-3">
                  <label for="nama" class="col-sm-2 col-form-label">Nama Anak</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                  </div>
                </div>

                <div class="row mb-3">
                    <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="1" {{ (old('jenis_kelamin', $anak->jenis_kelamin ?? '') == 1 ) ? 'selected' : '' }}>Laki-laki</option>
                            <option value="0" {{ (old('jenis_kelamin', $anak->jenis_kelamin ?? '') == 0 ) ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                  <label for="tanggallahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                  </div>
                </div>

                {{-- <div class="row mb-3">
                  <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
                  </div>
                </div> --}}
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
