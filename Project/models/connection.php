<?php
//Kelas database untuk membuat koneksi ke MySQL
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "db_lecturers";

    public $conn;
    
    //Konstruktor untuk otomatis menjalankan koneksi saat objek dibuat
    public function __construct() {
        //Membuat koneksi baru
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);

        //Memeriksa error koneksi
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
}