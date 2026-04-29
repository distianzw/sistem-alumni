<?php
include '../../../koneksi.php';

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM pekerjaan WHERE id='$id'");

header("Location: ../../../dashboard_alumni.php?page=pekerjaan");