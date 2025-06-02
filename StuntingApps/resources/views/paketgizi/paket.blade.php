<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>StuntFree</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f9ff;
    }

    .btn-primary {
      background: linear-gradient(90deg, #5e79ff, #5974f6);
      border: none;
    }

    .btn-primary:hover {
      background: linear-gradient(90deg, #4c66e8, #4d6af0);
    }

    .hero-section {
      background-color: #eaf0ff;
      height: 100vh;
      display: flex;
      align-items: center;
    }

    .hero-section img {
      max-width: 100%;
    }

    .section-title {
      font-weight: bold;
      color: #27304b;
    }

    .service-card {
      border-radius: 16px;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
    }

    .footer {
      background-color: #1b1f3b;
      color: #fff;
      padding: 40px 0;
    }

    .footer a {
      color: #a0a8cc;
      text-decoration: none;
    }

    .footer a:hover {
      color: #fff;
    }

    /* Hero Section Animation */
    .hero-section .animated {
      opacity: 0;
      animation: fadeInUp 1s forwards;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Styling for Circle Background */
    .circle-background {
      position: absolute;
      top: 30%;
      left: 10%;
      width: 250px;
      height: 250px;
      background: rgba(173, 216, 230, 0.2);
      border-radius: 50%;
      animation: expandCircle 3s ease-in-out infinite;
    }

    @keyframes expandCircle {
      0% {
        width: 250px;
        height: 250px;
      }

      50% {
        width: 300px;
        height: 300px;
      }

      100% {
        width: 250px;
        height: 250px;
      }
    }

    /* Gradient Icon */
    .gradient-icon {
      background: linear-gradient(90deg, #5e79ff, #5974f6);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    /* Custom Scroll Animation */
    .fade-left,
    .fade-right,
    .fade-up {
      opacity: 0;
      transition: opacity 1s ease-out;
    }

    .fade-left.animate__fadeInLeft {
      animation: fadeInLeft 1s forwards;
    }

    .fade-right.animate__fadeInRight {
      animation: fadeInRight 1s forwards;
    }

    .fade-up.animate__fadeInUp {
      animation: fadeInUp 1s forwards;
    }

    @keyframes fadeInLeft {
      from {
        opacity: 0;
        transform: translateX(-50px);
      }

      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    @keyframes fadeInRight {
      from {
        opacity: 0;
        transform: translateX(50px);
      }

      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Styling for the card */
    .shadow-card {
      box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
      height: 300px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .shadow-card:hover {
      box-shadow: 0px 12px 25px rgba(0, 0, 0, 0.15);
      transform: translateY(-5px);
      transition: all 0.3s ease-in-out;
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  @include('navbarlanding')

  <section class="py-5" style="background-color: #f8f9ff;">
  <div class="container">
    <h3 class="text-center fw-bold mb-5 section-title">Rekomendasi Paket Gizi dan Catering Jember</h3>
    <div class="row g-4">
      @foreach ($paketgizi as $gizi)
        <div class="col-md-4 fade-up">
          <div class="card h-100 border-0 shadow-sm rounded-4">
                <div class="card-body">
              <h5 class="card-title fw-bold">{{ $gizi->nama }}</h5>
              <p class="card-text text-muted">{{ $gizi->alamat }}</p>
              @if ($gizi->telepon && $gizi->telepon != '-')
                <p class="card-text"><i class="fas fa-phone-alt me-1"></i> {{ $gizi->telepon }}</p>
              @endif
              <a href="{{ $gizi->urlmaps }}" class="btn btn-outline-primary rounded-pill" target="_blank">Lihat di Maps</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>




  <!-- Footer -->
  <footer class="footer" id='footer'>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h5>StuntFree<span class="text-info">.</span></h5>
          <p>Jl. Mastrip, Krajan Timur, Sumbersari, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68121</p>
          <div>
            <a href="#"><i class="fab fa-facebook-f me-3"></i></a>
            <a href="#"><i class="fab fa-instagram me-3"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
          </div>
        </div>
        <div class="col-md-2">
          <h6>Informasi</h6>
          <ul class="list-unstyled">
            <li><a href="#">Tentang Kami</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Pusat Bantuan</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h6>Wilayah Layanan</h6>
          <p>Jember, Jawa Timur</p>
        </div>
        <div class="col-md-3">
          <h6>Kontak</h6>
          <p>+6285646546543<br>info@stuntfree.id<br>Telp: +56456456454</p>
        </div>
      </div>
      <div class="text-center mt-4">
        <small>&copy; StuntFree 2025</small>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Function to add fade-in animation classes
    const addFadeInClass = (entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const section = entry.target;
          if (section.classList.contains('fade-left')) {
            section.classList.add('animate__fadeInLeft');
          } else if (section.classList.contains('fade-right')) {
            section.classList.add('animate__fadeInRight');
          } else if (section.classList.contains('fade-up')) {
            section.classList.add('animate__fadeInUp');
          }
          observer.unobserve(section);
        }
      });
    };

    // Create an IntersectionObserver instance
    const observer = new IntersectionObserver(addFadeInClass, {
      threshold: 0.5,
    });

    // Target each section for observation
    const sections = document.querySelectorAll('.fade-left, .fade-right, .fade-up');
    sections.forEach(section => observer.observe(section));
  </script>
</body>
<script src="path/to/main.js"></script>


</html>
