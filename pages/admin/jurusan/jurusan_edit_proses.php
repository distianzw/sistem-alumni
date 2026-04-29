<?php

$id = $_POST['id'];
$nama = mysqli_real_escape_string($conn, $_POST['nama_jurusan']);

mysqli_query($conn,"UPDATE jurusan 
SET nama_jurusan='$nama'
WHERE id='$id'");

header("Location: ?page=jurusan");