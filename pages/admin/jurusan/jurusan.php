<?php 
$sql = "SELECT * FROM jurusan ORDER BY id DESC";
$results = mysqli_query($conn,$sql);
$no = 1;
?>

<div>

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-semibold text-gray-800">Manajemen Jurusan</h2>
            <p class="text-gray-500 text-sm">Kelola seluruh data jurusan</p>
        </div>

        <a href="dashboard_admin.php?page=jurusan-tambah"
           class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-xl shadow transition">
            + Tambah Jurusan
        </a>
    </div>

    <!-- CARD -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        <!-- SEARCH -->
        <div class="p-6 border-b">
            <input type="text"
                   id="searchInput"
                   placeholder="Cari nama jurusan..."
                   class="w-full md:w-1/3 px-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
        </div>

        <!-- TABLE -->
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50 text-gray-600 text-sm uppercase">
                    <tr>
                        <th class="px-6 py-4">No</th>
                        <th class="px-6 py-4">Nama Jurusan</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="text-gray-700 divide-y">

                    <?php while($row = mysqli_fetch_assoc($results)): ?>
                    <tr class="hover:bg-gray-50 transition">

                        <td class="px-6 py-4">
                            <?= $no++ ?>
                        </td>

                        <td class="px-6 py-4 font-medium">
                            <?= htmlspecialchars($row['nama_jurusan']) ?>
                        </td>

                        <td class="px-6 py-4 text-center space-x-2">

                            <a href="dashboard_admin.php?page=jurusan-edit&id=<?= $row['id'] ?>"
                               class="px-4 py-1.5 bg-yellow-400 hover:bg-yellow-500 text-white rounded-lg text-sm transition">
                                Edit
                            </a>

                            <form action="dashboard_admin.php?page=jurusan-hapus"
                                  method="POST"
                                  class="inline-block"
                                  onsubmit="return confirm('Yakin ingin menghapus jurusan ini?')">

                                <input type="hidden" name="id" value="<?= $row['id'] ?>">

                                <button type="submit"
                                        class="px-4 py-1.5 bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm transition">
                                    Delete
                                </button>
                            </form>

                        </td>

                    </tr>
                    <?php endwhile; ?>

                </tbody>
            </table>
        </div>

    </div>

</div> 