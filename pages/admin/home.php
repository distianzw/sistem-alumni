<?php

// TOTAL USER
$total_user = mysqli_fetch_row(mysqli_query($conn,
"SELECT COUNT(*) FROM user"))[0];

// TOTAL ALUMNI
$total_alumni = mysqli_fetch_row(mysqli_query($conn,
"SELECT COUNT(*) FROM alumni"))[0];

// TOTAL BERITA
$total_berita = mysqli_fetch_row(mysqli_query($conn,
"SELECT COUNT(*) FROM berita"))[0];

// TOTAL JURUSAN
$total_jurusan = mysqli_fetch_row(mysqli_query($conn,
"SELECT COUNT(*) FROM jurusan"))[0];

// TOTAL ANGKATAN
$total_angkatan = mysqli_fetch_row(mysqli_query($conn,
"SELECT COUNT(*) FROM angkatan"))[0];


// BERITA TERBARU
$berita = mysqli_query($conn,
"SELECT judul, tanggal_post 
 FROM berita 
 ORDER BY tanggal_post DESC 
 LIMIT 5");
?>

<div class="space-y-8">

<!-- HEADER -->
<div>
    <h1 class="text-2xl font-bold text-gray-800">
        Dashboard Admin
    </h1>
    <p class="text-gray-500 text-sm">
        Selamat datang di sistem manajemen alumni
    </p>
</div>


<!-- SUMMARY CARD -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">

    <!-- USER -->
    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
        <p class="text-gray-500 text-sm">Total User</p>
        <h2 class="text-3xl font-bold text-blue-600 mt-2">
            <?= $total_user ?>
        </h2>
    </div>

    <!-- ALUMNI -->
    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
        <p class="text-gray-500 text-sm">Total Alumni</p>
        <h2 class="text-3xl font-bold text-green-600 mt-2">
            <?= $total_alumni ?>
        </h2>
    </div>

    <!-- BERITA -->
    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
        <p class="text-gray-500 text-sm">Total Berita</p>
        <h2 class="text-3xl font-bold text-purple-600 mt-2">
            <?= $total_berita ?>
        </h2>
    </div>

    <!-- JURUSAN -->
    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
        <p class="text-gray-500 text-sm">Total Jurusan</p>
        <h2 class="text-3xl font-bold text-yellow-500 mt-2">
            <?= $total_jurusan ?>
        </h2>
    </div>

    <!-- ANGKATAN -->
    <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
        <p class="text-gray-500 text-sm">Total Angkatan</p>
        <h2 class="text-3xl font-bold text-red-500 mt-2">
            <?= $total_angkatan ?>
        </h2>
    </div>

</div>



<!-- GRID CONTENT -->
<div class="grid md:grid-cols-2 gap-6">

    <!-- BERITA TERBARU -->
    <div class="bg-white p-6 rounded-2xl shadow">

        <h2 class="text-lg font-semibold mb-4">
            Berita Terbaru
        </h2>

        <div class="space-y-4">

        <?php while($row = mysqli_fetch_assoc($berita)): ?>

            <div class="border-b pb-3">

                <p class="font-medium text-gray-800">
                    <?= htmlspecialchars($row['judul']) ?>
                </p>

                <span class="text-xs text-gray-500">
                    <?= date('d M Y', strtotime($row['tanggal_post'])) ?>
                </span>

            </div>

        <?php endwhile; ?>

        </div>

    </div>



    <!-- QUICK MENU -->
    <div class="bg-white p-6 rounded-2xl shadow">

        <h2 class="text-lg font-semibold mb-4">
            Menu Cepat
        </h2>

        <div class="grid grid-cols-2 gap-4">

            <a href="dashboard_admin.php?page=user"
               class="bg-blue-50 hover:bg-blue-100 p-4 rounded-xl text-center transition">

               <p class="font-semibold text-blue-700">Kelola User</p>

            </a>

            <a href="dashboard_admin.php?page=alumni"
               class="bg-green-50 hover:bg-green-100 p-4 rounded-xl text-center transition">

               <p class="font-semibold text-green-700">Kelola Alumni</p>

            </a>

            <a href="dashboard_admin.php?page=berita"
               class="bg-purple-50 hover:bg-purple-100 p-4 rounded-xl text-center transition">

               <p class="font-semibold text-purple-700">Kelola Berita</p>

            </a>

            <a href="dashboard_admin.php?page=jurusan"
               class="bg-yellow-50 hover:bg-yellow-100 p-4 rounded-xl text-center transition">

               <p class="font-semibold text-yellow-700">Kelola Jurusan</p>

            </a>

        </div>

    </div>

</div>

</div>