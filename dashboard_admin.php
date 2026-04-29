```php
<?php
ob_start();
session_start();
require 'config/koneksi.php';
require 'routes/web.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

/* PROTEKSI ADMIN */
if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit;
}

/* Statistik */
$total_user      = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as total FROM user"))['total'];
$total_alumni    = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as total FROM alumni"))['total'];
$total_berita    = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as total FROM berita"))['total'];
$total_pekerjaan = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as total FROM pekerjaan"))['total'];

$page = $_GET['page'] ?? 'home';
$page_file = $pages[$page] ?? $pages['home'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard Admin</title>
<link rel="icon" type="image/png" href="img/favicon.ico">

<!-- Font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<!-- Tailwind -->
<script src="https://cdn.tailwindcss.com"></script>

<script>
tailwind.config = {
theme: {
extend: {
fontFamily: {
poppins: ['Poppins', 'sans-serif'],
},
boxShadow: {
soft: '0 10px 30px rgba(0,0,0,0.08)',
glass: '0 8px 32px rgba(31,38,135,0.15)',
},
colors: {
primary: '#2563eb',
darkblue: '#0f172a'
}
}
}
}
</script>

<style>
body{
background: linear-gradient(to right,#f8fafc,#eef2ff,#f8fafc);
}

::-webkit-scrollbar{
width:8px;
}

::-webkit-scrollbar-thumb{
background:#94a3b8;
border-radius:20px;
}

.card-hover{
transition:0.3s;
}

.card-hover:hover{
transform:translateY(-4px);
box-shadow:0 15px 35px rgba(0,0,0,.08);
}
</style>

</head>

<body class="font-poppins text-slate-800">

<div class="min-h-screen flex">

    <!-- SIDEBAR -->
    <aside class="fixed left-0 top-0 w-64 h-screen bg-gradient-to-b from-slate-900 via-blue-900 to-slate-950 text-white shadow-2xl z-50">
        <?php include "components/sidebar.php"; ?>
    </aside>

    <!-- CONTENT -->
    <div class="ml-64 flex-1 min-h-screen">

        <!-- NAVBAR -->
        <header class="fixed top-0 left-64 right-0 z-40 px-8 py-4">
            <div class="backdrop-blur-xl bg-white/70 border border-white/30 rounded-2xl shadow-soft">
                <?php include "components/navbar.php"; ?>
            </div>
        </header>

        <!-- MAIN -->
        <main class="pt-28 px-8 pb-8">

            <!-- WELCOME -->
            <div class="mb-8 rounded-3xl p-8 bg-gradient-to-r from-blue-700 via-indigo-700 to-slate-800 text-white shadow-soft">
                <h1 class="text-3xl font-bold mb-2">Dashboard Admin</h1>
                <p class="text-blue-100">Kelola sistem alumni sekolah dengan tampilan modern & profesional.</p>
            </div>

            <!-- STATISTIK -->
            <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">

                <div class="bg-white rounded-2xl p-6 shadow-soft card-hover border border-slate-100">
                    <p class="text-sm text-slate-500">Total User</p>
                    <h2 class="text-3xl font-bold mt-2"><?= $total_user ?></h2>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-soft card-hover border border-slate-100">
                    <p class="text-sm text-slate-500">Total Alumni</p>
                    <h2 class="text-3xl font-bold mt-2"><?= $total_alumni ?></h2>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-soft card-hover border border-slate-100">
                    <p class="text-sm text-slate-500">Total Berita</p>
                    <h2 class="text-3xl font-bold mt-2"><?= $total_berita ?></h2>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-soft card-hover border border-slate-100">
                    <p class="text-sm text-slate-500">Data Pekerjaan</p>
                    <h2 class="text-3xl font-bold mt-2"><?= $total_pekerjaan ?></h2>
                </div>

            </div>

            <!-- HALAMAN DINAMIS -->
            <div class="bg-white rounded-3xl shadow-soft border border-slate-100 p-6 min-h-[500px]">
                <?php require $page_file; ?>
            </div>

        </main>

    </div>

</div>

</body>
</html>

<?php ob_end_flush(); ?>
```
