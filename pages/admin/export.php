<?php

// data
$pekerjaan = mysqli_query($conn, "
    SELECT jabatan, COUNT(*) as jumlah 
    FROM pekerjaan 
    GROUP BY jabatan
");

$pendidikan = mysqli_query($conn, "
    SELECT jenjang, COUNT(*) as jumlah 
    FROM pendidikan 
    GROUP BY jenjang
");

$angkatan = mysqli_query($conn, "
    SELECT ang.tahun_angkatan, COUNT(a.id) as jumlah
    FROM alumni a
    LEFT JOIN angkatan ang ON a.angkatan_id = ang.id
    GROUP BY ang.tahun_angkatan
");

// USER
$user = mysqli_query($conn, "SELECT id, fullname, email FROM user");

// BERITA
$berita = mysqli_query($conn, "
    SELECT judul, tanggal_post 
    FROM berita
    ORDER BY tanggal_post DESC
");
?>

<div class="p-6">

    <h1 class="text-2xl font-bold mb-6">Export Data Alumni</h1>

    <a href="export_excel.php?type=all" 
   class="bg-blue-600 text-white px-4 py-2 rounded mb-6 inline-block">
   Export Semua Data
</a>

    <!-- PEKERJAAN -->
    <div class="bg-white p-6 rounded-xl shadow mb-6">
        <div class="flex justify-between mb-4">
            <h2 class="font-semibold">Statistik Pekerjaan</h2>

            <a href="export_excel.php?type=pekerjaan"
               class="bg-green-500 text-white px-3 py-1 rounded">
               Export
            </a>
        </div>

        <table class="w-full border text-sm">
            <tr class="bg-gray-100">
                <th class="p-2 text-left">Jabatan</th>
                <th class="p-2 text-center">Jumlah</th>
            </tr>

            <?php while($p = mysqli_fetch_assoc($pekerjaan)): ?>
            <tr>
                <td class="p-2"><?= $p['jabatan'] ?></td>
                <td class="p-2 text-center"><?= $p['jumlah'] ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

    <!-- PENDIDIKAN -->
    <div class="bg-white p-6 rounded-xl shadow mb-6">
        <div class="flex justify-between mb-4">
            <h2 class="font-semibold">Statistik Pendidikan</h2>

            <a href="export_excel.php?type=pendidikan"
               class="bg-green-500 text-white px-3 py-1 rounded">
               Export
            </a>
        </div>

        <table class="w-full border text-sm">
            <tr class="bg-gray-100">
                <th class="p-2 text-left">Jenjang</th>
                <th class="p-2 text-center">Jumlah</th>
            </tr>

            <?php while($d = mysqli_fetch_assoc($pendidikan)): ?>
            <tr>
                <td class="p-2"><?= $d['jenjang'] ?></td>
                <td class="p-2 text-center"><?= $d['jumlah'] ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

    <!-- ANGKATAN -->
    <div class="bg-white p-6 rounded-xl shadow mb-6">
        <div class="flex justify-between mb-4">
            <h2 class="font-semibold">Statistik Angkatan</h2>

            <a href="export_excel.php?type=angkatan"
               class="bg-green-500 text-white px-3 py-1 rounded">
               Export
            </a>
        </div>

        <table class="w-full border text-sm">
            <tr class="bg-gray-100">
                <th class="p-2 text-left">Angkatan</th>
                <th class="p-2 text-center">Jumlah</th>
            </tr>

            <?php while($a = mysqli_fetch_assoc($angkatan)): ?>
            <tr>
                <td class="p-2"><?= $a['tahun_angkatan'] ?? '-' ?></td>
                <td class="p-2 text-center"><?= $a['jumlah'] ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

    <!-- USER -->
<div class="bg-white p-6 rounded-xl shadow mb-6">
    <div class="flex justify-between mb-4">
        <h2 class="font-semibold">Data User</h2>

        <a href="export_excel.php?type=user"
           class="bg-green-500 text-white px-3 py-1 rounded">
           Export
        </a>
    </div>

    <table class="w-full border text-sm">
        <tr class="bg-gray-100">
            <th class="p-2 text-left">Nama</th>
            <th class="p-2 text-left">Email</th>
        </tr>

        <?php while($u = mysqli_fetch_assoc($user)): ?>
        <tr>
            <td class="p-2"><?= $u['fullname'] ?></td>
            <td class="p-2"><?= $u['email'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

<!-- BERITA -->
<div class="bg-white p-6 rounded-xl shadow mb-6">
    <div class="flex justify-between mb-4">
        <h2 class="font-semibold">Data Berita</h2>

        <a href="export_excel.php?type=berita"
           class="bg-green-500 text-white px-3 py-1 rounded">
           Export
        </a>
    </div>

    <table class="w-full border text-sm">
        <tr class="bg-gray-100">
            <th class="p-2 text-left">Judul</th>
            <th class="p-2 text-center">Tanggal</th>
        </tr>

        <?php while($b = mysqli_fetch_assoc($berita)): ?>
        <tr>
            <td class="p-2"><?= $b['judul'] ?></td>
            <td class="p-2 text-center">
                <?= date('d-m-Y', strtotime($b['tanggal_post'])) ?>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

</div>