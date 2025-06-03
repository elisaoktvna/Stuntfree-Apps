@extends('layout.app')

@section('content')
<div class="pagetitle">
    <h1>Input Pengukuran Anak</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item">Pengukuran</li>
        <li class="breadcrumb-item active">Input Data</li>
      </ol>
    </nav>
</div>

<section class="section">
  <div class="row">
    <div class="">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Form Input Pengukuran</h5>

          @if(session('success'))
              <div class="alert alert-success">{{ session('success') }}</div>
          @elseif(session('error'))
              <div class="alert alert-danger">{{ session('error') }}</div>
          @endif

          <form action="/addpengukur" method="POST">
            @csrf

            {{-- ID Anak --}}
            <input type="hidden" name="id_anak" value="{{ $anak->id }}">

            <div class="mb-3">
              <label class="form-label">Nama Anak</label>
              <input type="text" value="{{ $anak->nama }}" class="form-control" readonly>
            </div>

            <div class="mb-3">
              <label for="berat" class="form-label">Berat Badan (kg)</label>
              <input type="number" step="0.01" name="berat" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="tinggi" class="form-label">Tinggi Badan (cm)</label>
              <input type="number" step="0.01" name="tinggi" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="usia_bulan" class="form-label">Usia (bulan)</label>
              <input type="number" name="usia_bulan" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Prediksi & Simpan</button>
          </form>

        </div>
      </div>

    </div>
  </div>
</section>
@endsection
