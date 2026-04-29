<div class="min-h-[80vh] flex items-center justify-center px-4">

    <div class="w-full max-w-2xl 
                bg-white rounded-3xl 
                shadow-2xl p-10">

        <!-- HEADER -->
        <div class="mb-8 text-center">
            <h2 class="text-3xl font-bold text-gray-800">
                🎓 Tambah Jurusan
            </h2>
            <p class="text-gray-500 text-sm mt-2">
                Tambahkan jurusan baru ke sistem
            </p>
        </div>

        <!-- FORM -->
        <form action="?page=jurusan-tambah-proses" 
              method="POST" 
              class="space-y-6">

            <!-- NAMA JURUSAN -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Nama Jurusan
                </label>
                <input type="text" 
                       name="nama_jurusan" 
                       required
                       placeholder="Masukkan nama jurusan"
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
                    Simpan Jurusan
                </button>

            </div>

        </form>

    </div>

</div>