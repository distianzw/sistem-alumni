<?php
require "config/koneksi.php";

$email    = mysqli_real_escape_string($conn, $_POST['email']);
$fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
$password = $_POST['password'];
$role     = mysqli_real_escape_string($conn, $_POST['role']);

if (empty($email) || empty($fullname) || empty($password) || empty($role)) {
    die("Data tidak lengkap");
}

/* Cek email */
$cek = mysqli_query($conn, "SELECT id FROM user WHERE email='$email'");
if (mysqli_num_rows($cek) > 0) {
    die("Email sudah digunakan");
}

/* Hash password */
$hashed = password_hash($password, PASSWORD_DEFAULT);

mysqli_begin_transaction($conn);

try {

    /* 1️⃣ Insert ke user */
    $sqlUser = "INSERT INTO user (email, fullname, password, role)
                VALUES ('$email', '$fullname', '$hashed', '$role')";
    mysqli_query($conn, $sqlUser);

    if (mysqli_affected_rows($conn) <= 0) {
        throw new Exception("Gagal insert user");
    }

    $user_id = mysqli_insert_id($conn);

    /* 2️⃣ Jika role alumni → insert kosong ke tabel alumni */
    if ($role === 'alumni') {

        $sqlAlumni = "INSERT INTO alumni 
                      (user_id, jenis_kelamin, tahun_lulus, alamat, no_telepon, angkatan_id, jurusan_id)
                      VALUES 
                      ('$user_id', NULL, NULL, NULL, NULL, NULL, NULL)";

        mysqli_query($conn, $sqlAlumni);

        if (mysqli_affected_rows($conn) <= 0) {
            throw new Exception("Gagal insert alumni");
        }
    }

    mysqli_commit($conn);

    header("Location: dashboard_admin.php?page=user");
    exit;

} catch (Exception $e) {

    mysqli_rollback($conn);
    echo "Error: " . $e->getMessage();
}