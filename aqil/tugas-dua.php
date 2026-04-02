<?php
include "koneksi.php";

if (isset($_POST['btn'])) {

    $a = $_POST['nis'];
    $b = $_POST['nama'];
    $c = $_POST['kelas'];

    // Query insert
    $qry = $conn->query("
        INSERT INTO tb_siswa (nis, nama, kelas)
        VALUES ('$a', '$b', '$c')
    ");

    if ($qry == true) {
        echo "<script>alert('Data Berhasil diinput....')</script>";
    } else {
        echo "<script>alert('Data gagal diinput....')</script>";
    }
}
?>
