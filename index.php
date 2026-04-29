
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sistem Informasi Alumni</title>

<link rel="icon" type="image/png" href="img/favicon.ico">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<script src="https://cdn.tailwindcss.com"></script>

<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<script>
tailwind.config = {
  theme: {
    extend: {
      fontFamily: {
        poppins: ['Poppins', 'sans-serif']
      }
    }
  }
}
</script>

<style>
html { scroll-behavior: smooth; }

/* DEFAULT (sembunyi dulu) */
.animate-section {
  opacity: 0;
  transform: translateY(50px);
  transition: all 0.8s ease;
}

/* MUNCUL */
.animate-section.show {
  opacity: 1;
  transform: translateY(0);
}
</style>
</head>

<body class="font-poppins">


<!-- NAVBAR -->
<nav class="fixed w-full bg-white/90 backdrop-blur-md shadow-sm z-50">
  <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
    <div class="flex-1">
      <h1 class="text-xl font-semibold text-blue-600">Alumni SMK ISFI BANJARMASIN</h1>
    </div>

    <div class="hidden md:flex flex-1 justify-center space-x-8 font-medium">
      <a href="#about" class="hover:text-blue-600">Tentang</a>
      <a href="#profile" class="hover:text-blue-600">Profil</a>
      <a href="#features" class="hover:text-blue-600">Fitur</a>
      <a href="#contact" class="hover:text-blue-600">Kontak</a>
    </div>

    <button onclick="openLogin()"
        class="px-5 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition">
        Login
    </button>

    <button id="menuBtn" class="md:hidden text-2xl text-blue-600">☰</button>
  </div>

  <div id="mobileMenu" class="hidden md:hidden px-6 pb-4 bg-white">
    <a href="#about" class="block py-2">Tentang</a>
    <a href="#profile" class="block py-2">Profil</a>
    <a href="#features" class="block py-2">Fitur</a>
    <a href="#contact" class="block py-2">Kontak</a>
    <a href="login.php" class="block mt-2 text-blue-600 font-medium">Login</a>
  </div>
</nav>

<!-- HERO -->
<section class="animate-section relative min-h-screen overflow-hidden">

  <!-- SLIDER WRAPPER -->
  <div id="sliderWrapper" class="flex transition-transform duration-[2s] ease-in-out">

    <!-- SLIDE 1 -->
    <div class="min-w-full h-screen relative">
      <img src="img/ispi lanskap.png"
           class="w-full h-full object-cover absolute">
      <div class="absolute inset-0 bg-black/60"></div>
    </div>

    <!-- SLIDE 2 -->
    <div class="min-w-full h-screen relative">
      <img src="img/angktn 56.png"
           class="w-full h-full object-cover absolute">
      <div class="absolute inset-0 bg-black/60"></div>
    </div>

    <!-- SLIDE 3 -->
    <div class="min-w-full h-screen relative">
      <img src="img/angktn 57.png"
           class="w-full h-full object-cover absolute">
      <div class="absolute inset-0 bg-black/60"></div>
    </div>

    <!-- SLIDE 4 -->
    <div class="min-w-full h-screen relative">
      <img src="img/ispi.png"
           class="w-full h-full object-cover absolute">
      <div class="absolute inset-0 bg-black/60"></div>
    </div>



  </div>

  <!-- HERO CONTENT -->
  <div class="absolute inset-0 flex items-center justify-center text-center text-white px-6 z-10">
    <div class="max-w-2xl">
      <h2 class="text-4xl md:text-6xl font-semibold mb-6">
        Sistem Informasi Alumni Sekolah SMK ISFI
      </h2>
      <div class="space-x-4">
        <a href="login.php" class="px-6 py-3 bg-blue-600 rounded-xl hover:bg-blue-700 transition">
          Login
        </a>
        <a href="register.php" class="px-6 py-3 border border-white rounded-xl hover:bg-white hover:text-black transition">
          Daftar Alumni
        </a>
      </div>
    </div>
  </div>

</section>


