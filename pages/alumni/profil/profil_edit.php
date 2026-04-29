<?php
$id = isset($_GET['id']) ? $_GET['id'] : 0;

$query = mysqli_query($conn, "
    SELECT a.*, u.fullname, u.foto 
    FROM alumni a
    JOIN user u ON a.user_id = u.id
    WHERE a.id='$id'
");

$jurusan = mysqli_query($conn, "SELECT * FROM jurusan");
$angkatan = mysqli_query($conn, "SELECT * FROM angkatan");

$data = mysqli_fetch_assoc($query);

/* WARNA DINAMIS */
$warna = ($data['jenis_kelamin'] == 'P') ? 'pink' : 'blue';

/* FOTO */
$foto = (!empty($data['foto']) && file_exists("uploads/alumni/".$data['foto']))
        ? $data['foto']
        : 'default.png';

/* UPDATE */
if(isset($_POST['update'])){

    if(empty($_POST['jk']) || empty($_POST['tahun']) || empty($_POST['jurusan']) || empty($_POST['angkatan'])){
        echo "<script>alert('Mohon isi semua data wajib!');</script>";
    } else {

        if(!empty($_FILES['foto']['name'])){

            // hapus lama
            if(!empty($data['foto']) && $data['foto'] != 'default.png'){
                $path = "uploads/alumni/".$data['foto'];
                if(file_exists($path)) unlink($path);
            }

            // upload baru
            $namaBaru = time().'_'.$_FILES['foto']['name'];
            move_uploaded_file($_FILES['foto']['tmp_name'], "uploads/alumni/".$namaBaru);

            mysqli_query($conn, "
                UPDATE user SET foto='$namaBaru'
                WHERE id='{$data['user_id']}'
            ");
        }

        mysqli_query($conn, "
        UPDATE alumni SET
        jenis_kelamin='$_POST[jk]',
        tahun_lulus='$_POST[tahun]',
        alamat='$_POST[alamat]',
        no_telepon='$_POST[hp]',
        jurusan_id='$_POST[jurusan]',
        angkatan_id='$_POST[angkatan]'
        WHERE id='$id'
        ");

        header("Location: dashboard_alumni.php?page=profil");
    }
}
?>

<div class="p-6 flex justify-center">

<form method="POST" enctype="multipart/form-data"
      class="bg-white p-8 rounded-2xl shadow-md w-full max-w-2xl space-y-6">

    <!-- HEADER -->
    <div class="flex items-center gap-2">
        <i class='bx bx-edit text-2xl text-<?= $warna ?>-500'></i>
        <h2 class="text-xl font-bold text-gray-800">
            Edit Profil
        </h2>
    </div>

    <!-- FOTO -->
    <div>
        <label class="text-sm text-gray-600">Foto Profil</label>

        <label class="flex flex-col items-center justify-center
                      w-full h-44 border-2 border-dashed rounded-2xl cursor-pointer
                      hover:bg-gray-50 transition mt-2
                      hover:border-<?= $warna ?>-400">

            <img id="preview"
                 src="uploads/alumni/<?= $foto ?>"
                 class="w-20 h-20 rounded-full object-cover mb-2 border">

            <span class="text-sm text-gray-500 flex items-center gap-2">
                <i class='bx bx-upload'></i>
                Klik / drag foto
            </span>

            <input type="file" name="foto" id="fotoInput" class="hidden">
        </label>
    </div>

    <!-- NAMA -->
    <div>
        <label class="text-sm text-gray-600">Nama Lengkap</label>
        <div class="flex items-center border rounded-xl px-3 mt-1 bg-gray-100">
            <i class='bx bx-user text-gray-400 mr-2'></i>
            <input type="text"
                   value="<?= $data['fullname'] ?>"
                   class="w-full py-2 outline-none bg-transparent"
                   readonly>
        </div>
    </div>

    <!-- JENIS KELAMIN -->
    <div>
        <label class="text-sm text-gray-600">Jenis Kelamin *</label>
        <select name="jk"
                class="w-full border rounded-xl p-2 mt-1
                       focus:ring-2 focus:ring-<?= $warna ?>-400">
            <option value="">-- Pilih --</option>
            <option value="L" <?= $data['jenis_kelamin']=='L'?'selected':'' ?>>Laki-laki</option>
            <option value="P" <?= $data['jenis_kelamin']=='P'?'selected':'' ?>>Perempuan</option>
        </select>
    </div>

    <!-- GRID -->
    <div class="grid md:grid-cols-2 gap-4">

        <div>
            <label class="text-sm text-gray-600">Tahun Lulus *</label>
            <div class="flex items-center border rounded-xl px-3 mt-1
                        focus-within:ring-2 focus-within:ring-<?= $warna ?>-400">
                <i class='bx bx-calendar text-gray-400 mr-2'></i>
                <input type="number" name="tahun"
                       value="<?= $data['tahun_lulus'] ?>"
                       class="w-full py-2 outline-none">
            </div>
        </div>

        <div>
            <label class="text-sm text-gray-600">No HP</label>
            <div class="flex items-center border rounded-xl px-3 mt-1
                        focus-within:ring-2 focus-within:ring-<?= $warna ?>-400">
                <i class='bx bx-phone text-gray-400 mr-2'></i>
                <input type="text" name="hp"
                       value="<?= $data['no_telepon'] ?>"
                       class="w-full py-2 outline-none">
            </div>
        </div>

    </div>

    <!-- JURUSAN -->
    <div>
        <label class="text-sm text-gray-600">Jurusan *</label>
        <select name="jurusan"
                class="w-full border rounded-xl p-2 mt-1
                       focus:ring-2 focus:ring-<?= $warna ?>-400">
            <option value="">-- Pilih Jurusan --</option>
            <?php while($j = mysqli_fetch_assoc($jurusan)): ?>
                <option value="<?= $j['id'] ?>" <?= $data['jurusan_id']==$j['id']?'selected':'' ?>>
                    <?= $j['nama_jurusan'] ?>
                </option>
            <?php endwhile; ?>
        </select>
    </div>

    <!-- ANGKATAN -->
    <div>
        <label class="text-sm text-gray-600">Angkatan *</label>
        <select name="angkatan"
                class="w-full border rounded-xl p-2 mt-1
                       focus:ring-2 focus:ring-<?= $warna ?>-400">
            <option value="">-- Pilih Angkatan --</option>
            <?php while($a = mysqli_fetch_assoc($angkatan)): ?>
                <option value="<?= $a['id'] ?>" <?= $data['angkatan_id']==$a['id']?'selected':'' ?>>
                    <?= $a['tahun_angkatan'] ?>
                </option>
            <?php endwhile; ?>
        </select>
    </div>

    <!-- ALAMAT -->
    <div>
        <label class="text-sm text-gray-600">Alamat</label>
        <textarea name="alamat"
                  class="w-full border rounded-xl p-2 mt-1
                         focus:ring-2 focus:ring-<?= $warna ?>-400"><?= $data['alamat'] ?></textarea>
    </div>

    <!-- BUTTON -->
    <div class="flex gap-3 pt-2">

        <button name="update"
                class="flex-1 flex items-center justify-center gap-2
                       bg-<?= $warna ?>-500 hover:bg-<?= $warna ?>-600
                       text-white py-2 rounded-xl shadow transition">

            <i class='bx bx-save'></i> Update
        </button>

        <a href="dashboard_alumni.php?page=profil"
           class="flex-1 flex items-center justify-center gap-2
                  bg-gray-400 hover:bg-gray-500
                  text-white py-2 rounded-xl transition">

           <i class='bx bx-arrow-back'></i> Batal
        </a>

    </div>

</form>

</div>

<script>
document.getElementById('fotoInput').onchange = function(evt){
    const [file] = this.files;
    if(file){
        document.getElementById('preview').src = URL.createObjectURL(file);
    }
}
</script>