<?php

$tahun = mysqli_real_escape_string($conn, $_POST['tahun_angkatan']);

mysqli_query($conn,"INSERT INTO angkatan (tahun_angkatan)
VALUES ('$tahun')");

header("Location: ?page=angkatan");