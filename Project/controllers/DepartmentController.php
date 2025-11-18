<?php
require_once "models/Department.php";

//Kelas untuk menerima request user dan mengelola alur data
class DepartmentController {
    private $department;

    //Konstruktor untuk membuat objek model department (read list)
    public function __construct() {
        $this->department = new Department();
    }

    //Tampilin daftar semua department
    public function index() {
        $data = $this->department->getAll();
        include "views/templates/navbar.php";
        include "views/templates/department_list.php";
    }

    //Tampilin form tambah data
    public function create() {
        $data = null;
        $action = "store"; //Aksi untuk form submit
        include "views/templates/navbar.php";
        include "views/templates/department_form.php";
    }

    //Simpan data baru
    public function store() {
        $this->department->create($_POST);
        $_SESSION['success'] = "Data Departemen Berhasil Ditambahkan!";
        header("Location: index.php?page=department");
        exit;
    }

    //Tampilin form edit data
    public function edit() {
        $id = $_GET['id'];
        $data = $this->department->getById($id);
        $action = "update"; //Aksi untuk form submit
        include "views/templates/navbar.php";
        include "views/templates/department_form.php";
    }

    //Perbarui data
    public function update() {
        $id = $_POST['id'];
        $this->department->update($id, $_POST);
        $_SESSION['success'] = "Data Departemen Berhasil Diperbarui!";
        header("Location: index.php?page=department");
        exit;
    }

    //Hapus data
    public function delete() {
        $id = $_GET['id'];
        $result = $this->department->delete($id);

        if ($result === true) {
            $_SESSION['success'] = "Data Departemen Berhasil Dihapus";
        } else {
            $_SESSION['error'] = "Gagal Menghapus Data Departemen. Terjadi Kesalahan Pada Database";
        }

        header("Location: index.php?page=department");
        exit;
    }
}