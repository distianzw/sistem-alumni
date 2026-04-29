<?php
if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit;
}
?>

<div class="min-h-[80vh] flex items-center justify-center px-4">

    <div class="w-full max-w-2xl 
                bg-white rounded-3xl 
                shadow-2xl p-10">

        <!-- HEADER -->
        <div class="mb-8 text-center">
            <h2 class="text-3xl font-bold text-gray-800">
                👤 Tambah User
            </h2>
            <p class="text-gray-500 text-sm mt-2">
                Tambahkan akun baru ke sistem
            </p>
        </div>

        <!-- FORM -->
        <form action="dashboard_admin.php?page=user-tambah-proses" 
              method="POST" 
              class="space-y-6">

            <!-- FULLNAME -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Nama Lengkap
                </label>
                <input type="text" name="fullname" required
                       class="w-full px-4 py-3 border rounded-xl 
                              focus:ring-2 focus:ring-blue-500 
                              focus:border-blue-500 outline-none transition"
                       placeholder="Masukkan nama lengkap">
            </div>

            <!-- EMAIL -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Email
                </label>
                <input type="email" name="email" required
                       class="w-full px-4 py-3 border rounded-xl 
                              focus:ring-2 focus:ring-blue-500 
                              focus:border-blue-500 outline-none transition"
                       placeholder="Masukkan email">
            </div>

            <!-- PASSWORD -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Password
                </label>
                <input type="password" name="password" required
                       class="w-full px-4 py-3 border rounded-xl 
                              focus:ring-2 focus:ring-blue-500 
                              focus:border-blue-500 outline-none transition"
                       placeholder="Masukkan password">
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
                    <option value="">-- Pilih Role --</option>
                    <option value="admin">Admin</option>
                    <option value="alumni">Alumni</option>
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
                    Simpan User
                </button>

            </div>

        </form>

    </div>

</div>