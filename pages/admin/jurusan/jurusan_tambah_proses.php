<?php

$nama = mysqli_real_escape_string($conn, $_POST['nama_jurusan']);

mysqli_query($conn,"INSERT INTO jurusan (nama_jurusan)
VALUES ('$nama')");

header("Location: ?page=jurusan");