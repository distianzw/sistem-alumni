<?php

$id = $_GET['id'];

$data = mysqli_fetch_assoc(mysqli_query($conn, "
    SELECT * FROM berita WHERE id='$id'
"));

$gambar = (!empty($data['gambar']) && file_exists("uploads/berita/".$data['gambar']))
          ? $data['gambar']
          : 'default.png';
?>

<div class="p-6 max-w-5xl mx-auto">

    <!-- BACK -->
    <a href="dashboard_alumni.php?page=berita" 
       class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-[#5478FF] mb-6 transition">
        <i class='bx bx-arrow-back'></i> Kembali
    </a>

    <!-- CARD -->
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">

        <!-- IMAGE -->
        <div class="w-full bg-white-100 flex justify-center">
            <img src="uploads/berita/<?= $gambar ?>" 
                 class="w-full h-auto max-h-[500px] object-contain my-6">
        </div>

        <!-- CONTENT -->
        <div class="p-8">

            <!-- TITLE -->
            <h1 class="text-3xl font-bold text-gray-800 leading-snug mb-4">
                <?= $data['judul'] ?>
            </h1>

            <!-- META -->
            <div class="flex items-center justify-between flex-wrap gap-3 mb-6">

                <!-- DATE -->
                <div class="flex items-center gap-2 text-sm text-gray-400">
                    <i class='bx bx-calendar'></i>
                    <?= date('d F Y', strtotime($data['tanggal_post'])) ?>
                </div>

                <!-- AUTHOR -->
                <div class="flex items-center gap-2 text-sm text-gray-500">
                    <i class='bx bx-user'></i>
                    Admin Alumni
                </div>

            </div>

            <!-- HIGHLIGHT BOX -->
            <div class="bg-blue-50 border-l-4 border-[#5478FF] p-4 rounded-lg mb-6">
                <p class="text-sm text-gray-600 italic">
                    "Informasi ini ditujukan untuk seluruh alumni agar tetap terhubung dan mendapatkan update terbaru."
                </p>
            </div>

            <!-- ISI -->
            <div class="text-gray-700 leading-relaxed space-y-4 text-justify text-[15px]">

                <?= nl2br($data['isi_berita']) ?>

            </div>


        </div>

    </div>

</div>