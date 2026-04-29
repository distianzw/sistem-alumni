<?php
$page = $_GET['page'] ?? '';
$gender = strtolower($_SESSION['jenis_kelamin'] ?? '');

if($gender == 'perempuan' || $gender == 'wanita' || $gender == 'p'){
    $bg_sidebar = 'from-[#FF6B9A] to-[#e05580]';
} else {
    $bg_sidebar = 'from-[#5478FF] to-[#3f5fe0]';
}
?>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<!-- SIDEBAR -->
<aside class="fixed top-0 left-0 h-screen w-64
              bg-gradient-to-b <?= $bg_sidebar ?>
              text-white flex flex-col shadow-2xl z-40">

    <!-- LOGO -->
    <div class="px-6 py-6 border-b border-white/20">
        <h1 class="text-2xl font-bold tracking-wide">
            Alumni<span class="text-white/80">User</span>
        </h1>
        <p class="text-xs text-white/80 mt-1">Dashboard Alumni</p>
    </div>

    <!-- MENU -->
    <nav class="flex-1 px-4 py-6 text-sm space-y-1">

        <!-- MAIN -->
        <p class="text-xs text-white/80 uppercase px-3 mb-2">Main</p>

        <!-- HOME -->
        <a href="dashboard_alumni.php?page=home"
           class="flex items-center gap-3 px-4 py-3 rounded-xl
           <?= $page=='home' ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' ?> transition">

            <i class='bx bx-home text-lg'></i>
            Home
        </a>

        <!-- PROFIL -->
        <a href="dashboard_alumni.php?page=profil"
           class="flex items-center gap-3 px-4 py-3 rounded-xl
           <?= $page=='profil' ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' ?> transition">

            <i class='bx bx-user text-lg'></i>
            Profil
        </a>

        <!-- BERITA -->
        <a href="dashboard_alumni.php?page=berita"
           class="flex items-center gap-3 px-4 py-3 rounded-xl
           <?= $page=='berita' ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' ?> transition">

            <i class='bx bx-news text-lg'></i>
            Berita
        </a>

       <!-- GALERI -->
        <a href="dashboard_alumni.php?page=galeri"
        class="flex items-center gap-3 px-4 py-3 rounded-xl
        <?= $page=='galeri' ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' ?> transition">

        <i class='bx bx-image text-lg'></i>
        Galeri

        </a>

        <!-- ANGKATAN -->
        <a href="dashboard_alumni.php?page=angkatan"
           class="flex items-center gap-3 px-4 py-3 rounded-xl
           <?= $page=='angkatan' ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' ?> transition">

            <i class='bx bx-calendar text-lg'></i>
            Angkatan
        </a>


        <!-- DATA -->
        <p class="text-xs text-white/80 uppercase px-3 mt-4 mb-2">Data</p>

        <!-- PENDIDIKAN -->
        <a href="dashboard_alumni.php?page=pendidikan"
           class="flex items-center gap-3 px-4 py-3 rounded-xl
           <?= $page=='pendidikan' ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' ?> transition">

            <i class='bx bx-book text-lg'></i>
            Pendidikan
        </a>

        <!-- PEKERJAAN -->
        <a href="dashboard_alumni.php?page=pekerjaan"
           class="flex items-center gap-3 px-4 py-3 rounded-xl
           <?= $page=='pekerjaan' ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' ?> transition">

            <i class='bx bx-briefcase text-lg'></i>
            Pekerjaan
        </a>

    </nav>

    <!-- FOOTER -->
    <div class="p-4 border-t border-white/20">

        <a href="auth/logout.php"
           class="flex items-center justify-center gap-2
                  bg-red-500 hover:bg-red-600
                  py-3 rounded-xl font-medium
                  transition shadow">

            <i class='bx bx-log-out'></i>
            Logout
        </a>

    </div>

</aside>