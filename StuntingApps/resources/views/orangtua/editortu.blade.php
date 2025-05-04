@extends('layout.app')
@section('content')
<div class="pagetitle">
    <h1>Form Elements</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Forms</li>
        <li class="breadcrumb-item active">Elements</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div>

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">General Form Elements</h5>

            <!-- General Form Elements -->
            <form action="/update/{{ $ortu->id }}" method="POST">
                @csrf
                @method('PUT')
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama" value="{{ $ortu->nama }}">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" name="email" value="{{ $ortu->email }}">
                </div>
              </div>
              {{-- <div class="row mb-4">
                <label class="col-sm-2 col-form-label">Kecamatan</label>
                <div class="col-sm-10">
                  <select name="id_kecamatan" class="form-select" aria-label="Default select example" name="role">
                    <option selected>Pilih Kecamatan</option>
                    @foreach ($kec as $k)
                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                    @endforeach
                  </select>
                </div>
              </div> --}}
              <div class="row mb-3">
                <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="alamat" rows="3">{{ $ortu->alamat }}</textarea>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <a href="/ortu" class="btn btn-warning">kembali</a>
                </div>
              </div>


            </form><!-- End General Form Elements -->

          </div>
        </div>

      </div>


    </div>
  </section>
@endsection
