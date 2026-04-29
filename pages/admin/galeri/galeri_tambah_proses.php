<?php

include 'config/koneksi.php';

if(isset($_POST['upload'])){

$judul = $_POST['judul'];

$namaFile = $_FILES['file']['name'];
$tmp = $_FILES['file']['tmp_name'];

move_uploaded_file(
$tmp,
'uploads/'.$namaFile
);

mysqli_query($conn,"
INSERT INTO galeri
(judul,file,tipe)
VALUES
('$judul','$namaFile','foto')
");

header("Location: dashboard_admin.php?page=galeri");
exit;

}

?>