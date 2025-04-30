@extends('layout.app')
@section('content')

<div class="pagetitle">
    <h1>Data Kecamatan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active">Data Kecamatan</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Rekap Data Kecamatan</h5>

                    @if(session('success'))
                        <div class="alert alert-info">
                            {{ session('success') }}
                        </div>
                    @endif

                    <a href="/addkecamatan" class="btn btn-success mb-3">Tambah Data Kecamatan</a>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                {{-- <th>Id Kecamatan</th> --}}
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kecamatan as $index => $kec)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                {{-- <td>{{ $kec->id }}</td> --}}
                                <td>{{ $kec->nama }}</td>
                                <td>
                                    <a href="{{ route('kecamatan.edit', $kec->id) }}" class="btn btn-primary">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    <form action="{{ route('kecamatan.destroy', $kec->id) }}" method="POST" style="display:inline;">
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
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>

@endsection
