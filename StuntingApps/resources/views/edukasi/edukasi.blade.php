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
            <a href="{{ route('edukasi.create') }}" class="btn btn-success mb-3">Tambah Data Edukasi</a>
            <table class="table datatable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Konten</th>
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
                    <td>
                        @if ($edukasi->image)
                        <img src="{{ asset('storage/' . $edukasi->gambar) }}" width="100">
                        @else
                        Tidak ada gambar
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('edukasi.edit', $edukasi->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ url('edukasi/delete/' . $edukasi->id) }}" method="POST" style="display:inline;">
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
