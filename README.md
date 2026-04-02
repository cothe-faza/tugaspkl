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
1. Buat koneksi ke database MySQL bernama `db_datasiswa` dengan user `root` tanpa password menggunakan class `new mysqli` dan buat tabel baru dengan nama `tb_users` kolom `id_user`,`username`,`password`.
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
  ```php
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
# TUGAS 19/11/2025
1. Membuat Aplikasi Input & Tampil Data Buku
   Buatlah sebuah aplikasi sederhana menggunakan PHP Native dan MySQL dengan fitur:
   1. Form Input Data Buku
      Form harus memiliki field:
      judul_buku
      penulis
      tahun_terbit
      kategori 
  2. Buat database db_perpustakaan dengan tabel buku :
| Field        | Type                               |
| ------------ | ---------------------------------- |
| id           | INT(11) AUTO_INCREMENT PRIMARY KEY |
| judul_buku   | VARCHAR(150)                       |
| penulis      | VARCHAR(100)                       |
| tahun_terbit | INT(4)                             |
| kategori     | VARCHAR(50)                        |

3. Tampilkan Semua Data Buku
Menampilkan dalam bentuk tabel HTML.
Syarat:
    Gunakan file koneksi.php untuk menghubungkan database.
    Input tidak boleh kosong, dan tahun_terbit harus angka.
    Setelah data berhasil ditambahkan, tampilkan pesan:
    "Data buku berhasil disimpan."
# TUGAS 20/11/2025
## MATERI
1. Pengertian OOP
Object-Oriented Programming (OOP) adalah paradigma pemrograman yang memodelkan program sebagai sekumpulan objek yang saling berinteraksi. Objek tersebut memiliki data (properties) dan perilaku (methods).
Tujuan OOP:
- Mempermudah pengelolaan kode.
- Mengurangi duplikasi.
- Membuat program lebih mudah dikembangkan (scalable).
- Meningkatkan keamanan kode melalui enkapsulasi.
2. Konsep Dasar OOP (4 Pilar Utama)
  a. Encapsulation (Enkapsulasi)
     Menyembunyikan data agar tidak bisa diakses langsung dari luar kelas.
     Biasanya menggunakan akses modifier:
     - public
     - private
     - protected
    Contoh :
```php
class User {
    private $password;
    public function setPassword($pass) {
        $this->password = password_hash($pass, PASSWORD_BCRYPT);
    }
    public function getPasswordHash() {
        return $this->password;
    }
}
```
2. Inheritance (Pewarisan)
   Mewarisi properti dan method dari kelas induk (parent class).
   Contoh:
   ```php
   class Controller {
    public function view() {
        echo "Render halaman";
    }
   }
   class HomeController extends Controller {
   }
   ```
   HomeController otomatis punya method view().
3. Polymorphism (Polimorfisme)
   Satu method bisa memiliki bentuk berbeda pada class turunan.
   Contoh:
   ```php
   class Animal {
    public function sound() {
        return "Unknown sound";
    }
   }
   class Cat extends Animal {
    public function sound() {
        return "Meow";
    }
   }
   ```
4. Abstraction (Abstraksi)
   Menyembunyikan detail dan hanya menampilkan fitur penting. Menggunakan abstract class atau interface.
  ```php
abstract class Shape {
    abstract public function area();
}
  ```
5. Struktur Dasar Class dan Object
 a. Membuat Class
```php
class Produk {
    public $nama;
    public $harga;
    public function info() {
        return "{$this->nama} - Rp {$this->harga}";
    }
}
```
 b. Membuat Object
```php
$produk1 = new Produk();
$produk1->nama = "Laptop";
$produk1->harga = 10000000;
echo $produk1->info();
```
6. Constructor
Method khusus yang otomatis dijalankan saat object dibuat.
```php
class Produk {
    public $nama;
    public $harga;
    public function __construct($nama, $harga) {
        $this->nama  = $nama;
        $this->harga = $harga;
    }
}
$p = new Produk("Mouse", 120000);
```
7. Akses Modifier
```table
| Modifier      | Keterangan                                         |
| ------------- | -------------------------------------------------- |
| **public**    | Bisa diakses dari mana saja                        |
| **private**   | Hanya bisa diakses di dalam class itu sendiri      |
| **protected** | Bisa diakses oleh class itu sendiri dan turunannya |
```
Contoh :
```php
class User {
    public $username;
    private $password;
}
```
## CRUD PHP + MySQL menggunakan OOP + PDO
## TUGAS PRAKTIK
1. Buat stuktur folder dibawah didalam folder masing-masing
```pgsql
oop-pdo-crud-siswa/
│── config/
│     └── Database.php
│── classes/
│     └── Siswa.php
│── views/
│     ├── index.php
│     ├── tambah.php
│     ├── edit.php
│── proses/
│     ├── tambah_proses.php
│     ├── edit_proses.php
│     ├── hapus_proses.php
│── db_siswa.sql
│── README.md
```
2. File: config/Database.php
```php
<?php
class Database {
    private $host = "localhost";
    private $db   = "db_siswa";
    private $user = "root";
    private $pass = "";
    public  $conn;
    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db, 
                $this->user, 
                $this->pass
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Koneksi gagal: " . $e->getMessage();
        }
        return $this->conn;
    }
}
```
2. File: classes/Siswa.php
```php
<?php
class Siswa {
    private $conn;
    private $table = "tb_siswa";

