<?php
require 'config/koneksi.php';

$type = $_GET['type'] ?? '';

// header excel
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=export_$type.xls");

// 🔥 hanya tampilkan tabel sesuai type
if($type == 'pekerjaan'){

    $data = mysqli_query($conn, "
        SELECT jabatan, COUNT(*) as jumlah 
        FROM pekerjaan 
        GROUP BY jabatan
    ");

    echo "<table border='1'>";
    echo "<tr><th>Jabatan</th><th>Jumlah</th></tr>";

    while($row = mysqli_fetch_assoc($data)){
        echo "<tr>
                <td>{$row['jabatan']}</td>
                <td>{$row['jumlah']}</td>
              </tr>";
    }

    echo "</table>";
}

elseif($type == 'pendidikan'){

    $data = mysqli_query($conn, "
        SELECT jenjang, COUNT(*) as jumlah 
        FROM pendidikan 
        GROUP BY jenjang
    ");

    echo "<table border='1'>";
    echo "<tr><th>Jenjang</th><th>Jumlah</th></tr>";

    while($row = mysqli_fetch_assoc($data)){
        echo "<tr>
                <td>{$row['jenjang']}</td>
                <td>{$row['jumlah']}</td>
              </tr>";
    }

    echo "</table>";
}

elseif($type == 'angkatan'){

    $data = mysqli_query($conn, "
        SELECT ang.tahun_angkatan, COUNT(a.id) as jumlah
        FROM alumni a
        LEFT JOIN angkatan ang ON a.angkatan_id = ang.id
        GROUP BY ang.tahun_angkatan
    ");

    echo "<table border='1'>";
    echo "<tr><th>Angkatan</th><th>Jumlah</th></tr>";

    while($row = mysqli_fetch_assoc($data)){
        echo "<tr>
                <td>{$row['tahun_angkatan']}</td>
                <td>{$row['jumlah']}</td>
              </tr>";
    }

    echo "</table>";
}

elseif($type == 'user'){

    $data = mysqli_query($conn, "
        SELECT fullname, email FROM user
    ");

    echo "<table border='1'>";
    echo "<tr><th>Nama</th><th>Email</th></tr>";

    while($row = mysqli_fetch_assoc($data)){
        echo "<tr>
                <td>{$row['fullname']}</td>
                <td>{$row['email']}</td>
              </tr>";
    }

    echo "</table>";
}

elseif($type == 'berita'){

    $data = mysqli_query($conn, "
        SELECT judul, tanggal_post FROM berita
    ");

    echo "<table border='1'>";
    echo "<tr><th>Judul</th><th>Tanggal</th></tr>";

    while($row = mysqli_fetch_assoc($data)){
        echo "<tr>
                <td>{$row['judul']}</td>
                <td>{$row['tanggal_post']}</td>
              </tr>";
    }

    echo "</table>";
}

elseif($type == 'all'){

    // ================= PEKERJAAN =================
    $pekerjaan = mysqli_query($conn, "
        SELECT jabatan, COUNT(*) as jumlah 
        FROM pekerjaan 
        GROUP BY jabatan
    ");

    echo "<table border='1'>";
    echo "<tr><th colspan='2'>Statistik Pekerjaan</th></tr>";
    echo "<tr><th>Jabatan</th><th>Jumlah</th></tr>";

    while($row = mysqli_fetch_assoc($pekerjaan)){
        echo "<tr>
                <td>{$row['jabatan']}</td>
                <td>{$row['jumlah']}</td>
              </tr>";
    }

    echo "</table><br><br>";


    // ================= PENDIDIKAN =================
    $pendidikan = mysqli_query($conn, "
        SELECT jenjang, COUNT(*) as jumlah 
        FROM pendidikan 
        GROUP BY jenjang
    ");

    echo "<table border='1'>";
    echo "<tr><th colspan='2'>Statistik Pendidikan</th></tr>";
    echo "<tr><th>Jenjang</th><th>Jumlah</th></tr>";

    while($row = mysqli_fetch_assoc($pendidikan)){
        echo "<tr>
                <td>{$row['jenjang']}</td>
                <td>{$row['jumlah']}</td>
              </tr>";
    }

    echo "</table><br><br>";


    // ================= ANGKATAN =================
    $angkatan = mysqli_query($conn, "
        SELECT ang.tahun_angkatan, COUNT(a.id) as jumlah
        FROM alumni a
        LEFT JOIN angkatan ang ON a.angkatan_id = ang.id
        GROUP BY ang.tahun_angkatan
    ");

    echo "<table border='1'>";
    echo "<tr><th colspan='2'>Statistik Angkatan</th></tr>";
    echo "<tr><th>Angkatan</th><th>Jumlah</th></tr>";

    while($row = mysqli_fetch_assoc($angkatan)){
        echo "<tr>
                <td>{$row['tahun_angkatan']}</td>
                <td>{$row['jumlah']}</td>
              </tr>";
    }

    echo "</table><br><br>";


    // ================= USER =================
    $user = mysqli_query($conn, "
        SELECT fullname, email FROM user
    ");

    echo "<table border='1'>";
    echo "<tr><th colspan='2'>Data User</th></tr>";
    echo "<tr><th>Nama</th><th>Email</th></tr>";

    while($row = mysqli_fetch_assoc($user)){
        echo "<tr>
                <td>{$row['fullname']}</td>
                <td>{$row['email']}</td>
              </tr>";
    }

    echo "</table><br><br>";


    // ================= BERITA =================
    $berita = mysqli_query($conn, "
        SELECT judul, tanggal_post FROM berita
    ");

    echo "<table border='1'>";
    echo "<tr><th colspan='2'>Data Berita</th></tr>";
    echo "<tr><th>Judul</th><th>Tanggal</th></tr>";

    while($row = mysqli_fetch_assoc($berita)){
        echo "<tr>
                <td>{$row['judul']}</td>
                <td>{$row['tanggal_post']}</td>
              </tr>";
    }

    echo "</table>";
}