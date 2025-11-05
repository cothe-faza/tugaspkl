# Tugas PKL
A. Buat folder dengan nama masing-masing di dalam repository yang telah disediakan.
Di dalam folder tersebut, buat file dengan nama:
1. tugas-satu.php
2. tugas-dua.php, dan seterusnya sesuai urutan tugas.
3. Sebelum melakukan commit, buat terlebih dahulu file PHP dengan nama tugas-satu.php.
4. Di dalam file tersebut, tuliskan teks berikut pada text field:
    "tugas-satu-nama"

# Tugas Jam ke-5(15/10/2025) 
1. buat file tugas_ketiga.php
2. Buatkan kode PHP  untuk menampilkan kata : "Ikuti proses untuk menjadi orang sukses..."



 # Tugas Jam pertama (10/16/2025)
 
1. buat file tugas_keempat.php didalam folder masing-masing
2. buat kodingan untuk input data siswa
   kode php
```html
<form method="post">
    <label>NIS</label>
    <input type="text" name="nis">
    <label>Nama</label>
    <input type="text" name="nama">
    <label>Kelas</label>
    <input type="text" name="kelas">
    <button type="submit" name="btn">Submit</button>
</form>
```
3. jalankan programnya kemudian screenshoot hasilnya
5. upload hasil screenshoot ke github..
   
   =======================================
   # Tugas Jam Ke 3,4 dan 5
1. Buat database di phpmyadmin dengan nama `db_datasiswa`
2. Buat tabel tb_siswa
   ```sql
   CREATE tb_siswa(
   nis int(12) primary key,
   nama char(50),
   kelas char(50)
   )
   ```
3. buat file `koneksi.php` di folder masing-masing
4. ketikan kode sebagai berikut:
   ```php
   <?php
        $conn = new mysqli('localhost','root','rpl12345','db_datasiswa'); // untuk password sesuiakan dengan localserver masing-masing
   ?>
   ```
5. Buka file `tugas-keempat.php` kemudian di line 1 `enter` kemudian masukan ketikan kode berikut :
   ```php
   <?php
        include"koneksi.php";
   if(isset($_POST['btn'])){
       $a = $_POST['nis'];
       $b = $_POST['nama'];
       $c = $_POST['kelas']
        $qry = $conn->query("......");// silahkan kalian buat query di titik-titik..
   if($qry == true){
        echo"<script>alert('Data Berhasil diinput....')</script>";
   }else{
        echo"<script>alert('Data gagal diinput....')</script>";
       }      
   }
   ?>
   ```
6. untuk melihat hasilnya jalankan program kalian dilocal server masing-masing
   # TUGAS Rabu, 22/10/2025

    1. Ketikan kode berikut di file `tugas_keempat.php`
       ```php
       <table class="table">
       <thead>
       <tr>
       <th scope="col">No</th>
       <th scope="col">NIS</th>
       <th scope="col">Nama</th>
       <th scope="col">Kelas</th>
       </tr>
       </thead>
       <tbody>
       ...
       <tr>
       <th scope="row">1</th>
       <td><?=$data['nis']?></td>
       <td><?=$data['nama']?></td>
       <td><?=$data['kelas']?></td>
       </tr>
       ...
       </tbody>
       </table>
       ```
        # Intruksinya :
        > 1. Di bagian titik-titiknya ganti dengan perulangan untuk menampilkan data tabel siswa
        > 2. Gunakan `foreach` untuk perulangannya dan `$data` sebagai inisiasi `$result`
        
       # Tugas Kamis, 23 Oktober 2025
       Petunjuk Pengerjaan:
       1. Buat sebuah file baru dengan nama tugas_lima.php.
       2. Di dalam file tersebut, buat form input data barang yang memiliki isian sebagai berikut:
           `Kode Barang` , `Nama Barang`, `Harga Barang`, `Jumlah Barang`, `Kondisi Barang`
       4. Buat tabel database dengan nama tb_barang di dalam database db_datasiswa.
       5. Jumlah dan nama kolom harus sesuai dengan field yang ada pada form input.
       6. Tambahkan proses penyimpanan data barang ke dalam database menggunakan bahasa pemrograman PHP.
   ## Catatan:
    1. Gunakan metode POST untuk mengirim data dari form.
    2. Pastikan koneksi ke database berfungsi dengan benar.
    3. Tampilkan pesan berhasil atau gagal setelah proses input data dilakukan.

#Tugas PKL 6/11/2025
1. Buat koneksi ke database MySQL bernama `db_sekolah` dengan user `root` tanpa password menggunakan class `new mysqli`.
   ```php
   $servername = "localhost";
   $username   = "root";
   $password   = "";
   $database   = "db_login";
   $conn = new mysqli($servername, $username, $password, $database);
   if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
   }
   ```
2.  Buat form login
    ```html
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
    ```
3. Buat file `proses_login.php`
  ```html
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

  ```
4.  
