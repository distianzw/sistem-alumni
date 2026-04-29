<?php

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM angkatan WHERE id='$id'");

header("Location: ?page=angkatan");