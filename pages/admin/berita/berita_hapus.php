<?php
require "config/koneksi.php";

$id = $_POST['id'] ?? 0;

$data = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT gambar FROM berita WHERE id='$id'"
));

if ($data) {

    $path = "uploads/berita/".$data['gambar'];

    if (file_exists($path)) {
        unlink($path);
    }

    mysqli_query($conn,
    "DELETE FROM berita WHERE id='$id'");
}

header("Location: dashboard_admin.php?page=berita");
exit;