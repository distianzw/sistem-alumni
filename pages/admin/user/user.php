<?php 

if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit;
}

$sql = "SELECT * FROM user ORDER BY id DESC";
$results = mysqli_query($conn,$sql);
$no = 1;
?>

<div class=" ">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-semibold text-gray-800">Manajemen User</h2>
            <p class="text-gray-500 text-sm">Kelola seluruh akun sistem</p>
        </div>

        <a href="dashboard_admin.php?page=user-tambah"
           class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-xl shadow transition">
            + Tambah User
        </a>
    </div>

    <!-- CARD -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        <!-- SEARCH -->
        <div class="p-6 border-b">
            <input type="text"
                   id="searchInput"
                   placeholder="Cari nama atau email..."
                   class="w-full md:w-1/3 px-4 py-2 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
        </div>

        <!-- TABLE -->
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50 text-gray-600 text-sm uppercase">
                    <tr>
                        <th class="px-6 py-4">No</th>
                        <th class="px-6 py-4">Nama</th>
                        <th class="px-6 py-4">Email</th>
                        <th class="px-6 py-4">Role</th>
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
                            <?= htmlspecialchars($row['fullname']) ?>
                        </td>

                        <td class="px-6 py-4 text-gray-600">
                            <?= htmlspecialchars($row['email']) ?>
                        </td>

                        <td class="px-6 py-4">
                            <?php if($row['role'] == 'admin'): ?>
                                <span class="px-3 py-1 text-xs bg-red-100 text-red-600 rounded-full">
                                    Admin
                                </span>
                            <?php else: ?>
                                <span class="px-3 py-1 text-xs bg-blue-100 text-blue-600 rounded-full">
                                    Alumni
                                </span>
                            <?php endif; ?>
                        </td>

                        <td class="px-6 py-4 text-center space-x-2">

                            <a href="dashboard_admin.php?page=user-edit&id=<?= $row['id'] ?>"
                               class="px-4 py-1.5 bg-yellow-400 hover:bg-yellow-500 text-white rounded-lg text-sm transition">
                                Edit
                            </a>

                            <form action="dashboard_admin.php?page=user-hapus"
                                  method="POST"
                                  class="inline-block"
                                  onsubmit="return confirm('Yakin ingin menghapus user ini?')">

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