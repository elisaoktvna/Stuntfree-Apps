@extends('layout.app')

@section('content')
<div class="pagetitle">
    <h1>Dashboard Orang Tua</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">Dashboard Orang Tua</li>
      </ol>
    </nav>
</div>

<section class="section">
  <div class="row">

    {{-- Daftar Anak --}}
    <div class="col-lg-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Daftar Anak Anda</h5>

          @if ($anak->isEmpty())
            <p>Belum ada data anak.</p>
          @else
            <ul class="list-group">
              @foreach ($anak as $a)
                <li class="list-group-item">
                  <strong>{{ $a->nama }}</strong><br>
                  NIK: {{ $a->nik }}<br>
                  Tanggal Lahir: {{ $a->tanggal_lahir }}<br>
                  Status: {{ ucfirst($a->status) }}
                </li>
              @endforeach
            </ul>
          @endif
        </div>
      </div>
    </div>

    {{-- Tabel Pengukuran Terbaru --}}
    <div class="col-lg-8">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Pengukuran Terbaru Anak</h5>

          @if ($pengukuranTerbaru->isEmpty())
            <p>Belum ada data pengukuran.</p>
          @else
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Nama Anak</th>
                  <th>Usia (Bulan)</th>
                  <th>Berat (kg)</th>
                  <th>Tinggi (cm)</th>
                  <th>Status Gizi BMI</th>
                  <th>Tanggal Pengukuran</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pengukuranTerbaru as $p)
                  <tr>
                    <td>{{ $p->anak->nama ?? '-' }}</td>
                    <td>{{ $p->usia_bulan }}</td>
                    <td>{{ $p->berat }}</td>
                    <td>{{ $p->tinggi }}</td>
                    <td>{{ $p->status_gizi_bmi }}</td>
                    <td>{{ $p->created_at->format('d-m-Y') }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          @endif
        </div>
      </div>

      {{-- Grafik Status Gizi --}}
    <div class="col-12">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Laporan <span>/Status Gizi Anak</span></h5>

                <!-- Area Chart -->
                <div id="reportsChart"></div>

                <script>
                document.addEventListener("DOMContentLoaded", () => {
                    const namaAnak = {!! json_encode($namaAnak) !!};
                    const statusGiziAngka = {!! json_encode($statusGiziAngka) !!};
                    const statusLabels = {1: 'Kurus', 2: 'Normal', 3: 'Gemuk'};

                    const chart = new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                            name: 'Status Gizi Anak',
                            data: statusGiziAngka
                        }],
                        chart: {
                            type: 'bar',
                            height: 350
                        },
                        xaxis: {
                            categories: namaAnak,
                            title: { text: 'Nama Anak' }
                        },
                        yaxis: {
                            min: 1,
                            max: 3,
                            tickAmount: 2,
                            labels: {
                                formatter: (val) => statusLabels[val] || val
                            },
                            title: { text: 'Status Gizi' }
                        },
                        tooltip: {
                            y: {
                                formatter: (val) => statusLabels[val] || val
                            }
                        },
                        dataLabels: {
                            formatter: (val) => statusLabels[val] || val
                        },
                        colors: ['#00b894', '#0984e3', '#d63031']
                    });

                    chart.render();
                });
                </script>



                <!-- End Area Chart -->

            </div>
        </div>
    </div>
</div>



    </div>

  </div>
</section>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('statusGiziChart').getContext('2d');
  const statusGiziData = @json($statusGiziCount);

  new Chart(ctx, {
    type: 'pie',
    data: {
      labels: Object.keys(statusGiziData),
      datasets: [{
        label: 'Jumlah Anak',
        data: Object.values(statusGiziData),
        backgroundColor: [
          '#4e73df',
          '#1cc88a',
          '#36b9cc',
          '#f6c23e',
          '#e74a3b',
          '#858796',
        ],
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'right',
        },
        title: {
          display: false,
          text: 'Distribusi Status Gizi Anak',
        }
      }
    }
  });
</script>
@endsection
