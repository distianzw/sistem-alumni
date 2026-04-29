<?php
$id = $_GET['id'];

$data = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT * FROM jurusan WHERE id='$id'"
));
?>

<div class="min-h-[80vh] flex items-center justify-center px-4">

    <div class="w-full max-w-2xl 
                bg-white rounded-3xl 
                shadow-2xl p-10">

        <!-- HEADER -->
        <div class="mb-8 text-center">
            <h2 class="text-3xl font-bold text-gray-800">
                ✏️ Edit Jurusan
            </h2>
            <p class="text-gray-500 text-sm mt-2">
                Perbarui data jurusan dalam sistem
            </p>
        </div>

        <!-- FORM -->
        <form action="?page=jurusan-edit-proses" 
              method="POST" 
              class="space-y-6">

            <input type="hidden" name="id" value="<?= $data['id'] ?>">

            <!-- NAMA JURUSAN -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Nama Jurusan
                </label>
                <input type="text" 
                       name="nama_jurusan"
                       value="<?= htmlspecialchars($data['nama_jurusan']) ?>"
                       required
                       class="w-full px-4 py-3 border rounded-xl 
                              focus:ring-2 focus:ring-blue-500 
                              focus:border-blue-500 outline-none transition">
            </div>

            <!-- BUTTON -->
            <div class="flex justify-between items-center pt-6">

                <a href="?page=jurusan"
                   class="px-6 py-2 bg-gray-200 hover:bg-gray-300 rounded-xl transition">
                    Batal
                </a>

                <button type="submit"
                        class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-xl shadow-lg transition">
                    Update Jurusan
                </button>

            </div>

        </form>

    </div>

</div>