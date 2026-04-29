
<div class="max-w-3xl mx-auto bg-white p-8 rounded-2xl shadow-md">

    <h2 class="text-2xl font-semibold mb-6">Tambah Berita</h2>

    <form action="dashboard_admin.php?page=berita-tambah-proses"
          method="POST"
          enctype="multipart/form-data"
          class="space-y-6">

        <!-- Judul -->
        <div>
            <label class="block text-sm font-medium mb-2">Judul Berita</label>
            <input type="text"
                   name="judul"
                   required
                   class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">
        </div>

        <!-- Isi -->
        <div>
            <label class="block text-sm font-medium mb-2">Isi Berita</label>
            <textarea name="isi_berita"
                      rows="6"
                      required
                      class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none"></textarea>
        </div>

        <!-- Upload Gambar -->
        <div>
            <label class="block text-sm font-medium mb-2">Upload Gambar</label>
            <input type="file"
                   name="gambar"
                   accept="image/*"
                   required
                   class="w-full border rounded-xl px-4 py-2">
        </div>

        <!-- Preview Image -->
        <div>
            <img id="preview"
                 class="hidden w-full h-64 object-cover rounded-xl mt-3">
        </div>

        <!-- Button -->
        <div class="flex justify-end gap-3">

            <a href="dashboard_admin.php?page=berita"
               class="px-6 py-2 bg-gray-300 rounded-xl hover:bg-gray-400 transition">
               Batal
            </a>

            <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition">
                Simpan Berita
            </button>

        </div>

    </form>
</div>

<script>
const input = document.querySelector('input[name="gambar"]');
const preview = document.getElementById('preview');

input.addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.classList.remove('hidden');
    }
});
</script>