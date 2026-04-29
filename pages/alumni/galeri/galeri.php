<?php
include 'config/koneksi.php';

/* AMBIL USER LOGIN */
$id_user = $_SESSION['user_id'] ?? 0;

/* JOIN USER + ALUMNI */
$q = mysqli_query($conn,"
    SELECT user.*, alumni.jenis_kelamin 
    FROM user
    LEFT JOIN alumni ON alumni.user_id = user.id
    WHERE user.id = '$id_user'
");

$user = mysqli_fetch_assoc($q);

/* AMBIL JK (ENUM: L / P) */
$jk = strtoupper($user['jenis_kelamin'] ?? 'L');

/* WARNA DINAMIS */
if($jk == 'P'){
    // PEREMPUAN (PINK)
    $bg1 = 'from-pink-500';
    $bg2 = 'via-rose-500';
    $bg3 = 'to-fuchsia-600';
    $btn = 'from-pink-500 to-rose-500';
    $judul = 'text-pink-600';
    $bgPage = 'from-pink-50 via-rose-50 to-white';
}else{
    // LAKI-LAKI (BIRU)
    $bg1 = 'from-blue-600';
    $bg2 = 'via-indigo-600';
    $bg3 = 'to-cyan-600';
    $btn = 'from-blue-600 to-indigo-600';
    $judul = 'text-blue-600';
    $bgPage = 'from-blue-50 via-slate-50 to-white';
}
?>

<!-- WRAPPER -->
<div class="min-h-screen bg-gradient-to-r <?= $bgPage ?> py-10">

<div class="max-w-7xl mx-auto px-4">

    <!-- HEADER -->
    <div class="mb-10 rounded-3xl p-8 text-white shadow-xl 
                bg-gradient-to-r <?= $bg1 ?> <?= $bg2 ?> <?= $bg3 ?>">

        <h1 class="text-5xl font-extrabold mb-3 flex items-center gap-3">
            📸 Galeri Alumni
        </h1>

        <p class="text-white/90 text-lg">
            Kenangan terbaik alumni sekolah.
        </p>
    </div>

    <!-- GRID -->
    <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8">

        <?php
        $data = mysqli_query($conn,"SELECT * FROM galeri ORDER BY id DESC");

        while($d = mysqli_fetch_array($data)){
        ?>

        <!-- CARD -->
        <div class="group bg-white rounded-3xl overflow-hidden shadow-lg 
                    hover:shadow-2xl transition duration-500 hover:-translate-y-2">

            <!-- IMAGE -->
            <div class="relative overflow-hidden cursor-pointer"
                 onclick="openModal('/SISTEM_ALUMNI/uploads/<?php echo $d['file'];?>','<?php echo htmlspecialchars($d['judul']); ?>')">

                <img
                src="/SISTEM_ALUMNI/uploads/<?php echo $d['file'];?>"
                class="w-full h-72 object-cover group-hover:scale-110 transition duration-700">

                <!-- OVERLAY -->
                <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                    <span class="bg-white/90 px-5 py-2 rounded-2xl font-semibold text-slate-800">
                        Lihat Foto
                    </span>
                </div>

            </div>

            <!-- CONTENT -->
            <div class="p-6">

                <h2 class="text-2xl font-bold <?= $judul ?> mb-3">
                    <?php echo $d['judul']; ?>
                </h2>

                <p class="text-slate-500 text-sm mb-5">
                    <?php echo date('d F Y H:i', strtotime($d['created_at'])); ?>
                </p>

                <button 
                onclick="openModal('/SISTEM_ALUMNI/uploads/<?php echo $d['file'];?>','<?php echo htmlspecialchars($d['judul']); ?>')"
                class="w-full py-3 rounded-2xl font-semibold text-white 
                       bg-gradient-to-r <?= $btn ?> hover:scale-105 transition">
                    Perbesar Foto
                </button>

            </div>

        </div>

        <?php } ?>

    </div>

</div>
</div>

<!-- MODAL -->
<div id="imgModal"
class="fixed inset-0 bg-black/80 hidden z-50 flex items-center justify-center p-5">

    <div class="relative max-w-6xl w-full">

        <button onclick="closeModal()"
        class="absolute -top-12 right-0 text-white text-4xl font-bold hover:scale-110 transition">
            ×
        </button>

        <img id="modalImage"
        class="w-full max-h-[85vh] object-contain rounded-3xl shadow-2xl">

        <h2 id="modalTitle"
        class="text-white text-center text-2xl font-bold mt-4"></h2>

    </div>

</div>

<script>
function openModal(img,title){
    document.getElementById('imgModal').classList.remove('hidden');
    document.getElementById('modalImage').src = img;
    document.getElementById('modalTitle').innerText = title;
}

function closeModal(){
    document.getElementById('imgModal').classList.add('hidden');
}

document.getElementById('imgModal').addEventListener('click', function(e){
    if(e.target.id === 'imgModal'){
        closeModal();
    }
});
</script>.