<!-- ABOUT -->
<section id="about" class="animate-section min-h-screen bg-gray-50 flex items-center">
  <div class="max-w-6xl mx-auto px-6 py-24">

    <div class="grid md:grid-cols-2 gap-12 items-center">

      <!-- FOTO -->
      <div>
        <img loading="lazy"
             src="img/Cuplikan layar 2026-04-01 090227.png"
             class="rounded-2xl shadow-lg w-full"
             alt="Tentang Sekolah">
      </div>

      <!-- TEXT -->
      <div>
        <h3 class="text-3xl font-semibold mb-6">Tentang Sistem</h3>
        <p class="text-gray-600 leading-relaxed mb-6">
          Sistem Informasi Alumni Sekolah merupakan platform berbasis web
          yang dirancang untuk membantu pengelolaan data alumni secara
          terstruktur dan modern.
        </p>
        <p class="text-gray-600 leading-relaxed">
          Melalui sistem ini, alumni dapat memperbarui data pribadi,
          riwayat pendidikan, pekerjaan, serta menerima informasi resmi
          dari sekolah secara digital dan terintegrasi.
        </p>
      </div>

    </div>

  </div>
</section>


<!-- PROFILE SEKOLAH -->
<section id="profile" class="animate-section min-h-screen bg-white flex items-center">
  <div class="max-w-6xl mx-auto px-6 py-24">

    <h3 class="text-3xl font-semibold text-center mb-16">Profil Sekolah</h3>

    <div class="grid md:grid-cols-2 gap-16 items-center">

      <!-- FOTO SEKOLAH -->
      <div>
        <img loading="lazy"
             src="img/Cuplikan layar 2026-04-01 102453.png"
             class="rounded-2xl shadow-lg w-full"
             alt="Gedung Sekolah">
      </div>

      <!-- DESKRIPSI -->
      <div>
        <h4 class="text-xl font-semibold mb-4">Sejarah Singkat</h4>
        <p class="text-gray-600 leading-relaxed mb-6">
          Sekolah ini berdiri sejak tahun 1995 dan telah menjadi salah satu
          institusi pendidikan unggulan di daerah. Ribuan alumni telah
          lulus dan melanjutkan pendidikan ke berbagai perguruan tinggi
          ternama maupun bekerja di perusahaan nasional dan internasional.
        </p>

        <h4 class="text-xl font-semibold mb-4">Visi</h4>
        <p class="text-gray-600 leading-relaxed mb-6">
          Menjadi lembaga pendidikan yang unggul dalam prestasi,
          berkarakter, dan berdaya saing global.
        </p>

        <h4 class="text-xl font-semibold mb-4">Misi</h4>
        <ul class="list-disc list-inside text-gray-600 space-y-2">
          <li>Meningkatkan kualitas pembelajaran berbasis teknologi.</li>
          <li>Mengembangkan potensi akademik dan non-akademik siswa.</li>
          <li>Membentuk karakter disiplin dan bertanggung jawab.</li>
        </ul>
      </div>

    </div>

    <!-- STATISTIK -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mt-20 text-center">

      <div>
        <h5 class="text-3xl font-bold text-blue-600">25+</h5>
        <p class="text-gray-600 mt-2">Tahun Berdiri</p>
      </div>

      <div>
        <h5 class="text-3xl font-bold text-blue-600">5000+</h5>
        <p class="text-gray-600 mt-2">Total Alumni</p>
      </div>

      <div>
        <h5 class="text-3xl font-bold text-blue-600">30+</h5>
        <p class="text-gray-600 mt-2">Tenaga Pengajar</p>
      </div>

      <div>
        <h5 class="text-3xl font-bold text-blue-600">A</h5>
        <p class="text-gray-600 mt-2">Akreditasi</p>
      </div>

    </div>

  </div>
</section>


