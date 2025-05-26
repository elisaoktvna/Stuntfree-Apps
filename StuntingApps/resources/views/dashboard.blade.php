@extends('layout.app')
@section('content')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div>

  <section class="section dashboard">
    <div class="row">

      <div class="col-lg-8">
        <div class="row">
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
              <div class="card-body">
                <h5 class="card-title">Total Anak</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $totalAnak }}</h6>
                    {{-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">
              <div class="card-body">
                <h5 class="card-title">Total Orang Tua</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $totalOrtu }}</h6>
                </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xxl-4 col-xl-12">
            <div class="card info-card customers-card">
              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>
                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>
              <div class="card-body">
                <h5 class="card-title">Customers <span>| This Year</span></h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>1244</h6>
                    <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12">
            <div class="card">
              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            
              </div>

              <div class="card-body">
                <h5 class="card-title">Laporan <span>/Anak Stunting</span></h5>

                <!-- Line Chart -->
               <div id="reportsChart"></div>

                <script>
                document.addEventListener("DOMContentLoaded", () => {
                    const labels = {!! json_encode($labels) !!};
                    const data = {!! json_encode($data) !!};

                    new ApexCharts(document.querySelector("#reportsChart"), {
                    series: [{
                        name: 'Anak Stunting',
                        data: data
                    }],
                    chart: {
                        height: 350,
                        type: 'area',
                        toolbar: {
                        show: false
                        }
                    },
                    colors: ['#ff4d4f'],
                    plotOptions: {
                        bar: {
                        borderRadius: 4,
                        horizontal: false,
                        }
                    },
                    dataLabels: {
                        enabled: true
                    },
                    xaxis: {
                        categories: labels
                    },
                    tooltip: {
                        y: {
                        formatter: function (val) {
                            return val + " anak";
                        }
                        }
                    }
                    }).render();
                });
                </script>

                <!-- End Line Chart -->

              </div>

            </div>
          </div><!-- End Reports -->

          <!-- Recent Sales -->
          <div class="col-12">
            <div class="card recent-sales overflow-auto">


            <div class="card-body">
            <h5 class="card-title">Data Pengukuran Anak <span></span></h5>

            <table class="table table-borderless datatable">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Anak</th>
                    <th scope="col">Nama Orang Tua</th>
                    <th scope="col">Usia (bulan)</th>
                    <th scope="col">Berat (kg)</th>
                    <th scope="col">Tinggi (cm)</th>
                    <th scope="col">Status Gizi</th>
                    <th scope="col">Tanggal Pengukuran</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($pengukuran as $index => $item)
                    <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nama_anak }}</td>
                    <td>{{ $item->nama_ortu }}</td>
                    <td>{{ $item->usia_bulan }}</td>
                    <td>{{ $item->berat }}</td>
                    <td>{{ $item->tinggi }}</td>
                    <td>
                        @if($item->status_gizi_bmi == 'normal')
                        <span class="badge bg-success">Normal</span>
                        @elseif($item->status_gizi_bmi == 'gizi kurang')
                        <span class="badge bg-warning text-dark">Gizi Kurang</span>
                        @elseif($item->status_gizi_bmi == 'gizi buruk')
                        <span class="badge bg-danger">Gizi Buruk</span>
                        @else
                        <span class="badge bg-secondary">{{ $item->status_gizi_bmi }}</span>
                        @endif
                    </td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_pengukuran)->translatedFormat('d M Y') }}</td>
                    </tr>
                @empty
                    <tr>
                    <td colspan="8" class="text-center">Belum ada data pengukuran.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            </div>

            </div>
          </div><!-- End Recent Sales -->



        </div>
      </div><!-- End Left side columns -->

      <!-- Right side columns -->
      <div class="col-lg-4">

        <!-- Website Traffic -->



        <!-- News & Updates Traffic -->
        <div class="card">
          <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>
                    <li><a class="dropdown-item" href="{{ url('/dashboard?filter=today') }}">Hari Ini</a></li>
                  <li><a class="dropdown-item" href="{{ url('/dashboard?filter=week') }}">Minggu Ini</a></li>
                  <li><a class="dropdown-item" href="{{ url('/dashboard?filter=month') }}">Bulan ini</a></li>

            </ul>
          </div>

          <div class="card-body pb-0">
            <h5 class="card-title">Berita &amp; Edukasi <span>| Terkini</span></h5>

            <div class="news">
                @foreach ($templates as $template)
              <div class="post-item clearfix">
                <img src="{{ Storage::url($template->image) }}" alt="Gambar Edukasi">
                <h4><a href="#">{{ $template->judul }}</a></h4>
                <p>{{ Str::limit($template->content, 100) }}</p>
              </div>
              @endforeach
        </div><!-- End News & Updates -->

      </div><!-- End Right side columns -->

    </div>
  </section>
@endsection
