<?php
session_start();
require '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../index.php");
    exit;
}

$email    = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');

if (empty($email) || empty($password)) {
    header("Location: ../index.php?login_error=empty");
    exit;
}

/* 🔥 FIX: JOIN ALUMNI */
$stmt = $conn->prepare("
    SELECT u.id, u.fullname, u.email, u.password, u.role,
           a.jenis_kelamin
    FROM user u
    LEFT JOIN alumni a ON a.user_id = u.id
    WHERE u.email = ?
    LIMIT 1
");

$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {

    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {

        /* SET SESSION */
        $_SESSION['user_id']  = $user['id'];
        $_SESSION['fullname'] = $user['fullname'];
        $_SESSION['role']     = $user['role'];
        $_SESSION['login']    = true;

        /* 🔥 TAMBAH INI */
        $_SESSION['jenis_kelamin'] = $user['jenis_kelamin'] ?? 'Pria';

        /* REDIRECT */
        if ($user['role'] === 'admin') {
            header("Location: ../dashboard_admin.php");
        } else {
            header("Location: ../dashboard_alumni.php");
        }

        exit;

    } else {
        header("Location: ../index.php?login_error=password");
        exit;
    }

} else {
    header("Location: ../index.php?login_error=email");
    exit;
}

$stmt->close();
$conn->close();