<!-- FEATURES -->
<section id="features" class="animate-section min-h-screen bg-gray-50 flex items-center">
  <div class="max-w-6xl mx-auto px-6 py-24 text-center">
    <h3 class="text-3xl font-semibold mb-12">Fitur Utama</h3>

    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

      <!-- CARD 1 -->
      <div class="group relative overflow-hidden rounded-2xl shadow-lg cursor-pointer">
        <img loading="lazy"
             src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=70&w=600&auto=format&fit=crop"
             class="w-full h-64 object-cover transition duration-300 group-hover:scale-105"
             style="will-change: transform;"
             alt="Manajemen Alumni">

        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent
                    flex items-end p-6 translate-y-full 
                    group-hover:translate-y-0
                    transition duration-300 ease-out">
          <p class="text-white text-sm">
            Kelola data alumni berdasarkan angkatan dan jurusan secara terstruktur.
          </p>
        </div>
      </div>

      <!-- CARD 2 -->
      <div class="group relative overflow-hidden rounded-2xl shadow-lg cursor-pointer">
        <img loading="lazy"
             src="https://images.unsplash.com/photo-1513258496099-48168024aec0?q=70&w=600&auto=format&fit=crop"
             class="w-full h-64 object-cover transition duration-300 group-hover:scale-105"
             style="will-change: transform;"
             alt="Riwayat Pendidikan">

        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent
                    flex items-end p-6 translate-y-full 
                    group-hover:translate-y-0
                    transition duration-300 ease-out">
          <p class="text-white text-sm">
            Alumni dapat menambahkan dan memperbarui riwayat pendidikan lanjutan.
          </p>
        </div>
      </div>

      <!-- CARD 3 -->
      <div class="group relative overflow-hidden rounded-2xl shadow-lg cursor-pointer">
        <img loading="lazy"
             src="https://images.unsplash.com/photo-1492724441997-5dc865305da7?q=70&w=600&auto=format&fit=crop"
             class="w-full h-64 object-cover transition duration-300 group-hover:scale-105"
             style="will-change: transform;"
             alt="Riwayat Pekerjaan">

        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent
                    flex items-end p-6 translate-y-full 
                    group-hover:translate-y-0
                    transition duration-300 ease-out">
          <p class="text-white text-sm">
            Mencatat riwayat pekerjaan alumni untuk kebutuhan laporan dan statistik.
          </p>
        </div>
      </div>

      <!-- CARD 4 -->
      <div class="group relative overflow-hidden rounded-2xl shadow-lg cursor-pointer">
        <img loading="lazy"
             src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?q=70&w=600&auto=format&fit=crop"
             class="w-full h-64 object-cover transition duration-300 group-hover:scale-105"
             style="will-change: transform;"
             alt="Berita">

        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent
                    flex items-end p-6 translate-y-full 
                    group-hover:translate-y-0
                    transition duration-300 ease-out">
          <p class="text-white text-sm">
            Admin dapat mengelola berita dan pengumuman resmi sekolah.
          </p>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- CONTACT -->
