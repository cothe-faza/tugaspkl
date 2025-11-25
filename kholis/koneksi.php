<?php
$servername = "localhost";
$username   = "root";
$password   = "rpl12345";
$database   = "db_datasiswa";
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
 die("Koneksi gagal: " . $conn->connect_error);
}
?>