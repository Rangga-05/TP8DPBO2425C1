<?php
require_once "models/connection.php";

//Kelas untuk menangani interaksi data untuk tabel department
class Department {
    private $conn;

    //Konstruktor untuk membuat koneksi database
    public function __construct() {
        $db = new Database();
        $this->conn = $db->conn;
    }

    //Ambil semua data departemen (read)
    public function getAll() {
        $sql = "SELECT * FROM department";
        return $this->conn->query($sql);
    }

    //Ambil semua data departemen berdasarkan id (read one)
    public function getById($id) {
        return $this->conn->query("SELECT * FROM department WHERE id = $id")->fetch_assoc();
    }

    //Buat data departemen baru
    public function create($data) {
        $name = $data['name'];
        $building = $data['building'];

        $sql = "INSERT INTO department (name, building) VALUES ('$name', '$building')";
        return $this->conn->query($sql);
    }

    //Perbarui data departemen
    public function update($id, $data) {
        $name = $data['name'];
        $building = $data['building'];

        $sql = "UPDATE department SET name = '$name', building = '$building' WHERE id = $id";
        return $this->conn->query($sql);
    }

    //Hapus data departemen
    public function delete($id) {
        $sql = "DELETE FROM department WHERE id = $id";
        try {
            return $this->conn->query($sql);
        } catch (mysqli_sql_exception $e) {
            return false;
        }
    }
}