<section id="fade-up contact" class="animate-section min-h-screen bg-gray-50 flex items-center">
  <div class="max-w-6xl mx-auto px-6 py-24">

    <!-- TITLE -->
    <div class="text-center mb-14">
      <h3 class="text-3xl font-bold text-gray-800">
        Hubungi Sekolah
      </h3>
      <p class="text-gray-500 mt-2 text-sm">
        Informasi kontak dan lokasi sekolah
      </p>
    </div>

    <div class="grid md:grid-cols-2 gap-10 items-start">

      <!-- INFO -->
      <div class="space-y-5">

        <!-- CARD -->
        <div class="flex items-center gap-4 bg-white p-4 rounded-xl shadow-sm hover:shadow-md transition">
          <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-[#5478FF]/10 text-[#5478FF]">
            <i class='bx bx-map text-xl'></i>
          </div>
          <div>
            <h4 class="font-semibold text-gray-700">Alamat</h4>
            <p class="text-sm text-gray-500">SMK ISFI Banjarmasin</p>
          </div>
        </div>

        <!-- CARD -->
        <div class="flex items-center gap-4 bg-white p-4 rounded-xl shadow-sm hover:shadow-md transition">
          <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-[#5478FF]/10 text-[#5478FF]">
            <i class='bx bx-phone text-xl'></i>
          </div>
          <div>
            <h4 class="font-semibold text-gray-700">Telepon</h4>
            <p class="text-sm text-gray-500">0511-123456</p>
          </div>
        </div>

        <!-- CARD -->
        <div class="flex items-center gap-4 bg-white p-4 rounded-xl shadow-sm hover:shadow-md transition">
          <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-[#5478FF]/10 text-[#5478FF]">
            <i class='bx bx-envelope text-xl'></i>
          </div>
          <div>
            <h4 class="font-semibold text-gray-700">Email</h4>
            <p class="text-sm text-gray-500">smk.isfibjm@gmail.com</p>
          </div>
        </div>

        <!-- CARD -->
        <div class="flex items-center gap-4 bg-white p-4 rounded-xl shadow-sm hover:shadow-md transition">
          <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-[#5478FF]/10 text-[#5478FF]">
            <i class='bx bx-time text-xl'></i>
          </div>
          <div>
            <h4 class="font-semibold text-gray-700">Jam Operasional</h4>
            <p class="text-sm text-gray-500">Senin - Jumat (07.30 - 15.00)</p>
          </div>
        </div>

      </div>

      <!-- MAP -->
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        <!-- HEADER MAP -->
        <div class="flex items-center justify-between px-5 py-3 border-b">
          <h4 class="font-semibold text-gray-700 flex items-center gap-2">
            <i class='bx bx-map-pin text-[#5478FF]'></i>
            Lokasi Sekolah
          </h4>

          <a href="https://maps.app.goo.gl/x4kEBmXRZRPMwh7E9"
             target="_blank"
             class="text-sm text-[#5478FF] hover:underline flex items-center gap-1">
             <i class='bx bx-link-external'></i> Buka Maps
          </a>
        </div>

        <!-- IFRAME -->
        <iframe 
            src="https://www.google.com/maps?q=SMK+ISFI+Banjarmasin&output=embed"
            class="w-full h-[400px] border-0"
            loading="lazy">
        </iframe>

      </div>

    </div>

  </div>
</section>


<footer class="bg-blue-600 text-white text-center py-6">
  © 2026 Sistem Informasi Alumni Sekolah
</footer>

<!-- LOGIN MODAL -->
<div id="loginModal"
     class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center z-50">

  <div class="bg-white w-full max-w-md mx-4 p-8 rounded-2xl shadow-lg relative">

    <!-- Close Button -->
    <button onclick="closeLogin()"
            class="absolute top-4 right-4 text-gray-400 hover:text-black text-xl">
      ✕
    </button>

    <h2 class="text-2xl font-semibold text-center mb-6">
      Login Sistem Alumni
    </h2>

    <form method="POST" action="auth/login_proses.php" class="space-y-4">

      <div>
        <label class="text-sm font-medium">Email</label>
        <input type="email" name="email" required
               class="w-full mt-1 p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
      </div>

      <div>
        <label class="text-sm font-medium">Password</label>
        <input type="password" name="password" required
               class="w-full mt-1 p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
      </div>

      <button type="submit"
              class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition">
        Login
      </button>

    </form>

  </div>
</div>


<script>
const menuBtn = document.getElementById('menuBtn');
const mobileMenu = document.getElementById('mobileMenu');
menuBtn.addEventListener('click', () => {
  mobileMenu.classList.toggle('hidden');
});

/* SLIDER */
let currentIndex = 0;
const slider = document.getElementById('sliderWrapper');
const totalSlides = slider.children.length;

setInterval(() => {
  currentIndex++;

  if (currentIndex >= totalSlides) {
    currentIndex = 0;
  }

  slider.style.transform = `translateX(-${currentIndex * 100}%)`;
}, 5000);
/* LOGIN PAGE */
function openLogin() {
  const modal = document.getElementById('loginModal');
  modal.classList.remove('hidden');
  modal.classList.add('flex');
  document.body.style.overflow = 'hidden';
}

function closeLogin() {
  const modal = document.getElementById('loginModal');
  modal.classList.add('hidden');
  modal.classList.remove('flex');
  document.body.style.overflow = 'auto';
}

/* Close jika klik di luar box */
document.getElementById('loginModal').addEventListener('click', function(e) {
  if (e.target === this) {
    closeLogin();
  }
});

const sections = document.querySelectorAll('.animate-section');

const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if(entry.isIntersecting){
      entry.target.classList.add('show');
    }
  });
}, {
  threshold: 0.2
});

sections.forEach(sec => {
  observer.observe(sec);
});
</script>

</body>
</html>