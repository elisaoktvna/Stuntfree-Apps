@extends('layout.app');
@section('content')
<div class="pagetitle">
    <h1>Data Fasilitas Kesehatan</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">Data</li>
      </ol>
    </nav>
  </div>

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Fasilitas Kesehatan</h5>
            <p>Berikut merupakan detail dari data Fasilitas Kesehatan</p>

            <!-- Table with stripped rows -->
            <a href="{{ route('faskes.create') }}" class="btn btn-success mb-3">Tambah Data Faskes</a>
            <table class="table datatable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Telepon</th>
                  <th>Url Maps</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($faskess as $faskes)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $faskes->nama }}</td>
                    <td>{{ $faskes->alamat }}</td>
                    <td>{{ $faskes->telepon }}</td>
                    <td>{{ $faskes->urlmaps }}</td>
                    <td>
                      <a href="{{ route('faskes.edit', $faskes->id) }}" class="btn btn-primary">
                        <i class="bx bx-edit"></i>
                      </a>
                      <form action="{{ route('faskes.destroy', $faskes->id) }}" method="POST" style="display:inline;">
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
