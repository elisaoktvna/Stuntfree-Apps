@extends('layout.app');
@section('content')
<div class="pagetitle">
    <h1>Data Anak</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
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

            <!-- Table with stripped rows -->
            {{-- <a href="/addanak" class="btn btn-success mb-3">Tambah Data Anak</a> --}}
            <section class="py-5" style="background-color: #f8f9ff;">
                <div class="container">
                    <div class="row g-4">
                    @foreach ($anak as $item)
                        <div class="col-md-4 fade-up">
                        <div class="card h-100 border-0 shadow rounded-4 p-3">
                    <div class="card-body">
                        <h5 class="card-title mb-3 fw-bold text-primary">Data Anak</h5>

                        <p class="card-text text-muted mb-1">
                            <i class="bi bi-person-badge me-2"></i> <strong>NIK:</strong> {{ $item->nik }}
                        </p>
                        <p class="card-text text-muted mb-1">
                            <i class="bi bi-person me-2"></i> <strong>Nama:</strong> {{ $item->nama }}
                        </p>
                        <p class="card-text text-muted mb-1">
                            <i class="bi bi-gender-ambiguous me-2"></i>
                            <strong>Jenis Kelamin:</strong>
                            {{ $item->jenis_kelamin == 1 ? 'Laki-laki' : 'Perempuan' }}
                        </p>
                        <p class="card-text text-muted mb-1">
                            <i class="bi bi-calendar-event me-2"></i> <strong>Tanggal Lahir:</strong> {{ $item->tanggal_lahir }}
                        </p>
                        <p class="card-text text-muted mb-1">
                            <i class="bi bi-check-circle me-2"></i> <strong>Status:</strong> {{ $item->status }}
                        </p>

                        <a href="" class="btn btn-outline-primary rounded-pill w-100">
                            <i class="bi bi-bar-chart"></i> Prediksi
                        </a>
                    </div>
                </div>
                </div>
                @endforeach
                </div>
            </div>
            </section>


          </div>
        </div>

      </div>
    </div>
  </section>
@endsection







           