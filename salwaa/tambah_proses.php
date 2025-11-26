<?php
include '../config/Database.php';
include '../classes/Siswa.php';

$db       = new Database();
$conn     = $db->connect();
$siswaObj = new Siswa($conn);

$siswaObj->nama    = $_POST['nama'];
$siswaObj->kelas   = $_POST['kelas'];
$siswaObj->jurusan = $_POST['jurusan'];
$siswaObj->no_hp   = $_POST['no_hp'];

$siswaObj->create();

header("Location: ../views/index.php");
?>