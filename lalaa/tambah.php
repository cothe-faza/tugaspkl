<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data</title>
</head>
<body>

<h2>Tambah Data Siswa</h2>

<form method="POST" action="../proses/tambah_proses.php">
    Nama: <input type="text" name="nama" required><br><br>
    Kelas: <input type="text" name="kelas" required><br><br>
    Jurusan: <input type="text" name="jurusan" required><br><br>
    No HP: <input type="text" name="no_hp" required><br><br>

    <input type="submit" value="Simpan">
</form>

</body>
</html>