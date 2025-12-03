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
?>
