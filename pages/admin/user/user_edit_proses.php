<?php
require "config/koneksi.php";

$id       = $_POST['id'];
$fullname = $_POST['fullname'];
$email    = $_POST['email'];
$password = $_POST['password'];
$role     = $_POST['role'];

mysqli_begin_transaction($conn);

try {

    if (!empty($password)) {
        $hashed = password_hash($password, PASSWORD_DEFAULT);

        mysqli_query($conn, "
            UPDATE user 
            SET fullname='$fullname',
                email='$email',
                password='$hashed',
                role='$role'
            WHERE id='$id'
        ");
    } else {
        mysqli_query($conn, "
            UPDATE user 
            SET fullname='$fullname',
                email='$email',
                role='$role'
            WHERE id='$id'
        ");
    }

    /* Jika role berubah jadi alumni tapi belum ada data alumni */
    if ($role === 'alumni') {

        $cek = mysqli_query($conn, "SELECT id FROM alumni WHERE user_id='$id'");
        if (mysqli_num_rows($cek) == 0) {
            mysqli_query($conn, "
                INSERT INTO alumni (user_id)
                VALUES ('$id')
            ");
        }
    }

    /* Jika role berubah dari alumni jadi admin → hapus alumni */
    if ($role === 'admin') {
        mysqli_query($conn, "DELETE FROM alumni WHERE user_id='$id'");
    }

    mysqli_commit($conn);

    header("Location: dashboard_admin.php?page=user");
    exit;

} catch (Exception $e) {

    mysqli_rollback($conn);
    echo "Gagal update user";
}