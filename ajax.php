<?php
session_start();
header('Content-Type: application/json');

$conn = new mysqli("localhost","root","","db_alumni_sekolah");
$conn->set_charset("utf8mb4");

if(!isset($_SESSION['user_id'])){
    echo json_encode(['success'=>false,'message'=>'Tidak terautentikasi']);
    exit;
}

$user_id = $_SESSION['user_id'];
$alumni_row = $conn->query("SELECT id FROM alumni WHERE user_id='$user_id'")->fetch_assoc();
$my_alumni_id = $alumni_row['id'] ?? 0;

$action = $_POST['action'] ?? $_GET['action'] ?? '';

function esc($conn,$v){ return $conn->real_escape_string(trim($v)); }
function ok($extra=[]){ echo json_encode(array_merge(['success'=>true],$extra)); exit; }
function err($m){ echo json_encode(['success'=>false,'message'=>$m]); exit; }

switch($action){

  // ─── PROFIL ───────────────────────────────────────
  case 'update_profil':
    $alumni_id  = intval($_POST['alumni_id']);
    if($alumni_id !== $my_alumni_id) err('Tidak diizinkan');
    $fullname   = esc($conn,$_POST['fullname']??'');
    $alamat     = esc($conn,$_POST['alamat']??'');
    $no_telepon = esc($conn,$_POST['no_telepon']??'');
    $conn->query("UPDATE alumni SET alamat='$alamat', no_telepon='$no_telepon' WHERE id=$alumni_id");
    $conn->query("UPDATE user SET fullname='$fullname' WHERE id=$user_id");
    ok();

  // ─── PEKERJAAN ────────────────────────────────────
  case 'add_pekerjaan':
    $alumni_id   = intval($_POST['alumni_id']);
    if($alumni_id !== $my_alumni_id) err('Tidak diizinkan');
    $perusahaan  = esc($conn,$_POST['nama_perusahaan']??'');
    $jabatan     = esc($conn,$_POST['jabatan']??'');
    $tahun_mulai = intval($_POST['tahun_mulai']);
    if(!$perusahaan||!$jabatan) err('Field wajib diisi');
    $conn->query("INSERT INTO pekerjaan (alumni_id,nama_perusahaan,jabatan,tahun_mulai) VALUES ($alumni_id,'$perusahaan','$jabatan',$tahun_mulai)");
    ok(['id'=>$conn->insert_id]);

  case 'update_pekerjaan':
    $id         = intval($_POST['id']);
    $alumni_id  = intval($_POST['alumni_id']);
    if($alumni_id !== $my_alumni_id) err('Tidak diizinkan');
    $perusahaan = esc($conn,$_POST['nama_perusahaan']??'');
    $jabatan    = esc($conn,$_POST['jabatan']??'');
    $tahun      = intval($_POST['tahun_mulai']);
    $conn->query("UPDATE pekerjaan SET nama_perusahaan='$perusahaan',jabatan='$jabatan',tahun_mulai=$tahun WHERE id=$id AND alumni_id=$alumni_id");
    ok();

  case 'delete_pekerjaan':
    $id = intval($_GET['id']);
    $conn->query("DELETE FROM pekerjaan WHERE id=$id AND alumni_id=$my_alumni_id");
    ok();

  // ─── PENDIDIKAN ───────────────────────────────────
  case 'add_pendidikan':
    $alumni_id  = intval($_POST['alumni_id']);
    if($alumni_id !== $my_alumni_id) err('Tidak diizinkan');
    $institusi  = esc($conn,$_POST['nama_institusi']??'');
    $jenjang    = esc($conn,$_POST['jenjang']??'S1');
    $masuk      = intval($_POST['tahun_masuk']);
    $lulus      = intval($_POST['tahun_lulus']);
    if(!$institusi) err('Nama institusi wajib diisi');
    $conn->query("INSERT INTO pendidikan (alumni_id,nama_institusi,jenjang,tahun_masuk,tahun_lulus) VALUES ($alumni_id,'$institusi','$jenjang',$masuk,$lulus)");
    ok(['id'=>$conn->insert_id]);

  case 'update_pendidikan':
    $id        = intval($_POST['id']);
    $alumni_id = intval($_POST['alumni_id']);
    if($alumni_id !== $my_alumni_id) err('Tidak diizinkan');
    $institusi = esc($conn,$_POST['nama_institusi']??'');
    $jenjang   = esc($conn,$_POST['jenjang']??'S1');
    $masuk     = intval($_POST['tahun_masuk']);
    $lulus     = intval($_POST['tahun_lulus']);
    $conn->query("UPDATE pendidikan SET nama_institusi='$institusi',jenjang='$jenjang',tahun_masuk=$masuk,tahun_lulus=$lulus WHERE id=$id AND alumni_id=$alumni_id");
    ok();

  case 'delete_pendidikan':
    $id = intval($_GET['id']);
    $conn->query("DELETE FROM pendidikan WHERE id=$id AND alumni_id=$my_alumni_id");
    ok();

  // ─── TEMAN ANGKATAN ───────────────────────────────
  case 'get_teman':
    $angkatan_id = intval($_GET['angkatan_id']);
    $res = $conn->query("
        SELECT a.id, u.fullname, u.foto, j.nama_jurusan
        FROM alumni a
        JOIN user u ON a.user_id = u.id
        LEFT JOIN jurusan j ON a.jurusan_id = j.id
        WHERE a.angkatan_id = $angkatan_id AND a.id != $my_alumni_id
    ");
    $data = [];
    while($r = $res->fetch_assoc()) $data[] = $r;
    echo json_encode($data);
    exit;

  default:
    err('Action tidak dikenali');
}
$conn->close();
?>