    public $id;
    public $nama;
    public $kelas;
    public $jurusan;
    public $no_hp;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table;
        $stmt  = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $query = "INSERT INTO $this->table 
            SET nama=:nama, kelas=:kelas, jurusan=:jurusan, no_hp=:no_hp";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nama", $this->nama);
        $stmt->bindParam(":kelas", $this->kelas);
        $stmt->bindParam(":jurusan", $this->jurusan);
        $stmt->bindParam(":no_hp", $this->no_hp);

        return $stmt->execute();
    }

    public function readOne() {
        $query = "SELECT * FROM $this->table WHERE id = ? LIMIT 1";
        $stmt  = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->nama    = $row['nama'];
        $this->kelas   = $row['kelas'];
        $this->jurusan = $row['jurusan'];
        $this->no_hp   = $row['no_hp'];
    }

    public function update() {
        $query = "UPDATE $this->table 
            SET nama=:nama, kelas=:kelas, jurusan=:jurusan, no_hp=:no_hp
            WHERE id=:id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nama", $this->nama);
        $stmt->bindParam(":kelas", $this->kelas);
        $stmt->bindParam(":jurusan", $this->jurusan);
        $stmt->bindParam(":no_hp", $this->no_hp);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }

    public function delete() {
        $query = "DELETE FROM $this->table WHERE id=:id";
        $stmt  = $this->conn->prepare($query);

        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }
}
```
3. File: views/index.php
```php
<?php
include '../config/Database.php';
include '../classes/Siswa.php';

$db       = new Database();
$conn     = $db->connect();
$siswaObj = new Siswa($conn);

$data = $siswaObj->read();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa</title>
</head>
<body>

<h2>Data Siswa (OOP + PDO)</h2>

<a href="tambah.php">+ Tambah Data</a>
<br><br>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th>No HP</th>
        <th>Aksi</th>
    </tr>

    <?php while ($row = $data->fetch(PDO::FETCH_ASSOC)) { ?>
    <tr>
        <td><?= $row['id']; ?></td>
        <td><?= $row['nama']; ?></td>
        <td><?= $row['kelas']; ?></td>
        <td><?= $row['jurusan']; ?></td>
        <td><?= $row['no_hp']; ?></td>
        <td>
            <a href="edit.php?id=<?= $row['id']; ?>">Edit</a> | 
            <a href="../proses/hapus_proses.php?id=<?= $row['id']; ?>"
               onclick="return confirm('Hapus data?')">Hapus</a>
        </td>
    </tr>
    <?php } ?>

</table>

</body>
</html>
```
4. File: views/tambah.php
```php
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
```
5. File: views/edit.php
```php
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
```
6. File: proses/tambah_proses.php
```php
<?php
include '../config/Database.php';
include '../classes/Siswa.php';

$db       = new Database();
$conn     = $db->connect();
$siswaObj = new Siswa($conn);

$siswaObj->nama    = $_POST['nama'];
$siswaObj->kelas   = $_POST['kelas'];
$siswaObj->jurusan = $_POST['jurusan'];
$siswaObj->no_hp   = $_POST['no_hp'];

$siswaObj->create();

header("Location: ../views/index.php");
?>
```
7. File: proses/edit_proses.php
```php
<?php
include '../config/Database.php';
include '../classes/Siswa.php';

$db       = new Database();
$conn     = $db->connect();
$siswaObj = new Siswa($conn);

$siswaObj->id      = $_POST['id'];
$siswaObj->nama    = $_POST['nama'];
$siswaObj->kelas   = $_POST['kelas'];
$siswaObj->jurusan = $_POST['jurusan'];
$siswaObj->no_hp   = $_POST['no_hp'];

$siswaObj->update();

header("Location: ../views/index.php");
?>
```
8. File: proses/hapus_proses.php
```php
<?php
include '../config/Database.php';
include '../classes/Siswa.php';

$db       = new Database();
$conn     = $db->connect();
$siswaObj = new Siswa($conn);

$siswaObj->id = $_GET['id'];
$siswaObj->delete();

header("Location: ../views/index.php");
?>
```
9. Schema SQL dengan nama database db_siswa
```sql
CREATE DATABASE db_siswa;
USE db_siswa;

CREATE TABLE tb_siswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    kelas VARCHAR(20),
    jurusan VARCHAR(50),
    no_hp VARCHAR(20)
);
```
