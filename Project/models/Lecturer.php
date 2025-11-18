<?php
require_once "models/connection.php";

//Kelas yang bertugas untuk menangani semua interaksi data untuk tabel lecturers pada database
class Lecturer {
    private $conn;

    //Konstruktor untuk membuat koneksi database saat objek diinisialisasi
    public function __construct() {
        $db = new Database();
        $this->conn = $db->conn;
    }

    //Ambil semua data dosen dari tabel lecturers (read)
    public function getAll() {
        $sql = "SELECT * FROM lecturers";
        return $this->conn->query($sql);
    }

    //Ambil satu data dosen berdasarkan id (read one)
    public function getById($id) {
        $sql = "SELECT * FROM lecturers WHERE id = $id";
        return $this->conn->query($sql)->fetch_assoc();
    }

    //Buat data dosen baru
    public function create($data) {
        $name = $data['name'];
        $nidn = $data['nidn'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];

        $sql = "INSERT INTO lecturers (name, nidn, phone, join_date) VALUES ('$name', '$nidn', '$phone', '$join_date')";
        return $this->conn->query($sql);
    }

    //Perbarui data dosen berdasarkan id
    public function update($id, $data) {
        $name = $data['name'];
        $nidn = $data['nidn'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];

        $sql = "UPDATE lecturers SET name = '$name', nidn = '$nidn', phone = '$phone', join_date = '$join_date' WHERE id = $id";
        return $this->conn->query($sql);
    }

    //Hapus data dosen berdasarkan id
    public function delete($id) {
        $sql = "DELETE FROM lecturers WHERE id = $id";

        try {
            if ($this->conn->query($sql)) {
                return true;
            } 

            return false;
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1451) {
                return 1451;
            }
            return false;
        }
    }
}