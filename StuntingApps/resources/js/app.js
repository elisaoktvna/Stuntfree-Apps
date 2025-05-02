import './bootstrap';

// Script nomor 2: Navigasi dengan offset untuk navbar fixed
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        const navbarHeight = document.querySelector('.navbar').offsetHeight || 0; // Tinggi navbar
        const targetPosition = target.offsetTop - navbarHeight;
  
        window.scrollTo({
          top: targetPosition,
          behavior: 'smooth',
        });
      }
    });
  });
  
  // Script nomor 3: Scroll saat halaman dimuat dengan hash di URL
  document.addEventListener('DOMContentLoaded', () => {
    if (window.location.hash) {
      const target = document.querySelector(window.location.hash);
      if (target) {
        const navbarHeight = document.querySelector('.navbar').offsetHeight || 0; // Tinggi navbar
        const targetPosition = target.offsetTop - navbarHeight;
  
        window.scrollTo({
          top: targetPosition,
          behavior: 'smooth',
        });
      }
    }
  });
  
  
  
  