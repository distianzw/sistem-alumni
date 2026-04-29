<?php
require "config/koneksi.php";

$id = $_POST['id'];
$judul = $_POST['judul'];
$isi = $_POST['isi_berita'];

$gambar = $_FILES['gambar']['name'];
$tmp = $_FILES['gambar']['tmp_name'];

if ($gambar) {

    $nama_file = time()."_".$gambar;
    move_uploaded_file($tmp, "uploads/berita/".$nama_file);

    mysqli_query($conn,
    "UPDATE berita SET
        judul='$judul',
        isi_berita='$isi',
        gambar='$nama_file'
     WHERE id='$id'");

} else {

    mysqli_query($conn,
    "UPDATE berita SET
        judul='$judul',
        isi_berita='$isi'
     WHERE id='$id'");

}

header("Location: dashboard_admin.php?page=berita");