<?php
include 'config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Galeri Alumni</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-blue-50">

<div class="max-w-6xl mx-auto py-10">

<div class="flex justify-between items-center mb-8">

<h1 class="text-4xl font-bold">
📸 Galeri Alumni
</h1>

<a href="dashboard_admin.php?page=tambah"
class="bg-blue-700 text-white px-6 py-3 rounded-lg shadow">
+ Tambah Foto
</a>

</div>

<div class="grid md:grid-cols-3 gap-8">

<?php

$data = mysqli_query(
$conn,
"SELECT * FROM galeri ORDER BY id DESC"
);

while($d=mysqli_fetch_array($data)){

?>

<div class="bg-white rounded-xl shadow overflow-hidden">

<img
src="/SISTEM_ALUMNI/uploads/<?php echo $d['file'];?>"
class="w-full h-64 object-cover">

<div class="p-5">

<h2 class="text-xl font-bold">
<?php echo $d['judul'];?>
</h2>

<p class="text-gray-500 mt-2 mb-4">
<?php echo $d['created_at'];?>
</p>

<a
href="dashboard_admin.php?page=galeri_hapus&id=<?php echo $d['id'];?>"
onclick="return confirm('Yakin ingin menghapus foto ini?')"
class="bg-red-600 text-white px-4 py-2 rounded">

Hapus

</a>

</div>

</div>

<?php } ?>

</div>

</div>

</body>
</html>