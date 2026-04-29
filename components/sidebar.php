<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<!-- SIDEBAR -->
<aside class="fixed top-0 left-0 h-screen w-64
              bg-gradient-to-b from-[#281C59] to-[#3f5fe0]
              text-white flex flex-col shadow-xl z-40">

    <!-- LOGO -->
    <div class="px-6 py-6 border-b border-white/20">
        <h1 class="text-2xl font-bold tracking-wide">
            Alumni<span class="text-blue-200">Admin</span>
        </h1>
        <p class="text-xs text-blue-100 mt-1">Dashboard Management</p>
    </div>

    <?php $page = $_GET['page'] ?? ''; ?>

    <!-- MENU -->
    <nav class="flex-1 px-4 py-6 text-sm space-y-1">

        <!-- MAIN -->
        <p class="text-xs text-blue-200 uppercase px-3 mb-2">Main</p>

        <a href="dashboard_admin.php?page=home"
           class="flex items-center gap-3 px-4 py-3 rounded-xl
           <?= $page=='home' ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' ?> transition">

            <i class='bx bx-home text-lg'></i>
            Dashboard
        </a>

        <a href="dashboard_admin.php?page=statistik"
           class="flex items-center gap-3 px-4 py-3 rounded-xl
           <?= $page=='statistik' ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' ?> transition">

            <i class='bx bx-bar-chart-alt-2 text-lg'></i>
            Statistik
        </a>


        <!-- MANAGEMENT -->
        <p class="text-xs text-blue-200 uppercase px-3 mt-4 mb-2">Management</p>

        <a href="dashboard_admin.php?page=user"
           class="flex items-center gap-3 px-4 py-3 rounded-xl
           <?= $page=='user' ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' ?> transition">

            <i class='bx bx-user text-lg'></i>
            Kelola User
        </a>

        <a href="dashboard_admin.php?page=alumni"
           class="flex items-center gap-3 px-4 py-3 rounded-xl
           <?= $page=='alumni' ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' ?> transition">

            <i class='bx bx-group text-lg'></i>
            Kelola Alumni
        </a>

        <a href="dashboard_admin.php?page=berita"
           class="flex items-center gap-3 px-4 py-3 rounded-xl
           <?= $page=='berita' ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' ?> transition">

            <i class='bx bx-news text-lg'></i>
            Kelola Berita
        </a>

        <a href="dashboard_admin.php?page=galeri"
           class="flex items-center gap-3 px-4 py-3 rounded-xl
           <?= $page=='galeri' ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' ?> transition">

            <i class='bx bx-news text-lg'></i>
            Galeri Alumni
        </a>

        <a href="dashboard_admin.php?page=jurusan"
           class="flex items-center gap-3 px-4 py-3 rounded-xl
           <?= $page=='jurusan' ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' ?> transition">

            <i class='bx bx-book text-lg'></i>
            Kelola Jurusan
        </a>

        <a href="dashboard_admin.php?page=angkatan"
           class="flex items-center gap-3 px-4 py-3 rounded-xl
           <?= $page=='angkatan' ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' ?> transition">

            <i class='bx bx-calendar text-lg'></i>
            Kelola Angkatan
        </a>


        <!-- LAPORAN -->
        <p class="text-xs text-blue-200 uppercase px-3 mt-4 mb-2">Laporan</p>

        <a href="dashboard_admin.php?page=export"
           class="flex items-center gap-3 px-4 py-3 rounded-xl
           <?= $page=='export' ? 'bg-white/20 font-semibold' : 'hover:bg-white/10' ?> transition">

            <i class='bx bx-download text-lg'></i>
            Export Data
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