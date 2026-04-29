<?php
include '../../../koneksi.php';

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM pendidikan WHERE id='$id'");

header("Location: ../../../dashboard_alumni.php?page=pendidikan");