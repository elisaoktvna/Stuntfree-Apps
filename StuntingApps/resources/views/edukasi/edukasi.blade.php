@extends('layout.app');
@section('content')
<div class="pagetitle">
    <h1>Data Edukasi</h1>
    <nav>
      {{-- <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">Data</li>
      </ol> --}}
    </nav>
  </div>

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Edukasi</h5>
            <p>Berikut merupakan detail dari data Edukasi</p>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Konten</th>
                  <th>Kategori</th>
                  <th>Gambar</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($edukasis as $edukasi)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $edukasi->judul }}</td>
                    <td>{{ $edukasi->content }}</td>
                    <td>{{ $edukasi->kategori }}</td>
                    <td>
                        @if ($edukasi->image)
                        <img src="{{ Storage::url($edukasi->image) }}" alt="Gambar Edukasi" width="100">
                        @else
                            Tidak Ada Gambar
                        @endif
                    </td>
                    <td>
                        {{-- <a href="{{ route('edukasi.edit', $edukasi->id) }}" class="btn btn-primary">
                            <i class="bx bx-edit"></i>
                        </a> --}}
                        <form action="{{ route('edukasi.destroy', $edukasi->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                <i class="bx bxs-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach

              </tbody>
            </table>

          </div>
        </div>

      </div>
    </div>
  </section>
@endsection
