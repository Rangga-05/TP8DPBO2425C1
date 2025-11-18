<?php
require_once "models/Course.php";
require_once "models/Lecturer.php"; //Untuk dropdown

//Kelas untuk menerima request user dan mengelola alur data
class CourseController {
    private $course;
    private $lecturer;

    //Konstruktor untuk membuat objek model course dan lecturer
    public function __construct() {
        $this->course = new Course();
        $this->lecturer = new Lecturer();
    }

    //Tampilin daftar mata kuliah
    public function index() {
        $data = $this->course->getAll(); //JOIN di model
        include "views/templates/navbar.php";
        include "views/templates/course_list.php";
    }

    //Tampilin form tambah data
    public function create() {
        $data = null;
        $action = "store";
        $lecturers = $this->lecturer->getAll(); //Ambil data dosen
        include "views/templates/navbar.php";
        include "views/templates/course_form.php";
    }

    //Simpan data baru
    public function store() {
        $this->course->create($_POST);
        $_SESSION['success'] = "Data Departemen Berhasil Ditambahkan!";
        header("Location: index.php?page=course");
        exit;
    }

    //Tampilin form edit data
    public function edit() {
        $id = $_GET['id'];
        $data = $this->course->getById($id);
        $action = "update";
        $lecturers = $this->lecturer->getAll(); //Ambil data dosen
        include "views/templates/navbar.php";
        include "views/templates/course_form.php";
    }

    //Perbarui data
    public function update() {
        $id = $_POST['id'];
        $this->course->update($id, $_POST);
        $_SESSION['success'] = "Data Departemen Berhasil Diperbarui!";
        header("Location: index.php?page=course");
        exit;
    }

    //Hapus data
    public function delete() {
        $id = $_GET['id'];
        $result = $this->course->delete($id);

        if ($result === true) {
            $_SESSION['success'] = "Data Mata Kuliah Berhasil Dihapus";
        } else {
            $_SESSION['error'] = "Gagal Menghapus Data Mata Kuliah. Terjadi Kesalahan Pada Database";
        }

        header("Location: index.php?page=course");
        exit;
    }
}