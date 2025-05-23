@extends('layout.app')

@section('content')
<div class="container py-4">

    {{-- Detail Anak & Hasil Pengukuran Terbaru --}}
    <div class="card shadow-sm rounded-4 p-4 mb-5 bg-white border-0">
        <h2 class="text-primary fw-bold" style="font-size: 2.5rem;">{{ $anak->nama }}</h2>
        <div class="row g-4 mt-2">
            <div class="col-md-4">
                <div class="fw-bold text-muted">NIK</div>
                <div class="fs-5">{{ $anak->nik }}</div>
            </div>
            <div class="col-md-4">
                <div class="fw-bold text-muted">Jenis Kelamin</div>
                <div class="fs-5">{{ $anak->jenis_kelamin == 1 ? 'Laki-laki' : 'Perempuan' }}</div>
            </div>
            <div class="col-md-4">
                <div class="fw-bold text-muted">Tanggal Lahir</div>
                <div class="fs-5">{{ $anak->tanggal_lahir }}</div>
            </div>
        </div>

        <hr class="my-4">

        <h4 class="text-primary fw-bold mb-3">Hasil Pengukuran Terbaru</h4>
        @if($anak->pengukuran->isNotEmpty())
            @php
                $terbaru = $anak->pengukuran->first();
            @endphp
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="fw-bold text-muted">Tanggal</div>
                    <div class="fs-5">{{ $terbaru->created_at->format('d-m-Y') }}</div>
                </div>
                <div class="col-md-3">
                    <div class="fw-bold text-muted">Berat</div>
                    <div class="fs-5">{{ $terbaru->berat }} kg</div>
                </div>
                <div class="col-md-3">
                    <div class="fw-bold text-muted">Tinggi</div>
                    <div class="fs-5">{{ $terbaru->tinggi }} cm</div>
                </div>
                <div class="col-md-3">
                    <div class="fw-bold text-muted">Usia</div>
                    <div class="fs-5">{{ $terbaru->usia_bulan }} bulan</div>
                </div>
            </div>

            <div class="row g-4 mt-3">
                <div class="col-md-3">
                    <div class="fw-bold text-muted">Z-Score TBU</div>
                    <div class="fs-5">{{ $terbaru->zs_tbu ?? '-' }}</div>
                </div>
                <div class="col-md-3">
                    <div class="fw-bold text-muted">BMI</div>
                    <div class="fs-5">{{ $terbaru->bmi ?? '-' }}</div>
                </div>
                <div class="col-md-3">
                    <div class="fw-bold text-muted">Status Gizi BMI</div>
                    <div class="fs-5">{{ $terbaru->status_gizi_bmi ?? '-' }}</div>
                </div>
                <div class="col-md-3">
                    <div class="fw-bold text-muted">Hasil Model</div>
                    <div class="fs-5">
                        <span class="badge bg-primary text-white">{{ $terbaru->hasil ?? '-' }}</span>
                    </div>
                </div>
            </div>
        @else
            <p class="text-muted mb-0">Belum ada data pengukuran.</p>
        @endif
    </div>

    {{-- Judul Edukasi --}}
    <h3 class="mb-4 text-primary fw-bold">Edukasi Terbaru</h3>

    {{-- Grid Edukasi --}}
<div class="row g-4">
    @if($anak->latestEdukasi)
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                @if($anak->latestEdukasi->image)
                    <img src="{{ asset('storage/' . $anak->latestEdukasi->image) }}" class="card-img-top rounded-top-4" style="height: 200px; object-fit: cover;">
                @endif
                <div class="card-body d-flex flex-column">
                    <h3 class="card-title fw-bold text-primary" style="font-size: 2rem; margin-bottom: 0;">
                        {{ $anak->latestEdukasi->judul }}
                    </h3>

                    <div class="mb-2">
                        <span class="badge bg-secondary">{{ $anak->latestEdukasi->kategori }}</span>
                        <span class="text-muted ms-2" style="font-size: 0.95rem;">
                            {{ \Carbon\Carbon::parse($anak->latestEdukasi->created_at)->format('d-m-Y') }}
                        </span>
                    </div>
                    <p class="card-text">{{ Str::limit($anak->latestEdukasi->content, 100) }}</p>

                    <div class="mt-auto d-flex justify-content-end">
                        <a href="{{ route('anak.edukasi.show', [$anak->id, $anak->latestEdukasi->id]) }}"
                            class="btn btn-outline-primary rounded-pill">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="col">
            <p class="text-muted">Tidak ada edukasi tersedia.</p>
        </div>
    @endif
</div>




</div>
@endsection
