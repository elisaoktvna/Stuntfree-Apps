@extends('layout.app');
@section('content')
<div class="pagetitle">
    <h1>Data Tables</h1>
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
            <h5 class="card-title">Data Pengukuran</h5>
            <p>Berikut merupakan detail dari data Pengukuran</p>

            <!-- Table with stripped rows -->
            <a href="/addpengukuran" class="btn btn-success mb-3">Tambah Data Pengukuran</a>
            <table class="table datatable">
              <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Anak</th>
                    <th>Jenis Kelamin</th>
                    <th>Usia (bulan)</th>
                    <th>BB (kg)</th>
                    <th>TB (cm)</th>
                    <th>BMI</th>
                    <th>Z-Score TB/U</th>
                    <th>Z-Score BMI/U</th>
                    <th>Status Gizi BMI</th>
                    <th>Hasil Model</th>
                    <th>Tanggal</th>
                </tr>
              </thead>
              <tbody>
                @forelse($pengukuran as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->anak->nama }}</td>
                    <td>{{ $item->anak->jenis_kelamin == 1 ? 'Laki-laki' : 'Perempuan' }}</td>
                    <td>{{ $item->usia_bulan }}</td>
                    <td>{{ $item->berat }}</td>
                    <td>{{ $item->tinggi }}</td>
                    <td>{{ $item->bmi ?? '-' }}</td>
                    <td>{{ $item->zs_tbu ?? '-' }}</td>
                    <td>{{ $item->zs_bmi_u ?? '-' }}</td>
                    <td>{{ $item->status_gizi_bmi ?? '-' }}</td>
                    <td>{{ $item->hasil ?? '-' }}</td>
                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="14" class="text-center">Belum ada data pengukuran.</td>
                </tr>
            @endforelse

              </tbody>
            </table>

          </div>
        </div>

      </div>
    </div>
  </section>
@endsection
