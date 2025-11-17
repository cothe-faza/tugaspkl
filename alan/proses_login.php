
<?php

session_start();
  include "koneksi.php";
 $uname = $_POST('username');
 $password = $_POST('password');
$stmt = $conn->prepare("SELECT * FROM user WHERE username = ? LIMIT 1");
$stmt->bind_param("ss", $uname, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();

    // Verifikasi password
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
