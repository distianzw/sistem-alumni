<?php

include 'config/koneksi.php';

/* Validasi id */
if (!isset($_GET['id'])) {
    header("Location: dashboard_admin.php?page=galeri");
    exit;
}

$id = intval($_GET['id']);

/* Ambil nama file dari database */
$data = mysqli_query(
    $conn,
    "SELECT file FROM galeri WHERE id='$id'"
);

/* Kalau data tidak ditemukan */
if (!$data || mysqli_num_rows($data) == 0) {
    header("Location: dashboard_admin.php?page=galeri");
    exit;
}

$foto = mysqli_fetch_assoc($data);

/* Hapus file dari folder uploads */
$filePath = "uploads/" . $foto['file'];

if (!empty($foto['file']) && file_exists($filePath)) {
    unlink($filePath);
}

/* Hapus data dari database */
mysqli_query(
    $conn,
    "DELETE FROM galeri WHERE id='$id'"
);

/* Kembali ke galeri */
header("Location: dashboard_admin.php?page=galeri");
exit;

?>