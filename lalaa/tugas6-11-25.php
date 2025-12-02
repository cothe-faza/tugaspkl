<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "db_login";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
 die("Koneksi gagal: " . $conn->connect_error);
}
?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Halaman Login</title>
<style>
    body { font-family: Arial; background: #f4f4f4; }
    .login-box {
        width: 300px; margin: 100px auto; background: white;
        padding: 20px; border-radius: 10px; box-shadow: 0 0 10px #ccc;
    }
    input { width: 100%; padding: 10px; margin: 5px 0; }
    button { width: 100%; padding: 10px; background: #007bff; color: white; border: none; cursor: pointer; }
    button:hover { background: #0056b3; }
    .error { color: red; text-align: center; }
</style>
</head>
<body>
<div class="login-box">
<h3>Login</h3>
<?php if (isset($_SESSION['error'])) { echo "<p class='error'>" . $_SESSION['error'] . "</p>"; unset($_SESSION['error']); } ?>
<form action="proses_login.php" method="POST">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
</form>
</div>
</body>
</html>
<?php
session_start();
include "koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM user WHERE username = ? LIMIT 1");
$stmt->bind_param("s", $username);
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
