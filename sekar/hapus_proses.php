
<?php
include '../config/Database.php';
include '../classes/Siswa.php';

$db       = new Database();
$conn     = $db->connect();
$siswaObj = new Siswa($conn);

$siswaObj->id = $_GET['id'];
$siswaObj->delete();

header("Location: ../views/index.php");
?>
