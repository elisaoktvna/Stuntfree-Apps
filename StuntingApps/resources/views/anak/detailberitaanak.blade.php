@extends('layout.app')

@section('content')
<div class="container my-5">
    <div class="row g-4">
        {{-- Main Content --}}
        <div class="col-lg-8">
            {{-- Banner Image --}}
            @if($edukasi->image)
                <div class="mb-4 rounded-4 overflow-hidden shadow-sm" style="height: 300px;">
                    <img src="{{ asset('storage/image/' . $edukasi->image) }}" alt="{{ $edukasi->judul }}"
                         class="w-100 h-100" style="object-fit: cover;">
                </div>
            @endif

            {{-- Content Box --}}
            <div class="bg-white rounded-4 shadow-sm p-4">
                <h1 class="fw-bold text-primary mb-2">{{ $edukasi->judul }}</h1>

                <div class="d-flex align-items-center mb-3">
                    <span class="badge bg-secondary me-3">{{ $edukasi->kategori }}</span>
                    <small class="text-muted">{{ \Carbon\Carbon::parse($edukasi->created_at)->format('d-m-Y') }}</small>
                </div>

                <div class="text-justify" style="line-height: 1.6; white-space: pre-line;">
                    {!! nl2br(e($edukasi->content)) !!}
                </div>
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="col-lg-4">
            <div class="sticky-top" style="top: 90px; max-height: 80vh; overflow-y: auto;">
                <h5 class="mb-3 fw-semibold">Berita Lainnya</h5>

                @forelse($otherEdukasi as $item)
                    <div class="card mb-3 shadow-sm rounded-3">
                        @if($item->image)
                            <img src="{{ asset('storage/image/' . $item->image) }}" class="card-img-top" style="height: 120px; object-fit: cover;" alt="{{ $item->judul }}">
                        @endif
                        <div class="card-body">
                            <h6 class="card-title fw-bold">{{ Str::limit($item->judul, 50) }}</h6>
                            <small class="text-muted">{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</small>
                            <a href="{{ route('anak.edukasi.show', [$anak->id, $item->id]) }}" class="stretched-link"></a>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">Tidak ada berita lain.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
