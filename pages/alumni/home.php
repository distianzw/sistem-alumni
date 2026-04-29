<?php

$user_id = $_SESSION['user_id'];

$query = mysqli_query($conn, "
    SELECT a.*, u.fullname, u.foto 
    FROM alumni a
    JOIN user u ON a.user_id = u.id
    WHERE u.id = '$user_id'
");
$data = mysqli_fetch_assoc($query);

$pendidikan = mysqli_query($conn, "
    SELECT * FROM pendidikan 
    WHERE alumni_id = '{$data['id']}'
    ORDER BY tahun_lulus DESC LIMIT 1
");
$pend = mysqli_fetch_assoc($pendidikan);

$pekerjaan = mysqli_query($conn, "
    SELECT * FROM pekerjaan 
    WHERE alumni_id = '{$data['id']}'
    ORDER BY tahun_mulai DESC LIMIT 1
");
$kerja = mysqli_fetch_assoc($pekerjaan);

$berita = mysqli_query($conn, "
    SELECT * FROM berita 
    ORDER BY tanggal_post DESC LIMIT 3
");

/* 🔥 STATISTIK */
$total_pendidikan = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pendidikan WHERE alumni_id='{$data['id']}'"));
$total_pekerjaan = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pekerjaan WHERE alumni_id='{$data['id']}'"));

$foto = !empty($data['foto']) ? $data['foto'] : 'default.png';
?>

<div class="p-6">

    <!-- HEADER -->
    <h1 class="text-2xl font-bold mb-6">Dashboard Alumni</h1>

    <!-- PROFIL CARD -->
    <div class="bg-white p-6 rounded-xl shadow mb-6 flex items-center gap-4">

        <img src="uploads/alumni/<?= $foto; ?>" 
            class="w-16 h-16 rounded-full object-cover border">

        <div>
            <h2 class="text-lg font-semibold text-gray-800"><?= $data['fullname']; ?></h2>
            <p class="text-sm text-gray-500">
                Lulusan <?= $data['tahun_lulus']; ?>
            </p>
        </div>

    </div>

<!-- STATISTIK -->
<div class="grid md:grid-cols-3 gap-6 mb-6">

    <!-- TOTAL PENDIDIKAN -->
    <div class="bg-white p-5 rounded-xl shadow flex items-center gap-4 hover:shadow-md transition">

        <div class="w-12 h-12 bg-blue-100 text-blue-600 flex items-center justify-center rounded-xl">
            <i class='bx bx-book text-xl'></i>
        </div>

        <div>
            <p class="text-xs text-gray-500">Total Pendidikan</p>
            <h2 class="text-xl font-bold text-gray-800"><?= $total_pendidikan ?></h2>
        </div>

    </div>

    <!-- TOTAL PEKERJAAN -->
    <div class="bg-white p-5 rounded-xl shadow flex items-center gap-4 hover:shadow-md transition">

        <div class="w-12 h-12 bg-green-100 text-green-600 flex items-center justify-center rounded-xl">
            <i class='bx bx-briefcase text-xl'></i>
        </div>

        <div>
            <p class="text-xs text-gray-500">Total Pekerjaan</p>
            <h2 class="text-xl font-bold text-gray-800"><?= $total_pekerjaan ?></h2>
        </div>

    </div>

    <!-- STATUS -->
    <div class="bg-white p-5 rounded-xl shadow flex items-center gap-4 hover:shadow-md transition">

        <div class="w-12 h-12 bg-purple-100 text-purple-600 flex items-center justify-center rounded-xl">
            <i class='bx bx-user-check text-xl'></i>
        </div>

        <div>
            <p class="text-xs text-gray-500">Status</p>
            <h2 class="text-sm font-semibold text-gray-800">
                <?= $kerja ? 'Bekerja' : 'Belum Bekerja' ?>
            </h2>
        </div>

    </div>

</div>

    <!-- INFO GRID -->
<div class="grid md:grid-cols-2 gap-6 mb-6">

    <!-- PENDIDIKAN -->
    <div class="bg-white p-5 rounded-xl shadow hover:shadow-md hover:-translate-y-1 transition flex items-start gap-4 border-l-4 border-blue-500">

        <!-- ICON -->
        <div class="w-12 h-12 bg-blue-100 text-blue-600 flex items-center justify-center rounded-xl">
            <i class='bx bx-book text-xl'></i>
        </div>

        <!-- CONTENT -->
        <div class="flex-1">
            <h3 class="font-semibold text-gray-700">Pendidikan Terakhir</h3>

            <?php if($pend): ?>
                <p class="text-sm font-medium mt-1"><?= $pend['nama_institusi']; ?></p>

                <div class="flex items-center gap-2 mt-1">
                    <span class="text-xs bg-blue-100 text-blue-600 px-2 py-1 rounded">
                        <?= $pend['jenjang']; ?>
                    </span>
                    <span class="text-xs text-gray-400">
                        <?= $pend['tahun_lulus']; ?>
                    </span>
                </div>
            <?php else: ?>
                <p class="text-sm text-gray-400 mt-1">Belum ada data</p>
            <?php endif; ?>
        </div>

    </div>

    <!-- PEKERJAAN -->
    <div class="bg-white p-5 rounded-xl shadow hover:shadow-md hover:-translate-y-1 transition flex items-start gap-4 border-l-4 border-green-500">

        <!-- ICON -->
        <div class="w-12 h-12 bg-green-100 text-green-600 flex items-center justify-center rounded-xl">
            <i class='bx bx-briefcase text-xl'></i>
        </div>

        <!-- CONTENT -->
        <div class="flex-1">
            <h3 class="font-semibold text-gray-700">Pekerjaan</h3>

            <?php if($kerja): ?>
                <p class="text-sm font-medium mt-1"><?= $kerja['nama_perusahaan']; ?></p>

                <div class="flex items-center gap-2 mt-1">
                    <span class="text-xs bg-green-100 text-green-600 px-2 py-1 rounded">
                        <?= $kerja['jabatan']; ?>
                    </span>
                </div>
            <?php else: ?>
                <p class="text-sm text-gray-400 mt-1">Belum bekerja</p>
            <?php endif; ?>
        </div>

    </div>

</div>

    <!-- BERITA -->
    <div class="bg-white p-6 rounded-xl shadow">
        <div class="flex justify-between items-center mb-4">
            <h3 class="font-semibold text-gray-700">📰 Berita Terbaru</h3>
            <a href="dashboard_alumni.php?page=berita" 
               class="text-sm text-blue-500 hover:underline">
                Lihat Semua
            </a>
        </div>

        <div class="space-y-4">
            <?php while($row = mysqli_fetch_assoc($berita)): ?>
                <div class="border-b pb-3 hover:bg-gray-50 p-2 rounded transition">

                    <h4 class="font-medium"><?= $row['judul']; ?></h4>

                    <p class="text-xs text-gray-400 mt-1">
                        <?= date('d M Y', strtotime($row['tanggal_post'])); ?>
                    </p>

                </div>
            <?php endwhile; ?>
        </div>

    </div>

</div>