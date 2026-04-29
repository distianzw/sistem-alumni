<?php

// statistik pekerjaan
$pekerjaan = mysqli_query($conn, "
    SELECT jabatan, COUNT(*) as jumlah 
    FROM pekerjaan 
    GROUP BY jabatan
");

// statistik pendidikan
$pendidikan = mysqli_query($conn, "
    SELECT jenjang, COUNT(*) as jumlah 
    FROM pendidikan 
    GROUP BY jenjang
");

// statistik angkatan
$angkatan = mysqli_query($conn, "
    SELECT ang.tahun_angkatan, COUNT(a.id) as jumlah
    FROM alumni a
    LEFT JOIN angkatan ang ON a.angkatan_id = ang.id
    GROUP BY ang.tahun_angkatan
");

// total
$total_alumni = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM alumni"))['total'];
$total_pekerjaan = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM pekerjaan"))['total'];
$total_pendidikan = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM pendidikan"))['total'];
?>

<div class="p-6">

    <!-- HEADER -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            Statistik
        </h1>
        <p class="text-sm text-gray-500">
            Ringkasan data alumni secara keseluruhan
        </p>
    </div>

    <!-- CARD -->
    <div class="grid md:grid-cols-3 gap-6 mb-6">

        <div class="bg-gradient-to-r from-blue-500 to-blue-700 
                    text-white p-6 rounded-2xl shadow-lg 
                    hover:scale-105 transition duration-300">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-sm opacity-80">Total Alumni</h2>
                    <p class="text-3xl font-bold"><?= $total_alumni ?></p>
                </div>
                <div class="bg-white/20 p-3 rounded-full">👨‍🎓</div>
            </div>
        </div>

        <div class="bg-gradient-to-r from-green-500 to-green-700 
                    text-white p-6 rounded-2xl shadow-lg 
                    hover:scale-105 transition duration-300">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-sm opacity-80">Data Pekerjaan</h2>
                    <p class="text-3xl font-bold"><?= $total_pekerjaan ?></p>
                </div>
                <div class="bg-white/20 p-3 rounded-full">💼</div>
            </div>
        </div>

        <div class="bg-gradient-to-r from-purple-500 to-purple-700 
                    text-white p-6 rounded-2xl shadow-lg 
                    hover:scale-105 transition duration-300">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-sm opacity-80">Data Pendidikan</h2>
                    <p class="text-3xl font-bold"><?= $total_pendidikan ?></p>
                </div>
                <div class="bg-white/20 p-3 rounded-full">🎓</div>
            </div>
        </div>

    </div>

    <!-- STATISTIK PEKERJAAN -->
    <div class="bg-white p-6 rounded-2xl shadow-md mb-6">
        <h2 class="font-semibold mb-4 text-gray-700">
            Statistik Pekerjaan
        </h2>

        <div class="overflow-hidden rounded-xl border">
            <table class="w-full text-sm">
                <thead class="bg-gradient-to-r from-gray-100 to-gray-200 text-gray-700">
                    <tr>
                        <th class="p-3 text-left">Jabatan</th>
                        <th class="p-3 text-center">Jumlah</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    <?php while($p = mysqli_fetch_assoc($pekerjaan)): ?>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-3"><?= $p['jabatan'] ?></td>
                        <td class="p-3 text-center font-semibold text-blue-600">
                            <?= $p['jumlah'] ?>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- STATISTIK PENDIDIKAN -->
    <div class="bg-white p-6 rounded-2xl shadow-md mb-6">
        <h2 class="font-semibold mb-4 text-gray-700">
            Statistik Pendidikan
        </h2>

        <div class="overflow-hidden rounded-xl border">
            <table class="w-full text-sm">
                <thead class="bg-gradient-to-r from-gray-100 to-gray-200 text-gray-700">
                    <tr>
                        <th class="p-3 text-left">Jenjang</th>
                        <th class="p-3 text-center">Jumlah</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    <?php while($d = mysqli_fetch_assoc($pendidikan)): ?>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-3"><?= $d['jenjang'] ?></td>
                        <td class="p-3 text-center font-semibold text-green-600">
                            <?= $d['jumlah'] ?>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- STATISTIK ANGKATAN -->
    <div class="bg-white p-6 rounded-2xl shadow-md">
        <h2 class="font-semibold mb-4 text-gray-700">
            Jumlah Alumni per Angkatan
        </h2>

        <div class="overflow-hidden rounded-xl border">
            <table class="w-full text-sm">
                <thead class="bg-gradient-to-r from-gray-100 to-gray-200 text-gray-700">
                    <tr>
                        <th class="p-3 text-left">Angkatan</th>
                        <th class="p-3 text-center">Jumlah Alumni</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    <?php while($a = mysqli_fetch_assoc($angkatan)): ?>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-3"><?= $a['tahun_angkatan'] ?? '-' ?></td>
                        <td class="p-3 text-center font-semibold text-purple-600">
                            <?= $a['jumlah'] ?>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>