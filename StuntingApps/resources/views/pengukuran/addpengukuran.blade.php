@extends('layout.app')

@section('content')
<div class="container">
    <h3>Input Pengukuran Anak</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="/addpengukur" method="POST">
        @csrf

        <div class="mb-3">
            <label for="id_anak" class="form-label">Nama Anak</label>
            <select name="id_anak" class="form-control" required>
                <option value="">-- Pilih Anak --</option>
                @foreach($anak as $a)
                    <option value="{{ $a->id }}">{{ $a->nama }}</option>
                @endforeach
            </select>
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
@endsection
