<?php
ob_start();
session_start();
require 'config/koneksi.php';
require 'routes/web_alumni.php';


if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

/* PROTEKSI ADMIN */
if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'alumni') {
    header("Location: index.php");
    exit;
}
$page = $_GET['page'] ?? 'home';
$page_file = $pages[$page] ?? $pages['home'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Alumni</title>

    <link rel="icon" type="image/png" href="img/favicon.ico">

    <!-- Google Font Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            poppins: ['Poppins', 'sans-serif'],
          }
        }
      }
    }
    </script>
</head>

<body class="font-poppins bg-gray-100">
    <div class="min-h-screen flex bg-gray-100">

    <?php include "components/sidebar_alumni.php" ?>

    <?php include "components/navbar_alumni.php" ?>

    <!-- MAIN CONTENT -->
    <main class="ml-64 flex-1 py-20 px-8">

        <?php require $page_file; ?>

    </main>

</div>
</body>
</html>
<?php ob_end_flush(); ?>