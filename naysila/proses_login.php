<?php
session_start();
include "koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $conn->query("SELECT * FROM tb_users WHERE username = '$username' LIMIT 1");
$row = $stmt->num_rows;

if ($row > 0) {
  $data = $stmt->fetch_assoc();

  // Verifikasi password
  if (md5($password, $data['password'])) {
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