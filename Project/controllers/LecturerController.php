<?php
require_once "models/Lecturer.php";

//Kelas untuk menerima request user dan mengelola alur data
class LecturerController {
    private $lecturer;

    //Konstruktor untuk membuat objek model lecturer
    public function __construct() {
        $this->lecturer = new Lecturer();
    }

    //List data menampilkan daftar semua dosen (read list)
    public function index() {
        $lecturers = $this->lecturer->getAll();
        include "views/templates/lecturer_list.php";
    }

    //Tampil form create
    public function create() {
        $data = null; //biar form bisa dipakai untuk create
        $action = "store";
        include "views/templates/lecturer_form.php";
    }

    //Proses input data
    public function store() {
        $this->lecturer->create($_POST);
        $_SESSION['success'] = "Data Dosen Berhasil Ditambahkan!";
        header("Location: index.php?page=lecturer");
        exit;
    }

    //Tampil form edit
    public function edit() {
        $id = $_GET['id'];
        $data = $this->lecturer->getById($id);
        $action = "update";
        include "views/templates/lecturer_form.php";
    }

    //Proses update
    public function update() {
        $id = $_POST['id'];
        $this->lecturer->update($id, $_POST);
        $_SESSION['success'] = "Data Dosen Berhasil Diperbarui!";
        header("Location: index.php?page=lecturer");
        exit;
    }

    //Hapus data
    public function delete() {
        $id = $_GET['id'];
        //Panggil method delete di model
        $result = $this->lecturer->delete($id);

        //Cek hasil dan pesan
        if ($result === 1451) {
            //Pesan jika ada mata kuliah yang terkait
            $_SESSION['error'] = "Gagal Menghapus Dosen! Dosen Terikat Dengan Mata Kuliah";
        } elseif ($result === true) {
            //Pesan jika sukses
            $_SESSION['success'] = "Data Dosen Berhasil Dihapus";
        } else {
            //Pesan jika ada error database lain
            $_SESSION['error'] = "Gagal Menghapus Data. Terjadai Kesalahan Pada Database";
        }

        header("Location: index.php?page=lecturer");
        exit;
    }
}