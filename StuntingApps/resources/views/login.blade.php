<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>StuntFree - Login</title>
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

.hero-content {
  margin-top: 3rem;
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

      <!-- Login Card -->
      <div class="col-md-6">
        <div class="card shadow-lg animated" style="animation-delay: 1s;">
          <h3 class="text-center fw-bold mb-4 text-primary animated" style="animation-delay: 0.5s;">Selamat Datang</h3>
          <p class="text-center text-muted mb-4 animated" style="animation-delay: 0.7s;">Silakan masuk untuk melanjutkan</p>
          <form action="/proseslogin" method="POST">
            @csrf
            <div class="mb-3 animated" style="animation-delay: 0.9s;">
              <label for="email" class="form-label text-muted">Email</label>
              <input type="email" class="form-control rounded-3" id="email" name="email" placeholder="Masukkan email Anda">
            </div>
            <div class="mb-3 animated" style="animation-delay: 1.1s;">
              <label for="password" class="form-label text-muted">Password</label>
              <input type="password" class="form-control rounded-3" id="password" name="password" placeholder="Masukkan password Anda">
            </div>
            <button type="submit" class="btn btn-primary w-100 rounded-pill mt-3 animated" style="animation-delay: 1.3s;">Masuk</button>
          </form>
          {{-- <div class="text-center mt-4 animated" style="animation-delay: 1.5s;">
            <a href="#" class="text-muted small">Lupa password?</a>
          </div>
          <hr class="my-4">
          <div class="text-center animated" style="animation-delay: 1.7s;">
            <p class="small text-muted">Belum punya akun? <a href="{{ route('signup') }}" class="text-primary">Daftar</a></p>
          </div>
        </div> --}}
      </div>
    </div>
  </div>
</section>



  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
