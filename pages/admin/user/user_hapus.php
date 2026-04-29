<?php
require "config/koneksi.php";

$id = $_POST['id'] ?? 0;

if (!$id) {
    die("ID tidak ditemukan");
}

mysqli_begin_transaction($conn);

try {

    /* Hapus dulu data alumni */
    mysqli_query($conn, "DELETE FROM alumni WHERE user_id='$id'");

    /* Hapus user */
    mysqli_query($conn, "DELETE FROM user WHERE id='$id'");

    mysqli_commit($conn);

    header("Location: dashboard_admin.php?page=user");
    exit;

} catch (Exception $e) {

    mysqli_rollback($conn);
    echo "Gagal hapus user";
}