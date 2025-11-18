<?php
require_once "models/connection.php";

//Kelas untuk menangani interaksi data untuk tabel course
class Course {
    private $conn;

    //Konstruktur untuk membuat koneksi database
    public function __construct() {
        $db = new Database();
        $this->conn = $db->conn;
    }

    //Ambil semua data mata kuliah dengan join ke tabel lecturers (read)
    public function getAll() {
        $sql = "SELECT course.*, lecturers.name AS lecturer_name FROM course LEFT JOIN lecturers ON course.lecturer_id = lecturers.id";
        return $this->conn->query($sql);
    }

    //Ambil data mata kuliah berdasarkan id (read one)
    public function getById($id) {
        return $this->conn->query("SELECT * FROM course WHERE id = $id")->fetch_assoc();
    }

    //Buat data mata kuliah baru
    public function create($data) {
        $lecturer_id = $data['lecturer_id'];
        $title = $data['title'];
        $credit = $data['credit'];
        $semester = $data['semester'];

        $sql = "INSERT INTO course (lecturer_id, title, credit, semester) VALUES ('$lecturer_id', '$title', '$credit', '$semester')";
        return $this->conn->query($sql);
    }

    //Perbarui data mata kuliah
    public function update($id, $data) {
        $lecturer_id = $data['lecturer_id'];
        $title = $data['title'];
        $credit = $data['credit'];
        $semester = $data['semester'];

        $sql = "UPDATE course SET lecturer_id = '$lecturer_id', title = '$title', credit = '$credit', semester = '$semester' WHERE id = $id";
        return $this->conn->query($sql);
    }

    //Hapus data mata kuliah
    public function delete($id) {
        $sql = "DELETE FROM course WHERE id = $id";
        try {
            return $this->conn->query($sql);
        } catch (mysqli_sql_exception $e) {
            return false;
        }
    }
}