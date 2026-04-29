<?php
$user_id = $_SESSION['user_id'];

$query = mysqli_query($conn, "
    SELECT a.*, u.fullname, u.foto,
           j.nama_jurusan,
           ang.tahun_angkatan AS nama_angkatan
    FROM alumni a
    JOIN user u ON a.user_id = u.id
    LEFT JOIN jurusan j ON a.jurusan_id = j.id
    LEFT JOIN angkatan ang ON a.angkatan_id = ang.id
    WHERE a.user_id='$user_id'
");

$data = mysqli_fetch_assoc($query);

// ambil data alumni + gender
$alumni = mysqli_fetch_assoc(mysqli_query($conn, "
    SELECT id, jenis_kelamin 
    FROM alumni 
    WHERE user_id='$user_id'
"));

/* 🎨 WARNA DINAMIS */
$isCewe = ($alumni['jenis_kelamin'] == 'P');

$mainColor   = $isCewe ? 'from-pink-500 to-pink-400' : 'from-[#5478FF] to-indigo-500';
$btnColor    = $isCewe ? 'bg-pink-500 hover:bg-pink-600' : 'bg-[#5478FF] hover:bg-indigo-600';
$badgeColor  = $isCewe ? 'bg-pink-100 text-pink-600' : 'bg-blue-100 text-blue-600';
$iconColor   = $isCewe ? 'text-pink-500' : 'text-[#5478FF]';

$warna = ($data['jenis_kelamin'] == 'P') ? 'pink' : 'blue';

/* FOTO */
$foto = (!empty($data['foto']) && file_exists("uploads/alumni/".$data['foto']))
        ? $data['foto'] : 'default.png';
?>

<div class="p-6">

    <h1 class="text-2xl font-bold mb-6 text-gray-800 flex items-center gap-2"">
        <i class='bx bx-user <?= $iconColor ?>'></i>
        Profil Alumni
    </h1>

    <!-- CARD -->
    <div class="bg-white rounded-2xl shadow-md overflow-hidden">

        <!-- TOP STRIP -->
        <div class="h-2 bg-gradient-to-r from-<?= $warna ?>-500 to-<?= $warna ?>-400"></div>

        <div class="p-6">

            <!-- HEADER -->
            <div class="flex items-center gap-5 mb-6">

                <img src="uploads/alumni/<?= $foto ?>" 
                     class="w-24 h-24 rounded-full object-cover border-2 border-<?= $warna ?>-400 shadow">

                <div>
                    <h2 class="text-xl font-semibold text-gray-800">
                        <?= $data['fullname'] ?>
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        <?= $data['nama_jurusan'] ?? '-' ?>
                    </p>

                    <!-- BADGE ANGKATAN -->
                    <span class="inline-block mt-2 text-xs 
                                 bg-<?= $warna ?>-100 text-<?= $warna ?>-600 
                                 px-3 py-1 rounded-full">
                        Angkatan <?= $data['nama_angkatan'] ?? '-' ?>
                    </span>
                </div>

            </div>

            <!-- GRID INFO -->
            <div class="grid md:grid-cols-2 gap-6 text-sm">

                <div class="flex items-start gap-3">
                    <i class='bx bx-user text-<?= $warna ?>-500 text-xl mt-1'></i>
                    <div>
                        <p class="text-gray-500">Jenis Kelamin</p>
                        <p class="font-medium text-gray-800">
                            <?= $data['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan' ?>
                        </p>
                    </div>
                </div>

                <div class="flex items-start gap-3">
                    <i class='bx bx-calendar text-<?= $warna ?>-500 text-xl mt-1'></i>
                    <div>
                        <p class="text-gray-500">Tahun Lulus</p>
                        <p class="font-medium text-gray-800"><?= $data['tahun_lulus'] ?></p>
                    </div>
                </div>

                <div class="flex items-start gap-3">
                    <i class='bx bx-phone text-<?= $warna ?>-500 text-xl mt-1'></i>
                    <div>
                        <p class="text-gray-500">No HP</p>
                        <p class="font-medium text-gray-800"><?= $data['no_telepon'] ?></p>
                    </div>
                </div>

                <div class="flex items-start gap-3">
                    <i class='bx bx-map text-<?= $warna ?>-500 text-xl mt-1'></i>
                    <div>
                        <p class="text-gray-500">Alamat</p>
                        <p class="font-medium text-gray-800"><?= $data['alamat'] ?></p>
                    </div>
                </div>

            </div>

            <!-- BUTTON -->
            <div class="mt-8 flex gap-3">

                <a href="dashboard_alumni.php?page=profil-edit&id=<?= $data['id'] ?>" 
                   class="flex items-center gap-2 
                          bg-<?= $warna ?>-500 hover:bg-<?= $warna ?>-600 
                          text-white px-4 py-2 rounded-xl shadow transition">

                    <i class='bx bx-edit'></i>
                    Edit Profil
                </a>

                <a href="hapus_profil.php?id=<?= $data['id'] ?>" 
                   onclick="return confirm('Yakin hapus profil?')"
                   class="flex items-center gap-2 
                          bg-red-500 hover:bg-red-600 
                          text-white px-4 py-2 rounded-xl shadow transition">

                    <i class='bx bx-trash'></i>
                    Hapus
                </a>

            </div>

        </div>

    </div>

</div>