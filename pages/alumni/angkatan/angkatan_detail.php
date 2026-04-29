<?php

$id = isset($_GET['id']) ? $_GET['id'] : 0;

// ambil data utama
$data = mysqli_fetch_assoc(mysqli_query($conn, "
    SELECT a.*, u.fullname, u.foto,
           j.nama_jurusan,
           ang.tahun_angkatan AS nama_angkatan
    FROM alumni a
    JOIN user u ON a.user_id = u.id
    LEFT JOIN jurusan j ON a.jurusan_id = j.id
    LEFT JOIN angkatan ang ON a.angkatan_id = ang.id
    WHERE a.id='$id'
"));

// FOTO DEFAULT
$foto = (!empty($data['foto']) && file_exists("uploads/alumni/".$data['foto']))
        ? $data['foto']
        : 'default.png';

// 🔥 CEK GENDER
$isCewe = ($data['jenis_kelamin'] == 'P');

$colorMain = $isCewe ? 'from-pink-500 to-pink-600' : 'from-[#5478FF] to-indigo-600';
$border    = $isCewe ? 'border-pink-400' : 'border-[#5478FF]';
$badge     = $isCewe ? 'bg-pink-100 text-pink-600' : 'bg-blue-100 text-blue-600';

// ambil pendidikan
$pendidikan = mysqli_query($conn, "
    SELECT * FROM pendidikan 
    WHERE alumni_id='$id'
    ORDER BY tahun_lulus DESC
");

// ambil pekerjaan
$pekerjaan = mysqli_query($conn, "
    SELECT * FROM pekerjaan 
    WHERE alumni_id='$id'
    ORDER BY tahun_mulai DESC
");
?>

<div class="p-6 max-w-5xl mx-auto">

    <!-- BACK -->
    <a href="dashboard_alumni.php?page=angkatan"
       class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-[#5478FF] mb-6 transition">
        <i class='bx bx-arrow-back'></i> Kembali
    </a>

    <!-- PROFIL HEADER -->
    <div class="bg-gradient-to-r <?= $colorMain ?> text-white p-6 rounded-2xl shadow mb-6 flex items-center gap-6">

        <img src="uploads/alumni/<?= $foto ?>" 
             class="w-24 h-24 rounded-full object-cover border-4 border-white">

        <div>
            <h1 class="text-2xl font-bold"><?= $data['fullname'] ?></h1>
            <p class="text-white/80"><?= $data['nama_jurusan'] ?? '-' ?></p>

            <div class="flex items-center gap-3 mt-2 flex-wrap">
                <span class="text-xs bg-white/20 px-3 py-1 rounded">
                    🎓 <?= $data['nama_angkatan'] ?? '-' ?>
                </span>

                <span class="text-xs bg-white/20 px-3 py-1 rounded">
                    <?= $data['jenis_kelamin'] == 'P' ? 'Perempuan' : 'Laki-laki' ?>
                </span>
            </div>
        </div>

    </div>

    <!-- DETAIL INFO -->
    <div class="bg-white p-6 rounded-2xl shadow mb-6">

        <h2 class="font-semibold text-gray-700 mb-4">Informasi Pribadi</h2>

        <div class="grid md:grid-cols-2 gap-4 text-sm">

            <div class="flex items-center gap-3">
                <i class='bx bx-phone text-gray-400'></i>
                <span><?= $data['no_telepon'] ?: '-' ?></span>
            </div>

            <div class="flex items-center gap-3">
                <i class='bx bx-map text-gray-400'></i>
                <span><?= $data['alamat'] ?: '-' ?></span>
            </div>

        </div>

    </div>

    <!-- GRID -->
    <div class="grid md:grid-cols-2 gap-6">

        <!-- PENDIDIKAN -->
        <div class="bg-white p-6 rounded-2xl shadow">

            <h2 class="font-semibold text-gray-700 mb-4 flex items-center gap-2">
                <i class='bx bx-book text-blue-500'></i>
                Riwayat Pendidikan
            </h2>

            <?php if(mysqli_num_rows($pendidikan) > 0): ?>
                <div class="space-y-4">
                    <?php while($p = mysqli_fetch_assoc($pendidikan)): ?>
                        <div class="flex items-start gap-3">

                            <div class="w-3 h-3 mt-2 rounded-full <?= $isCewe ? 'bg-pink-500' : 'bg-blue-500' ?>"></div>

                            <div>
                                <p class="font-medium"><?= $p['nama_institusi'] ?></p>

                                <div class="flex items-center gap-2 mt-1">
                                    <span class="text-xs px-2 py-1 rounded <?= $badge ?>">
                                        <?= $p['jenjang'] ?>
                                    </span>
                                    <span class="text-xs text-gray-400">
                                        <?= $p['tahun_lulus'] ?>
                                    </span>
                                </div>
                            </div>

                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <p class="text-gray-400">Belum ada data pendidikan</p>
            <?php endif; ?>

        </div>

        <!-- PEKERJAAN -->
        <div class="bg-white p-6 rounded-2xl shadow">

            <h2 class="font-semibold text-gray-700 mb-4 flex items-center gap-2">
                <i class='bx bx-briefcase text-green-500'></i>
                Pengalaman Kerja
            </h2>

            <?php if(mysqli_num_rows($pekerjaan) > 0): ?>
                <div class="space-y-4">
                    <?php while($k = mysqli_fetch_assoc($pekerjaan)): ?>
                        <div class="flex items-start gap-3">

                            <div class="w-3 h-3 mt-2 rounded-full bg-green-500"></div>

                            <div>
                                <p class="font-medium"><?= $k['nama_perusahaan'] ?></p>

                                <div class="flex items-center gap-2 mt-1">
                                    <span class="text-xs bg-green-100 text-green-600 px-2 py-1 rounded">
                                        <?= $k['jabatan'] ?>
                                    </span>
                                    <span class="text-xs text-gray-400">
                                        <?= $k['tahun_mulai'] ?>
                                    </span>
                                </div>
                            </div>

                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <p class="text-gray-400">Belum ada data pekerjaan</p>
            <?php endif; ?>

        </div>

    </div>

</div>