

<?php
include '../config/Database.php';
include '../classes/Siswa.php';

$db       = new Database();
$conn     = $db->connect();
$siswaObj = new Siswa($conn);

$siswaObj->id = $_GET['id'];
$siswaObj->readOne();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
</head>
<body>

<h2>Edit Data Siswa</h2>

<form method="POST" action="../proses/edit_proses.php">
    <input type="hidden" name="id" value="<?= $siswaObj->id; ?>">

    Nama: <input type="text" name="nama" value="<?= $siswaObj->nama; ?>" required><br><br>
    Kelas: <input type="text" name="kelas" value="<?= $siswaObj->kelas; ?>" required><br><br>
    Jurusan: <input type="text" name="jurusan" value="<?= $siswaObj->jurusan; ?>" required><br><br>
    No HP: <input type="text" name="no_hp" value="<?= $siswaObj->no_hp; ?>" required><br><br>

    <input type="submit" value="Update">
</form>

</body>
</html>
