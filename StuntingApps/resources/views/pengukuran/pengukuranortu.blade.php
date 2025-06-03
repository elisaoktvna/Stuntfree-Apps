@extends('layout.app')

@section('content')
<div class="pagetitle">
    <h1>Data Pengukuran Anak</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Pengukuran</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @forelse ($anakList as $anak)
                @php
                    $pengukuranAnak = $anak->pengukuran->sortByDesc('created_at');
                    $pengukuranTerbaru = $pengukuranAnak->first();
                    $pengukuranLainnya = $pengukuranAnak->slice(1);
                @endphp

                <div class="card mb-5">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Data Pengukuran - {{ $anak->nama }}</h5>

                        @if($pengukuranTerbaru)
                            <div class="mb-4 p-3 border rounded shadow-sm bg-light">
                                <h6>Pengukuran Terbaru</h6>
                                <p><strong>Usia:</strong> {{ $pengukuranTerbaru->usia_bulan }} bulan</p>
                                <p><strong>Berat:</strong> {{ $pengukuranTerbaru->berat }} kg</p>
                                <p><strong>Tinggi:</strong> {{ $pengukuranTerbaru->tinggi }} cm</p>
                                <p><strong>Hasil Prediksi:</strong> {{ $pengukuranTerbaru->hasil }}</p>
                                <p><strong>BMI:</strong> {{ $pengukuranTerbaru->bmi ?? '-' }}</p>
                                <p><strong>Z-Score TB/U:</strong> {{ $pengukuranTerbaru->zs_tbu ?? '-' }}</p>
                                <p><strong>Z-Score BMI/U:</strong> {{ $pengukuranTerbaru->zs_bmi_u ?? '-' }}</p>
                                <p><strong>Status Gizi:</strong> {{ $pengukuranTerbaru->status_gizi_bmi ?? '-' }}</p>
                                <p><strong>Tanggal:</strong> {{ $pengukuranTerbaru->created_at->format('d-m-Y') }}</p>

                                {{-- <a href="{{ route('detail.anak', $anak->id) }}" class="btn btn-outline-primary rounded-pill">
                                    <i class="bi bi-person-lines-fill"></i> Detail Anak
                                </a> --}}
                            </div>
                        @else
                            <p class="text-muted">Belum ada pengukuran untuk anak ini.</p>
                        @endif

                        @if($pengukuranLainnya->count() > 0)
                            <h6>Riwayat Sebelumnya</h6>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Usia (bulan)</th>
                                            <th>BB (kg)</th>
                                            <th>TB (cm)</th>
                                            <th>BMI</th>
                                            <th>Hasil Prediksi</th>
                                            <th>Z-Score TB/U</th>
                                            <th>Z-Score BMI/U</th>
                                            <th>Status Gizi</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pengukuranLainnya as $i => $item)
                                            <tr>
                                                <td>{{ $i + 1 }}</td>
                                                <td>{{ $item->anak->nama }}</td>
                                                <td>{{ $item->usia_bulan }}</td>
                                                <td>{{ $item->berat }}</td>
                                                <td>{{ $item->tinggi }}</td>
                                                <td>{{ $item->bmi ?? '-' }}</td>
                                                <td>{{ $item->hasil }}</td>
                                                <td>{{ $item->zs_tbu ?? '-' }}</td>
                                                <td>{{ $item->zs_bmi_u ?? '-' }}</td>
                                                <td>{{ $item->status_gizi_bmi ?? '-' }}</td>
                                                <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <p class="text-center">Belum ada data anak atau pengukuran.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
