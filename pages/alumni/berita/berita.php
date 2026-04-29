<?php
// ambil berita
$berita = mysqli_query($conn, "
    SELECT * FROM berita ORDER BY tanggal_post DESC
");

// ambil gender user
$user_id = $_SESSION['user_id'];
$g = mysqli_query($conn, "SELECT jenis_kelamin FROM alumni WHERE user_id='$user_id'");
$gender = mysqli_fetch_assoc($g)['jenis_kelamin'] ?? 'L';

// warna dinamis
$hoverColor = ($gender == 'P') ? '#EC4899' : '#5478FF';

// ambil data alumni + gender
$alumni = mysqli_fetch_assoc(mysqli_query($conn, "
    SELECT id, jenis_kelamin 
    FROM alumni 
    WHERE user_id='$user_id'
"));

/* 🎨 WARNA DINAMIS */
$isCewe = ($alumni['jenis_kelamin'] == 'P');

$mainColor   = $isCewe ? 'from-pink-500 to-pink-400' : 'from-[#5478FF] to-indigo-500';
$btnColor    = $isCewe ? 'bg-pink-500 hover:bg-pink-600' : 'bg-[#5478FF] hover:bg-indigo-600';
$badgeColor  = $isCewe ? 'bg-pink-100 text-pink-600' : 'bg-blue-100 text-blue-600';
$iconColor   = $isCewe ? 'text-pink-500' : 'text-[#5478FF]';


?>

<div class="p-6">

    <h1 class="text-2xl font-bold mb-6 flex items-center gap-2"> <i class='bx bx-news <?= $iconColor ?>'></i>Berita Alumni</h1>

    <div class="grid md:grid-cols-3 gap-6">

        <?php $no = 0; while($row = mysqli_fetch_assoc($berita)): $no++; ?>

            <?php
            $gambar = (!empty($row['gambar']) && file_exists("uploads/berita/".$row['gambar']))
                      ? $row['gambar']
                      : 'default.png';
            ?>

            <!-- FEATURED -->
            <?php if($no == 1): ?>
                <div class="md:col-span-2 relative rounded-2xl overflow-hidden group shadow-lg"
                     style="--hover-color: <?= $hoverColor ?>;">

                    <img src="uploads/berita/<?= $gambar ?>" 
                         class="w-full h-72 object-cover group-hover:scale-105 transition duration-500">

                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>

                    <div class="absolute bottom-0 p-6 text-white">

                        <p class="text-xs mb-2 opacity-80">
                            <?= date('d M Y', strtotime($row['tanggal_post'])) ?>
                        </p>

                        <h2 class="text-2xl font-bold mb-2 group-hover:text-[var(--hover-color)] transition">
                            <?= $row['judul'] ?>
                        </h2>

                        <p class="text-sm opacity-90 mb-3 line-clamp-2">
                            <?= substr(strip_tags($row['isi_berita']), 0, 120) ?>...
                        </p>

                        <a href="dashboard_alumni.php?page=berita-detail&id=<?= $row['id'] ?>"
                           class="inline-flex items-center gap-2 text-sm font-medium bg-white text-black px-4 py-2 rounded-lg hover:gap-3 transition">
                            Baca Selengkapnya
                            <i class='bx bx-right-arrow-alt'></i>
                        </a>

                    </div>
                </div>

            <?php else: ?>

            <!-- CARD -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 group hover:bg-[var(--hover-color)]/5"
                 style="--hover-color: <?= $hoverColor ?>;">

                <!-- IMAGE -->
                <div class="relative overflow-hidden">
                    <img src="uploads/berita/<?= $gambar ?>" 
                         class="w-full h-44 object-cover group-hover:scale-105 transition duration-300">

                    <div class="absolute top-3 left-3 bg-white/90 px-3 py-1 text-xs rounded-lg shadow">
                        <?= date('d M Y', strtotime($row['tanggal_post'])) ?>
                    </div>
                </div>

                <!-- CONTENT -->
                <div class="p-5">

                    <h2 class="font-semibold text-lg text-gray-800 mb-2 line-clamp-2 transition group-hover:text-[var(--hover-color)]">
                        <?= $row['judul'] ?>
                    </h2>

                    <p class="text-sm text-gray-500 mb-4 line-clamp-3">
                        <?= substr(strip_tags($row['isi_berita']), 0, 100) ?>...
                    </p>

                    <a href="dashboard_alumni.php?page=berita-detail&id=<?= $row['id'] ?>"
                       class="inline-flex items-center gap-2 text-sm font-medium hover:gap-3 transition"
                       style="color: <?= $hoverColor ?>;">

                        Baca Selengkapnya
                        <i class='bx bx-right-arrow-alt text-lg'></i>
                    </a>

                </div>

            </div>

            <?php endif; ?>

        <?php endwhile; ?>

    </div>

</div>

<!-- LINE CLAMP -->
<style>
.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
.line-clamp-3 {
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>