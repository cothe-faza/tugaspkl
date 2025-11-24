<?php
class Siswa {
    private $conn;  = "db_datasiswa";
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