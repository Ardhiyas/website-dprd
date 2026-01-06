<!-- Vendor JS Files -->
<script src="{{ asset('dist') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('dist') }}/assets/vendor/php-email-form/validate.js"></script>
<script src="{{ asset('dist') }}/assets/vendor/aos/aos.js"></script>
<script src="{{ asset('dist') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="{{ asset('dist') }}/assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="{{ asset('dist') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Main JS File -->
<script src="{{ asset('dist') }}/assets/js/main.js"></script>

<script>
  // Optimasi AOS: Hanya animasi sekali & disable di mobile jika perlu
  document.addEventListener("DOMContentLoaded", function () {
    AOS.init({
      once: true, // Animasi hanya berjalan sekali, tidak berulang saat scroll bolak-balik
      mirror: false,
      duration: 600, // Kurangi durasi jika masih berat
      easing: 'ease-out-cubic',
    });
  });
</script>