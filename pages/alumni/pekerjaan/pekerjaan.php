<?php

$user_id = $_SESSION['user_id'];

// ambil data alumni + gender
$alumni = mysqli_fetch_assoc(mysqli_query($conn, "
    SELECT id, jenis_kelamin 
    FROM alumni 
    WHERE user_id='$user_id'
"));

$pekerjaan = mysqli_query($conn, "
    SELECT * FROM pekerjaan 
    WHERE alumni_id='{$alumni['id']}'
    ORDER BY tahun_mulai DESC
");

/* 🎨 WARNA DINAMIS */
$isCewe = ($alumni['jenis_kelamin'] == 'P');

$mainColor   = $isCewe ? 'from-pink-500 to-pink-400' : 'from-[#5478FF] to-indigo-500';
$btnColor    = $isCewe ? 'bg-pink-500 hover:bg-pink-600' : 'bg-[#5478FF] hover:bg-indigo-600';
$badgeColor  = $isCewe ? 'bg-pink-100 text-pink-600' : 'bg-blue-100 text-blue-600';
$iconColor   = $isCewe ? 'text-pink-500' : 'text-[#5478FF]';

?>

<div class="p-6">

    <!-- HEADER -->
    <div class="flex items-center justify-between mb-6">

        <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
            <i class='bx bx-briefcase <?= $iconColor ?>'></i>
            Pekerjaan Saya
        </h1>

        <a href="dashboard_alumni.php?page=pekerjaan-tambah"
           class="flex items-center gap-2 <?= $btnColor ?> 
                  text-white px-4 py-2 rounded-xl shadow transition">

            <i class='bx bx-plus'></i> Tambah
        </a>

    </div>

    <!-- CARD GRID -->
    <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">

        <?php if(mysqli_num_rows($pekerjaan) > 0): ?>

            <?php while($row = mysqli_fetch_assoc($pekerjaan)): ?>

            <div class="bg-white rounded-2xl shadow-md hover:shadow-xl 
                        transition duration-300 overflow-hidden group">

                <!-- TOP STRIP -->
                <div class="h-2 bg-gradient-to-r <?= $mainColor ?>"></div>

                <!-- CONTENT -->
                <div class="p-5">

                    <!-- HEADER -->
                    <div class="flex justify-between items-start mb-4">

                        <div>
                            <h2 class="font-semibold text-gray-800 text-lg leading-tight">
                                <?= $row['nama_perusahaan'] ?>
                            </h2>

                            <p class="text-xs text-gray-400 mt-1">
                                Tahun Mulai
                            </p>
                        </div>

                        <!-- BADGE -->
                        <span class="text-xs <?= $badgeColor ?> px-3 py-1 rounded-full">
                            <?= $row['tahun_mulai'] ?>
                        </span>

                    </div>

                    <!-- JABATAN -->
                    <div class="mb-4 flex items-center gap-2">
                        <i class='bx bx-user-pin text-green-500 text-lg'></i>
                        <span class="text-sm font-medium text-gray-700">
                            <?= $row['jabatan'] ?>
                        </span>
                    </div>

                    <!-- ACTION -->
                    <div class="flex gap-2 mt-4">

                        <a href="dashboard_alumni.php?page=pekerjaan-edit&id=<?= $row['id'] ?>"
                           class="flex-1 flex items-center justify-center gap-1
                                  bg-yellow-100 text-yellow-600 py-2 rounded-lg 
                                  hover:bg-yellow-200 transition text-sm">

                            <i class='bx bx-edit'></i> Edit
                        </a>

                        <a href="?page=pekerjaan-hapus&id=<?= $row['id'] ?>"
                           onclick="return confirm('Yakin hapus?')"
                           class="flex-1 flex items-center justify-center gap-1
                                  bg-red-100 text-red-600 py-2 rounded-lg 
                                  hover:bg-red-200 transition text-sm">

                            <i class='bx bx-trash'></i> Hapus
                        </a>

                    </div>

                </div>

            </div>

            <?php endwhile; ?>

        <?php else: ?>

            <!-- EMPTY STATE -->
            <div class="col-span-full flex flex-col items-center justify-center 
                        bg-white p-10 rounded-2xl shadow text-gray-400">

                <i class='bx bx-briefcase text-5xl mb-3'></i>
                <p class="text-sm">Belum ada data pekerjaan</p>

                <a href="dashboard_alumni.php?page=pekerjaan-tambah"
                   class="mt-4 <?= $btnColor ?> text-white px-4 py-2 rounded-lg text-sm">
                   Tambah Sekarang
                </a>

            </div>

        <?php endif; ?>

    </div>

</div>