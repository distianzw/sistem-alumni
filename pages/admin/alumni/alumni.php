<?php

$search = $_GET['search'] ?? '';

$sql = "
SELECT 
    alumni.id,
    user.fullname,
    user.email,
    alumni.jenis_kelamin,
    alumni.tahun_lulus,
    alumni.alamat,
    alumni.no_telepon,
    angkatan.tahun_angkatan,
    jurusan.nama_jurusan
FROM alumni
JOIN user ON alumni.user_id = user.id
LEFT JOIN angkatan ON alumni.angkatan_id = angkatan.id
LEFT JOIN jurusan ON alumni.jurusan_id = jurusan.id
";

if ($search != '') {
    $search = mysqli_real_escape_string($conn, $search);
    $sql .= " WHERE user.fullname LIKE '%$search%' 
              OR user.email LIKE '%$search%'";
}

$sql .= " ORDER BY alumni.id DESC";

$result = mysqli_query($conn, $sql);
$no = 1;
?>

<div class="space-y-6">

    <!-- HEADER -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800">
                Manajemen Alumni
            </h1>
            <p class="text-sm text-gray-500">
                Kelola seluruh data alumni sistem
            </p>
        </div>
    </div>

    <!-- CARD -->
    <div class="bg-white rounded-2xl shadow-md overflow-hidden">

        <!-- SEARCH -->
        <div class="p-6 border-b">
            <form method="GET" class="flex items-center gap-4">
                <input type="hidden" name="page" value="alumni">
                <input type="text"
                       name="search"
                       value="<?= htmlspecialchars($_GET['search'] ?? '') ?>"
                       placeholder="Cari nama atau email..."
                       class="w-80 px-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm">
            </form>
        </div>

        <!-- TABLE -->
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-4">No</th>
                        <th class="px-6 py-4">Nama</th>
                        <th class="px-6 py-4">Email</th>
                        <th class="px-6 py-4">JK</th>
                        <th class="px-6 py-4">Angkatan</th>
                        <th class="px-6 py-4">Jurusan</th>
                        <th class="px-6 py-4">Lulus</th>
                        <th class="px-6 py-4">Telepon</th>
                        <th class="px-6 py-4">Alamat</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4"><?= $no++ ?></td>

                        <td class="px-6 py-4 font-medium text-gray-800">
                            <?= htmlspecialchars($row['fullname']) ?>
                        </td>

                        <td class="px-6 py-4 text-gray-600">
                            <?= htmlspecialchars($row['email']) ?>
                        </td>

                        <td class="px-6 py-4">
                            <?php if($row['jenis_kelamin'] == 'L'): ?>
                                <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-xs font-medium">
                                    Laki-laki
                                </span>

                            <?php elseif($row['jenis_kelamin'] == 'P'): ?>
                                <span class="bg-pink-100 text-pink-600 px-3 py-1 rounded-full text-xs font-medium">
                                    Perempuan
                                </span>

                            <?php else: ?>
                                <!-- Kosong jika belum diinput -->
                            <?php endif; ?>
                        </td>

                        <td class="px-6 py-4">
                            <?= $row['tahun_angkatan'] ?? '-' ?>
                        </td>

                        <td class="px-6 py-4">
                            <?= $row['nama_jurusan'] ?? '-' ?>
                        </td>

                        <td class="px-6 py-4">
                            <?= $row['tahun_lulus'] ?? '-' ?>
                        </td>

                        <td class="px-6 py-4">
                            <?= $row['no_telepon'] ?? '-' ?>
                        </td>

                        <td class="px-6 py-4 max-w-xs truncate">
                            <?= $row['alamat'] ?? '-' ?>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>

            </table>
        </div>

    </div>

</div>