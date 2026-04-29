<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Foto Alumni</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="max-w-xl mx-auto mt-20 bg-white p-8 rounded-xl shadow">

<h1 class="text-3xl font-bold mb-6">
Tambah Foto Alumni
</h1>

<form
action="dashboard_admin.php?page=galeri_tambah_proses"
method="POST"
enctype="multipart/form-data"
>

<input
type="text"
name="judul"
placeholder="Judul Foto"
class="w-full border p-3 rounded mb-4"
required>

<input
type="file"
name="file"
class="w-full border p-3 rounded mb-6"
required>

<button
type="submit"
name="upload"
class="bg-blue-700 text-white px-6 py-3 rounded hover:bg-blue-800">

Mengunggah

</button>

</form>

</div>

</body>
</html>