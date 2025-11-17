<?php
session_start();
include "koneksi.php";


if ($conn->connect_error) {
    $_SESSION['error'] = "Koneksi database gagal: " . $conn->connect_error;
    header("Location: login.php");
    exit;
}

// 2. Perbaikan sintaks array $_POST dan validasi dasar
if (isset($_POST['username']) && isset($_POST['password'])) {
    $uname = $_POST['username'];
    $password = $_POST['password'];
} else {
    $_SESSION['error'] = "Mohon masukkan username dan password.";
    header("Location: login.php");
    exit;
}

// Query menggunakan Prepared Statement (Sangat Baik!)
$stmt = $conn->prepare("SELECT * FROM user WHERE username = ? LIMIT 1");

// 3. Perbaikan bind_param: Hanya mengikat $uname (satu string)
$stmt->bind_param("s", $uname);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close(); // Tutup statement setelah selesai digunakan

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();

    // Verifikasi password (menggunakan password_verify sudah BENAR!)
    if (password_verify($password, $data['password'])) {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $data['username'];
        header("Location: dashboard.php");
        exit;
    } else {
        $_SESSION['error'] = "Password salah!";
        header("Location: login.php");
        exit;
    }
} else {
    $_SESSION['error'] = "Username tidak ditemukan!";
    header("Location: login.php");
    exit;
}
?>