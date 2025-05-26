@extends('layout.app');
@section('content')
<div class="pagetitle">
    <h1>Data Template Edukasi</h1>
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
            <h5 class="card-title">Data Template Edukasi</h5>
            <p>Berikut merupakan detail dari data Template Edukasi</p>

            <!-- Table with stripped rows -->
            <a href="{{ route('template_edukasi.create') }}" class="btn btn-success mb-3">Tambah Data Template Edukasi</a>
            <table class="table datatable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Content</th>
                  <th>Kategori</th>
                  <th>Gambar</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($templates as $template)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $template->judul }}</td>
                    <td>{{ $template->content }}</td>
                    <td>{{ $template->kategori }}</td>
                    <td>
                        @if ($template->image)
                        <img src="{{ asset('storage/' . $template->image) }}" alt="Gambar Edukasi" width="100">
                        @else
                            Tidak Ada Gambar
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('template_edukasi.edit', $template->id) }}" class="btn btn-primary">
                            <i class="bx bx-edit"></i>
                        </a>
                        <form action="{{ route('template_edukasi.destroy', $template->id) }}" method="POST" style="display:inline;">
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
