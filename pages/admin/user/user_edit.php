<?php
require "config/koneksi.php";

$id = $_GET['id'] ?? 0;

$result = mysqli_query($conn, "SELECT * FROM user WHERE id='$id'");
$user = mysqli_fetch_assoc($result);

if (!$user) {
    die("User tidak ditemukan");
}
?>

<div class="min-h-[80vh] flex items-center justify-center px-4">

    <div class="w-full max-w-2xl 
                bg-white rounded-3xl 
                shadow-2xl p-10">

        <!-- HEADER -->
        <div class="mb-8 text-center">
            <h2 class="text-3xl font-bold text-gray-800">
                ✏️ Edit User
            </h2>
            <p class="text-gray-500 text-sm mt-2">
                Perbarui informasi akun pengguna
            </p>
        </div>

        <!-- FORM -->
        <form action="dashboard_admin.php?page=user-edit-proses" 
              method="POST" 
              class="space-y-6">

            <input type="hidden" name="id" value="<?= $user['id'] ?>">

            <!-- FULLNAME -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Nama Lengkap
                </label>
                <input type="text" 
                       name="fullname"
                       value="<?= htmlspecialchars($user['fullname']) ?>"
                       required
                       class="w-full px-4 py-3 border rounded-xl 
                              focus:ring-2 focus:ring-blue-500 
                              focus:border-blue-500 outline-none transition">
            </div>

            <!-- EMAIL -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Email
                </label>
                <input type="email" 
                       name="email"
                       value="<?= htmlspecialchars($user['email']) ?>"
                       required
                       class="w-full px-4 py-3 border rounded-xl 
                              focus:ring-2 focus:ring-blue-500 
                              focus:border-blue-500 outline-none transition">
            </div>

            <!-- PASSWORD -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Password
                </label>
                <input type="password" 
                       name="password"
                       placeholder="Kosongkan jika tidak diubah"
                       class="w-full px-4 py-3 border rounded-xl 
                              focus:ring-2 focus:ring-blue-500 
                              focus:border-blue-500 outline-none transition">
            </div>

            <!-- ROLE -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Role
                </label>
                <select name="role" required
                        class="w-full px-4 py-3 border rounded-xl 
                               focus:ring-2 focus:ring-blue-500 
                               focus:border-blue-500 outline-none transition">
                    <option value="admin" <?= $user['role']=='admin'?'selected':'' ?>>Admin</option>
                    <option value="alumni" <?= $user['role']=='alumni'?'selected':'' ?>>Alumni</option>
                </select>
            </div>

            <!-- BUTTON -->
            <div class="flex justify-between items-center pt-6">

                <a href="dashboard_admin.php?page=user"
                   class="px-6 py-2 bg-gray-200 hover:bg-gray-300 rounded-xl transition">
                    Batal
                </a>

                <button type="submit"
                        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-xl shadow-lg transition">
                    Update User
                </button>

            </div>

        </form>

    </div>

</div>  