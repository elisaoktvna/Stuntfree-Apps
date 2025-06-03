@extends('layout.app')

@section('content')
<div class="pagetitle">
    <h1>Data Anak</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">Data Anak</li>
      </ol>
    </nav>
</div>

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Data Anak</h5>
          <p>Berikut merupakan detail dari data Anak</p>

          @if(session('success'))
              <div class="alert alert-info">
                  {{ session('success') }}
              </div>
          @endif

          {{-- Tombol Tambah Data Anak --}}
          <a href="{{ route('anak.create') }}" class="btn btn-success mb-4">+ Tambah Data Anak</a>

          <!-- Kartu Data Anak -->
          <section class="py-3" style="background-color: #f8f9ff;">
              <div class="container">
                  <div class="row g-4">
                  @forelse ($anak as $item)
                      <div class="col-md-4 fade-up">
                          <div class="card h-100 border-0 shadow rounded-4 p-3 position-relative">
                              {{-- Tombol Aksi Kanan Atas --}}
                              <div class="position-absolute top-0 end-0 mt-3 me-3 z-3 d-flex">
                                  <a href="{{ route('anak.show', $item->id) }}" class="btn btn-sm btn-outline-info me-1" title="Detail">
                                      <i class="bi bi-eye"></i>
                                  </a>
                                  {{-- <a href="{{ route('anak.edit', $item->id) }}" class="btn btn-sm btn-outline-warning me-1" title="Edit">
                                      <i class="bi bi-pencil-square"></i>
                                  </a> --}}
                                  <form action="{{ route('anak.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data anak ini?');">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                          <i class="bi bi-trash"></i>
                                      </button>
                                  </form>
                              </div>

                              <div class="card-body pt-5">
                                  <h5 class="card-title mb-3 fw-bold text-primary">Data Anak</h5>

                                  <p class="card-text text-muted mb-1">
                                      <i class="bi bi-person-badge me-2"></i> <strong>NIK:</strong> {{ $item->nik }}
                                  </p>
                                  <p class="card-text text-muted mb-1">
                                      <i class="bi bi-person me-2"></i> <strong>Nama:</strong> {{ $item->nama }}
                                  </p>
                                  <p class="card-text text-muted mb-1">
                                      <i class="bi bi-gender-ambiguous me-2"></i> <strong>Jenis Kelamin:</strong>
                                      {{ $item->jenis_kelamin == 1 ? 'Laki-laki' : 'Perempuan' }}
                                  </p>
                                  <p class="card-text text-muted mb-1">
                                      <i class="bi bi-calendar-event me-2"></i> <strong>Tanggal Lahir:</strong> {{ $item->tanggal_lahir }}
                                  </p>
                                  <p class="card-text text-muted mb-3">
                                      <i class="bi bi-check-circle me-2"></i> <strong>Status:</strong> {{ ucfirst($item->status) }}
                                  </p>

                                  {{-- Tombol Prediksi --}}
                                  @if(strtolower($item->status) == 'diterima')
                                      <a href="{{ route('addpengukuran', ['id' => $item->id]) }}" class="btn btn-outline-primary rounded-pill w-100">
                                          <i class="bi bi-bar-chart"></i> Prediksi
                                      </a>
                                  @else
                                      <button class="btn btn-outline-secondary rounded-pill w-100" disabled>
                                          <i class="bi bi-bar-chart"></i> Menunggu Verifikasi
                                      </button>
                                  @endif
                              </div>
                          </div>
                      </div>
                  @empty
                      <p class="text-center">Belum ada data anak.</p>
                  @endforelse
                  </div>
              </div>
          </section>

        </div>
      </div>

    </div>
  </div>
</section>
@endsection
