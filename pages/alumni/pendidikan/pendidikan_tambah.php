<?php

$user_id = $_SESSION['user_id'];

// ambil data alumni + gender
$alumni = mysqli_fetch_assoc(mysqli_query($conn, "
    SELECT id, jenis_kelamin FROM alumni WHERE user_id='$user_id'
"));

/* WARNA DINAMIS */
$warna = ($alumni['jenis_kelamin'] == 'P') ? 'pink' : 'blue';

if(isset($_POST['simpan'])){

    // VALIDASI SEDERHANA
    if(empty($_POST['institusi']) || empty($_POST['jenjang']) || empty($_POST['tahun'])){
        echo "<script>alert('Mohon isi semua data!');</script>";
    } else {

        mysqli_query($conn, "
            INSERT INTO pendidikan (alumni_id, nama_institusi, jenjang, tahun_lulus)
            VALUES (
                '{$alumni['id']}',
                '$_POST[institusi]',
                '$_POST[jenjang]',
                '$_POST[tahun]'
            )
        ");

        header("Location: dashboard_alumni.php?page=pendidikan");
    }
}
?>

<div class="p-6 flex justify-center">

<form method="POST" 
      class="bg-white p-8 rounded-2xl shadow-md w-full max-w-lg space-y-5">

    <!-- HEADER -->
    <div class="flex items-center gap-2 mb-2">
        <i class='bx bx-book text-2xl text-<?= $warna ?>-500'></i>
        <h2 class="text-xl font-bold text-gray-800">
            Tambah Pendidikan
        </h2>
    </div>

    <!-- INSTITUSI -->
    <div>
        <label class="text-sm text-gray-600">Nama Institusi</label>
        <div class="flex items-center border rounded-xl px-3 mt-1
                    focus-within:ring-2 focus-within:ring-<?= $warna ?>-400">

            <i class='bx bx-building text-gray-400 mr-2'></i>

            <input type="text" name="institusi"
                   placeholder="Contoh: Universitas Indonesia"
                   class="w-full py-2 outline-none">
        </div>
    </div>

    <!-- JENJANG -->
    <div>
        <label class="text-sm text-gray-600">Jenjang</label>
        <div class="flex items-center border rounded-xl px-3 mt-1
                    focus-within:ring-2 focus-within:ring-<?= $warna ?>-400">

            <i class='bx bx-layer text-gray-400 mr-2'></i>

            <input type="text" name="jenjang"
                   placeholder="Contoh: S1 / SMA"
                   class="w-full py-2 outline-none">
        </div>
    </div>

    <!-- TAHUN -->
    <div>
        <label class="text-sm text-gray-600">Tahun Lulus</label>
        <div class="flex items-center border rounded-xl px-3 mt-1
                    focus-within:ring-2 focus-within:ring-<?= $warna ?>-400">

            <i class='bx bx-calendar text-gray-400 mr-2'></i>

            <input type="number" name="tahun"
                   placeholder="Contoh: 2024"
                   class="w-full py-2 outline-none">
        </div>
    </div>

    <!-- BUTTON -->
    <div class="flex gap-3 pt-2">

        <button name="simpan"
                class="flex-1 bg-<?= $warna ?>-500 hover:bg-<?= $warna ?>-600
                       text-white py-2 rounded-xl shadow transition">

            <i class='bx bx-save'></i> Simpan
        </button>

        <a href="dashboard_alumni.php?page=pendidikan"
           class="flex-1 text-center bg-gray-400 hover:bg-gray-500
                  text-white py-2 rounded-xl transition">

           Batal
        </a>

    </div>

</form>

</div>