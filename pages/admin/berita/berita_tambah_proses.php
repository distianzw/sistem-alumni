<?php

require "config/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: dashboard_admin.php?page=berita");
    exit;
}

$judul = mysqli_real_escape_string($conn, $_POST['judul']);
$isi   = mysqli_real_escape_string($conn, $_POST['isi_berita']);
$user_id = $_SESSION['user_id']; // pastikan login simpan id

$tanggal = date('Y-m-d H:i:s');

/* Upload gambar */
$gambar = $_FILES['gambar']['name'];
$tmp    = $_FILES['gambar']['tmp_name'];

$folder = "uploads/berita/";
$nama_baru = time() . "_" . $gambar;

move_uploaded_file($tmp, $folder . $nama_baru);

/* Insert */
mysqli_query($conn, "
INSERT INTO berita (judul, isi_berita, gambar, tanggal_post, user_id)
VALUES ('$judul','$isi','$nama_baru','$tanggal','$user_id')
");

header("Location: dashboard_admin.php?page=berita");
exit;