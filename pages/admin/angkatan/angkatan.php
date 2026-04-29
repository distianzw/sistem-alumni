<?php

$keyword = $_GET['search'] ?? '';

if ($keyword != '') {
    $data = mysqli_query($conn,"SELECT * FROM angkatan 
        WHERE tahun_angkatan LIKE '%$keyword%'
        ORDER BY id DESC");
} else {
    $data = mysqli_query($conn,"SELECT * FROM angkatan ORDER BY id DESC");
}
?>

<div class="space-y-6">

    <!-- HEADER -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800">
                Manajemen Angkatan
            </h1>
            <p class="text-sm text-gray-500">
                Kelola data angkatan sekolah
            </p>
        </div>

        <a href="?page=angkatan-tambah"
           class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-xl shadow transition">
            + Tambah Angkatan
        </a>
    </div>

    <!-- CARD -->
    <div class="bg-white rounded-2xl shadow-md overflow-hidden">

        <!-- SEARCH -->
        <div class="p-6 border-b">
            <form method="GET">
                <input type="hidden" name="page" value="angkatan">
                <input type="text" name="search"
                       value="<?= $keyword ?>"
                       placeholder="Cari tahun angkatan..."
                       class="w-80 px-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm">
            </form>
        </div>

        <!-- TABLE -->
        <table class="w-full text-sm">
            <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-6 py-4 text-left">No</th>
                    <th class="px-6 py-4 text-left">Tahun Angkatan</th>
                    <th class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y">
            <?php $no=1; while($row=mysqli_fetch_assoc($data)) { ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4"><?= $no++ ?></td>

                    <td class="px-6 py-4 font-medium text-gray-800">
                        <?= $row['tahun_angkatan'] ?>
                    </td>

                    <td class="px-6 py-4 text-center space-x-2">

                        <a href="?page=angkatan-edit&id=<?= $row['id'] ?>"
                           class="bg-yellow-400 hover:bg-yellow-500 text-black px-3 py-1 rounded-lg text-xs font-semibold transition">
                            Edit
                        </a>

                        <a href="?page=angkatan-hapus&id=<?= $row['id'] ?>"
                           onclick="return confirm('Yakin hapus data?')"
                           class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-xs font-semibold transition">
                            Delete
                        </a>

                    </td>
                </tr>
            <?php } ?>
            </tbody>

        </table>

    </div>

</div>