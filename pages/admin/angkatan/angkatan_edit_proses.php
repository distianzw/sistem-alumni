<?php

$id = $_POST['id'];
$tahun = mysqli_real_escape_string($conn, $_POST['tahun_angkatan']);

mysqli_query($conn,"UPDATE angkatan 
SET tahun_angkatan='$tahun'
WHERE id='$id'");

header("Location: ?page=angkatan");