<?php
require "config/koneksi.php";

$sql = "
SELECT 
    berita.*,
    user.fullname
FROM berita
JOIN user ON berita.user_id = user.id
ORDER BY berita.tanggal_post DESC
";

$result = mysqli_query($conn, $sql);
?>

<!-- HEADER -->
<div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 mb-10">

    <div>
        <h2 class="text-3xl font-bold text-gray-800">
            📰 Kelola Berita
        </h2>
        <p class="text-gray-500 text-sm mt-1">
            Manajemen konten berita website
        </p>
    </div>

    <div class="flex gap-3 w-full md:w-auto">

        <!-- SEARCH -->
        <input type="text"
               id="searchInput"
               placeholder="Cari judul berita..."
               class="w-full md:w-64 px-4 py-2 rounded-xl 
                      bg-white/60 backdrop-blur-md 
                      border border-white/40 
                      focus:ring-2 focus:ring-blue-500 outline-none">

        <a href="dashboard_admin.php?page=berita-tambah"
           class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-xl shadow-lg transition font-medium">
           + Tambah
        </a>

    </div>
</div>


<!-- GRID 4 KESAMPING -->
<div id="beritaContainer"
     class="grid 
            grid-cols-1 
            sm:grid-cols-2 
            lg:grid-cols-3 
            xl:grid-cols-4 
            gap-8">

<?php while($row = mysqli_fetch_assoc($result)): ?>

    <div class="berita-card group relative 
        bg-gradient-to-br from-white to-gray-50
        border border-gray-200
        rounded-3xl 
        shadow-md hover:shadow-2xl 
        transition duration-300 
        overflow-hidden 
        flex flex-col">

    <!-- IMAGE -->
    <div class="relative overflow-hidden">
        <img src="uploads/berita/<?= $row['gambar'] ?>"
             class="w-full h-52 object-cover group-hover:scale-110 transition duration-500">

        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-black/10 to-transparent"></div>

        <!-- tanggal -->
        <div class="absolute bottom-3 left-4 text-white text-xs bg-black/40 px-2 py-1 rounded-lg backdrop-blur flex items-center gap-1">
            <i class='bx bx-calendar'></i>
            <?= date('d M Y', strtotime($row['tanggal_post'])) ?>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="p-5 flex flex-col flex-1">

        <!-- JUDUL -->
        <h3 class="judul text-lg font-semibold text-gray-800 mb-2 
                   group-hover:text-blue-600 transition line-clamp-2">
            <?= htmlspecialchars($row['judul']) ?>
        </h3>

        <!-- ISI -->
        <p class="text-gray-500 text-sm leading-relaxed mb-4 line-clamp-3">
            <?= substr(strip_tags($row['isi_berita']), 0, 120) ?>...
        </p>

        <!-- AUTHOR -->
        <div class="flex items-center justify-between mb-5">

            <span class="text-xs bg-gray-100 text-gray-700 px-3 py-1 rounded-full flex items-center gap-1">
                <i class='bx bx-user'></i>
                <?= htmlspecialchars($row['fullname']) ?>
            </span>

        </div>

        <!-- ACTION -->
        <div class="flex gap-2 mt-auto">

            <a href="?page=berita-edit&id=<?= $row['id'] ?>"
               class="flex-1 flex items-center justify-center gap-1
                      bg-yellow-400 hover:bg-yellow-500 
                      text-white py-2 rounded-xl text-sm font-medium transition">
               <i class='bx bx-edit'></i> Edit
            </a>

            <form action="?page=berita-hapus"
                  method="POST"
                  class="flex-1"
                  onsubmit="return confirm('Yakin hapus berita?')">

                <input type="hidden" name="id" value="<?= $row['id'] ?>">

                <button type="submit"
                        class="w-full flex items-center justify-center gap-1
                               bg-red-500 hover:bg-red-600 
                               text-white py-2 rounded-xl text-sm font-medium transition">
                    <i class='bx bx-trash'></i> Hapus
                </button>
            </form>

        </div>

    </div>
</div>

<?php endwhile; ?>

</div>


<!-- SEARCH SCRIPT -->
<script>
document.getElementById("searchInput").addEventListener("keyup", function() {
    let value = this.value.toLowerCase();
    let cards = document.querySelectorAll(".berita-card");

    cards.forEach(card => {
        let judul = card.querySelector(".judul").textContent.toLowerCase();

        if (judul.includes(value)) {
            card.style.display = "flex";
        } else {
            card.style.display = "none";
        }
    });
});
</script>