<?php
class User {
    private $password;
    public function setPassword($pass) {
        $this->password = password_hash($pass, PASSWORD_BCRYPT);
    }
    public function getPasswordHash() {
        return $this->password;
    }
}
class Controller {
 public function view() {
     echo "Render halaman";
 }
}
class HomeController extends Controller {
}
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
abstract class Shape {
  abstract public function area();
}
class Produk {
    public $nama;
    public $harga;
    public function info() {
        return "{$this->nama} - Rp {$this->harga}";
    }
}
$produk1 = new Produk();
$produk1->nama = "Laptop";
$produk1->harga = 10000000;
echo $produk1->info();
class Produk {
    public $nama;
    public $harga;
    public function __construct($nama, $harga) {
        $this->nama  = $nama;
        $this->harga = $harga;
    }
}
$p = new Produk("Mouse", 120000);
| Modifier      | Keterangan                                         |
| ------------- | -------------------------------------------------- |
| **public**    | Bisa diakses dari mana saja                        |
| **private**   | Hanya bisa diakses di dalam class itu sendiri      |
| **protected** | Bisa diakses oleh class itu sendiri dan turunannya |

class User {
    public $username;
    private $password;
}
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
?>
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
