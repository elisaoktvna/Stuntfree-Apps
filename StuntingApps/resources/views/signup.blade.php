<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>StuntFree - Sign Up</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- FontAwesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <style>
    /* Styling for Circle Background */
    .circle-background {
      position: absolute;
      top: 30%;
      left: 10%;
      width: 250px;
      height: 250px;
      background: rgba(173, 216, 230, 0.2); /* Lighter and softer blue */
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

    /* Other existing styles */
    .hero-section {
      min-height: 100vh;
      display: flex;
      align-items: center;
      background: #f0f8ff;
    }

    .card {
      background-color: #ffffff;
      padding: 2rem;
      border: none;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 1rem;
    }

    .form-control {
      border: 1px solid #ddd;
    }

    .form-control:focus {
      border-color: #5e79ff;
      box-shadow: 0 0 0 0.2rem rgba(94, 121, 255, 0.25);
    }

    .animated {
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

    .hero-section {
      margin-top: -30px;
    }

    .hero-content h1 {
      font-size: 2.5rem;
      margin-bottom: 1rem;
      animation-delay: 0.5s;
    }

    .hero-content p {
      font-size: 1.1rem;
      color: #555;
      animation-delay: 1s;
    }

    .image-container img {
      max-width: 100%;
      height: auto;
      border-radius: 1rem;
      animation-delay: 1.5s;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  @include('navbarlanding')

  <!-- Hero Section -->
  <section class="hero-section">
    <div class="container">
      <div class="row align-items-center">
        <!-- Image Content -->
        <div class="col-md-6 text-center">
          <div class="image-container" style="position: relative;">
            <img src="assets/img/roket.png" alt="Roket" class="img-fluid animated fadeInUp" style="animation-delay: 1.5s;">
            <!-- Animated Background Circle -->
            <div class="circle-background"></div>
          </div>
        </div>

        <!-- Sign Up Card -->
        <div class="col-md-6">
          <div class="card shadow-lg animated" style="animation-delay: 1s;">
            <h3 class="text-center fw-bold mb-4 text-primary animated" style="animation-delay: 0.5s;">Daftar Akun</h3>
            <p class="text-center text-muted mb-4 animated" style="animation-delay: 0.7s;">Silakan isi informasi Anda untuk mendaftar</p>
            <form action="/prosessignup" method="POST">
                @csrf
              <!-- Name Field -->
              <div class="mb-3 animated" style="animation-delay: 0.9s;">
                <label for="name" class="form-label text-muted">Nama Lengkap</label>
                <input type="text" class="form-control rounded-3" id="name" name="nama" placeholder="Masukkan nama lengkap Anda" required>
              </div>

              <!-- Email Field -->
              <div class="mb-3 animated" style="animation-delay: 1.1s;">
                <label for="email" class="form-label text-muted">Email</label>
                <input type="email" class="form-control rounded-3" id="email" name="email" placeholder="Masukkan email Anda" required>
              </div>

              <!-- Password Field -->
              <div class="mb-3 animated" style="animation-delay: 1.3s;">
                <label for="password" class="form-label text-muted">Password</label>
                <input type="password" class="form-control rounded-3" id="password" name="password" placeholder="Masukkan password Anda" required>
              </div>

              <!-- Confirm Password Field -->
              <div class="mb-3 animated" style="animation-delay: 1.5s;">
                <label for="confirm-password" class="form-label text-muted">Konfirmasi Password</label>
                <input type="password" class="form-control rounded-3" id="confirm-password" name="password_confirmation" placeholder="Konfirmasi password Anda" required>
              </div>

                <!-- Kecamatan Select -->
                <div class="mb-3 animated" style="animation-delay: 1.6s;">
                <label for="kecamatan" class="form-label text-muted">Kecamatan</label>
                <select class="form-select rounded-3" id="kecamatan" name="id_kecamatan" required>
                    <option disabled selected>Pilih Kecamatan</option>
                    @foreach ($kec as $k)
                        <option value="{{ $k->id }}">{{ $k->nama }}</option>
                    @endforeach

                    <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                </select>
                </div>

                <div class="mb-3 animated" style="animation-delay: 1.55s;">
                <label for="alamat" class="form-label text-muted">Alamat</label>
                <input type="text" class="form-control rounded-3" id="alamat" name="alamat" placeholder="Masukkan alamat lengkap Anda" required>
                </div>

              <button type="submit" class="btn btn-primary w-100 rounded-pill mt-3 animated" style="animation-delay: 1.7s;">Daftar</button>
            </form>

            <div class="text-center mt-4 animated" style="animation-delay: 1.9s;">
            <p class="small text-muted">Sudah punya akun? <a href="{{ route('loginortu') }}" class="text-primary">Masuk</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
  const form = document.querySelector('form');
  const password = document.getElementById('password');
  const confirmPassword = document.getElementById('confirm-password');

  form.addEventListener('submit', function(e) {
    if (password.value !== confirmPassword.value) {
      e.preventDefault(); // stop submit
      alert('Password dan konfirmasi password tidak cocok!');
    }
  });
</script>
</body>
</html>
