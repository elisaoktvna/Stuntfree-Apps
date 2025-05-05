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


  <!-- Hero Section -->
  <section class="hero-section" style="position: relative; overflow: hidden; background: #f0f8ff;">
    <div class="container">
      <div class="row align-items-center">
        <!-- Text Content -->
        <div class="col-md-6 fade-left">
          <h1 class="mb-3 display-5 fw-bold text-dark animated fadeInUp">Pantau Pertumbuhan Anak dan Prediksi Risiko Stunting Sejak Dini</h1>
          <p class="lead text-dark mb-4 animated fadeInUp" style="animation-delay: 0.5s;">Gunakan teknologi untuk membantu memantau tumbuh kembang anak dan mendapatkan rekomendasi gizi serta layanan kesehatan.</p>
          <a class="btn btn-primary btn-lg mt-3 animated fadeInUp" href="{{ route('signup') }}" style="animation-delay: 1s;">Mulai Sekarang</a>
        </div>

        <!-- Image Content -->
        <div class="col-md-6 text-center fade-right">
          <div class="image-container" style="position: relative;">
            <img src="assets/img/roket.png" alt="Anak" class="img-fluid animated fadeInUp" style="animation-delay: 1.5s;">
            <!-- Animated Background Circle -->
            <div class="circle-background"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="py-5" style="min-height: 50vh; background-color: rgb(255, 255, 255);" id='fiturutama' class="fade-up">
    <div class="container">
      <h3 class="section-title text-center mb-5 display-6 fade-up">Fitur Utama</h3>
      <div class="row g-5">
        <div class="col-md-4 fade-left">
          <div class="service-card text-center h-100 p-4">
            <div class="mb-4">
              <i class="fas fa-chart-line fa-3x gradient-icon"></i>
            </div>
            <h5 class="fw-bold mb-3">Prediksi Pertumbuhan Anak</h5>
            <p class="text-muted">Analisis data anak untuk memprediksi pertumbuhan dan risiko stunting sejak dini.</p>
          </div>
        </div>
        <div class="col-md-4 fade-up">
          <div class="service-card text-center h-100 p-4">
            <div class="mb-4">
              <i class="fas fa-book-open fa-3x gradient-icon"></i>
            </div>
            <h5 class="fw-bold mb-3">Edukasi Stunting</h5>
            <p class="text-muted">Pelajari penyebab, pencegahan, dan penanganan stunting melalui artikel dan video.</p>
          </div>
        </div>
        <div class="col-md-4 fade-right">
          <div class="service-card text-center h-100 p-4">
            <div class="mb-4">
              <i class="fas fa-hospital-alt fa-3x gradient-icon"></i>
            </div>
            <h5 class="fw-bold mb-3">Rekomendasi Faskes & Gizi Anak</h5>
            <p class="text-muted">Temukan fasilitas kesehatan dan saran gizi terbaik untuk tumbuh kembang anak.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section: Pelayanan terbaik dari ahli medis -->
  <section class="py-5 bg-white">
    <div class="container fade-left">
      <div class="row align-items-center mb-5">
        <div class="col-md-6">
          <img src="assets/img/gizibaru.png" alt="dokter" class="img-fluid" />
          <div class="bg-white p-2 d-inline-block rounded shadow position-relative" style="margin-top: -40px; margin-left: 20px;">
            <span class="fw-bold">⭐ Fokus pada Anak Sehat</span>
          </div>
        </div>
        <div class="col-md-6">
          <h4 class="fw-bold">Prediksi Risiko Stunting Secara Dini</h4>
          <p class="text-muted">
            StuntFree membantu orang tua memantau pertumbuhan anak melalui prediksi risiko stunting berbasis data dan teknologi.
          </p>
          <a href="#" class="btn btn-primary rounded-pill shadow">Coba Sekarang</a>
        </div>
      </div>
    </div>
  </section>

  <section class="py-5 bg-white ">
    <div class="container fade-right">
    <div class="row align-items-center mb-5">
        <div class="col-md-6 order-md-2">
          <div class="position-relative text-center">
            <div class="position-relative d-inline-block">
              <img src="assets/img/gizianak.png" alt="dokter" class="img-fluid" />
            </div>
          </div>
        </div>
        <div class="col-md-6 order-md-1">
          <h4 class="fw-bold">Paket Gizi Anak & Rekomendasi Catering</h4>
          <p class="text-muted">
            Dapatkan saran makanan sehat dan paket gizi sesuai kebutuhan anak Anda dari mitra terpercaya.
          </p>
          <a href="#" class="btn btn-primary rounded-pill shadow">Lihat Paket</a>
        </div>
      </div>
    </div>
  </section>

  <section class="py-5 bg-white ">
    <div class="container">
  <div class="text-white rounded-4 p-5 text-center shadow-card fade-up" style="background: linear-gradient(90deg, #5e79ff, #5974f6);">
        <h5 class="fw-bold mb-3">Akses Edukasi & Fasilitas Kesehatan Terdekat</h5>
        <p class="mb-4">
            Pelajari lebih dalam tentang stunting serta temukan fasilitas kesehatan terdekat untuk mendapatkan layanan terbaik.
        </p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="#" class="btn btn-outline-light rounded-pill">Edukasi Kesehatan</a>
            <a href="#" class="btn btn-light text-primary rounded-pill">Cari Fasilitas</a>
        </div>
    </div>

    <style>
        /* Styling for the card */
        .shadow-card {
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2); /* Stronger shadow */
            height: 300px; /* Increase height */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        
        /* Add hover effect */
        .shadow-card:hover {
            box-shadow: 0px 12px 25px rgba(0, 0, 0, 0.15); /* Slightly stronger shadow on hover */
            transform: translateY(-5px); /* Subtle lift effect */
            transition: all 0.3s ease-in-out;
        }
        </style>
  </div>
  </section>


  <!-- Footer -->
  <footer class="footer" id='footer'>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h5>StuntFree<span class="text-info">.</span></h5>
          <p>Jl. Jakarta Selatan Raya, 26 Cilandak, Jakarta Selatan 12540</p>
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
          <p>Jabodetabek, Surabaya, Bandung, Yogyakarta</p>
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
