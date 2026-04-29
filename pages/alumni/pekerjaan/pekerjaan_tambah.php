<?php

$user_id = $_SESSION['user_id'];

// ambil data alumni + gender
$alumni = mysqli_fetch_assoc(mysqli_query($conn, "
    SELECT id, jenis_kelamin 
    FROM alumni 
    WHERE user_id='$user_id'
"));

/* 🎨 WARNA DINAMIS */
$isCewe = ($alumni['jenis_kelamin'] == 'P');

$mainBtn   = $isCewe ? 'bg-pink-500 hover:bg-pink-600' : 'bg-[#5478FF] hover:bg-indigo-600';
$focusRing = $isCewe ? 'focus:ring-pink-400' : 'focus:ring-[#5478FF]';
$iconColor = $isCewe ? 'text-pink-500' : 'text-[#5478FF]';

if(isset($_POST['simpan'])){

    mysqli_query($conn, "
        INSERT INTO pekerjaan (alumni_id, nama_perusahaan, jabatan, tahun_mulai)
        VALUES (
            '{$alumni['id']}',
            '$_POST[perusahaan]',
            '$_POST[jabatan]',
            '$_POST[tahun]'
        )
    ");

    header("Location: dashboard_alumni.php?page=pekerjaan");
}
?>

<div class="p-6 flex justify-center">

<form method="POST" 
      class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-lg space-y-5">

    <!-- TITLE -->
    <h2 class="text-xl font-bold text-gray-800 flex items-center gap-2">
        <i class='bx bx-briefcase <?= $iconColor ?> text-2xl'></i>
        Tambah Pekerjaan
    </h2>

    <!-- PERUSAHAAN -->
    <div>
        <label class="text-sm text-gray-600">Nama Perusahaan</label>
        <div class="flex items-center border rounded-xl mt-1 px-3">
            <i class='bx bx-buildings text-gray-400 text-lg'></i>
            <input type="text" name="perusahaan" required
                   placeholder="Contoh: Google / Telkom"
                   class="w-full p-3 outline-none <?= $focusRing ?>">
        </div>
    </div>

    <!-- JABATAN -->
    <div>
        <label class="text-sm text-gray-600">Jabatan</label>
        <div class="flex items-center border rounded-xl mt-1 px-3">
            <i class='bx bx-user text-gray-400 text-lg'></i>
            <input type="text" name="jabatan" required
                   placeholder="Contoh: Software Engineer"
                   class="w-full p-3 outline-none <?= $focusRing ?>">
        </div>
    </div>

    <!-- TAHUN -->
    <div>
        <label class="text-sm text-gray-600">Tahun Mulai</label>
        <div class="flex items-center border rounded-xl mt-1 px-3">
            <i class='bx bx-calendar text-gray-400 text-lg'></i>
            <input type="number" name="tahun" required
                   placeholder="Contoh: 2024"
                   class="w-full p-3 outline-none <?= $focusRing ?>">
        </div>
    </div>

    <!-- BUTTON -->
    <div class="flex gap-3 pt-3">

        <button name="simpan"
                class="flex-1 <?= $mainBtn ?> text-white py-3 rounded-xl 
                       shadow-md hover:shadow-lg transition font-medium">

            Simpan
        </button>

        <a href="dashboard_alumni.php?page=pekerjaan"
           class="flex-1 bg-gray-300 hover:bg-gray-400 text-white 
                  py-3 rounded-xl text-center transition">

            Batal
        </a>

    </div>

</form>

</div>