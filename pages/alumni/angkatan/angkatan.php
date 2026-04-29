<?php

$user_id = $_SESSION['user_id'];

// ambil data alumni user login
$me = mysqli_fetch_assoc(mysqli_query($conn, "
    SELECT * FROM alumni WHERE user_id='$user_id'
"));

$angkatan_id = $me['angkatan_id'];

// ambil teman seangkatan
$teman = mysqli_query($conn, "
    SELECT a.*, u.fullname, u.foto, j.nama_jurusan
    FROM alumni a
    JOIN user u ON a.user_id = u.id
    LEFT JOIN jurusan j ON a.jurusan_id = j.id
    WHERE a.angkatan_id='$angkatan_id'
");

// ambil data alumni + gender
$alumni = mysqli_fetch_assoc(mysqli_query($conn, "
    SELECT id, jenis_kelamin 
    FROM alumni 
    WHERE user_id='$user_id'
"));

$isCewe = ($alumni['jenis_kelamin'] == 'P');
$iconColor   = $isCewe ? 'text-pink-500' : 'text-[#5478FF]';
?>

<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<div class="p-6">

    <h1 class="text-2xl font-bold mb-6 text-gray-800">
        <i class='bx bx-calendar <?= $iconColor ?>' ></i> Teman Seangkatan
    </h1>

    <div class="grid md:grid-cols-3 gap-6">

        <?php while($row = mysqli_fetch_assoc($teman)): ?>

            <?php
            $foto = (!empty($row['foto']) && file_exists("uploads/alumni/".$row['foto']))
                    ? $row['foto']
                    : 'default.png';

            // 🔥 CEK GENDER
            $isCewe = ($row['jenis_kelamin'] == 'P');

            $colorMain  = $isCewe ? 'bg-pink-500 hover:bg-pink-600' : 'bg-[#5478FF] hover:bg-indigo-600';
            $border     = $isCewe ? 'border-pink-400' : 'border-[#5478FF]';
            $badge      = $isCewe ? 'bg-pink-100 text-pink-600' : 'bg-blue-100 text-blue-600';
            ?>

            <div class="bg-white p-5 rounded-2xl shadow-sm 
                        hover:shadow-xl hover:-translate-y-2 
                        transition duration-300 border border-gray-100">

                <!-- TOP -->
                <div class="flex items-center gap-4 mb-4">

                    <!-- FOTO -->
                    <div class="relative">
                        <img src="uploads/alumni/<?= $foto ?>" 
                             class="w-14 h-14 rounded-full object-cover border-2 <?= $border ?>">

                        <span class="absolute bottom-0 right-0 w-3 h-3 bg-green-400 border-2 border-white rounded-full"></span>
                    </div>

                    <!-- NAMA -->
                    <div>
                        <h2 class="font-semibold text-gray-800">
                            <?= $row['fullname'] ?>
                        </h2>

                        <p class="text-xs text-gray-500">
                            <?= $row['nama_jurusan'] ?? 'Belum ada jurusan' ?>
                        </p>
                    </div>

                </div>

                <!-- INFO -->
                <div class="flex items-center justify-between mb-4">

                    <span class="text-xs px-2 py-1 rounded <?= $badge ?>">
                     <?= $row['tahun_lulus'] ?>
                    </span>

                    <span class="text-xs text-gray-400">
                        Alumni
                    </span>

                </div>

                <!-- BUTTON -->
                <a href="dashboard_alumni.php?page=detail_teman&id=<?= $row['id'] ?>"
                   class="block text-center text-white text-sm py-2 rounded-xl transition <?= $colorMain ?>">
                    Lihat Profil
                </a>

            </div>

        <?php endwhile; ?>

    </div>

</div>