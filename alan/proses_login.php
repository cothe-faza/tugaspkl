<?php
session_start();
include "koneksi.php";
$username = $_POST['username'];
 $password = $_POST['password'];

if ($conn->connect_error) {
    $_SESSION['error'] = "Koneksi database gagal: " . $conn->connect_error;
    header("Location: user.php");
    exit;
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $uname = $_POST['username'];
    $password = $_POST['password'];
} else {
    $_SESSION['error'] = "Mohon masukkan username dan password.";
    header("Location: user.php");
    exit;
}

$stmt = $conn->prepare("SELECT * FROM user WHERE username = ? LIMIT 1");

$stmt->bind_param("s", $uname);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();

    if (password_verify($password, $data['password'])) {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $data['username'];
        header("Location: dashboard.php");
        exit;
    } else {
        $_SESSION['error'] = "Password salah!";
        header("Location: user.php");
        exit;
    }
} else {
    $_SESSION['error'] = "Username tidak ditemukan!";
    header("Location: user.php");
    exit;
}
?>