# 🏛️ TP8DPBO2425C1
TP 8 DPBO Model-View-Controller (MVC) Membuat Aplikasi manajemen data dosen, departemen, dan mata kuliah yang dibangun menggunakan pola arsitektur Model-View-Controller (MVC) dan styling modern dengan Bootstrap.

# Janji
Saya Muhammad Rangga Nur Praditha dengan Nim 2400297 mengerjakan Tugas Praktikum 8 dalam mata kuliah Desain Pemrograman Berorientasi Objek untuk keberkahan-Nya maka saya tidak akan melakukan kecurangan seperti yang telah di spesifikasikan. Aamiin

# Deskripsi
Aplikasi ini bertujuan untuk mengelola data master di sebuah lingkungan akademik. Setiap fungsionalitas CRUD (Create, Read, Update, Delete) diimplementasikan secara terpisah dalam struktur MVC untuk menjaga pemisahan tanggung jawab (Separation of Concerns).

## Fitur Utama:
- **CRUD Penuh:** Dosen, Departemen, dan Mata Kuliah.
- **Database Robust:** Menggunakan **mysqli** dengan relasi Foreign Key (FK) pada tabel `lecturers` dan `course`.
- **Error Handling:** Menggunakan sistem pesan berbasis **Session** dan **`try-catch`** untuk menangani *fatal error* database (Foreign Key Constraint Violation) secara *graceful*.
- **Desain Modern:** Menggunakan tema kustom **Maroon** dan layout responsif dengan Bootstrap.

# Struktur Database
<img width="984" height="743" alt="GUI" src="Dokumentasi/Diagram TP8.png" />

Proyek ini menggunakan database **`db_lecturers`** yang terdiri dari tiga tabel utama:
1. **Tabel `lecturers`** menyimpan data dosen (ID, Nama, NIDN) dan menggunakan kolom **`id`** sebagai **Kunci Utama** (Primary Key), bertindak sebagai tabel induk.
2. **Tabel `department`** menyimpan data departemen, yang juga menggunakan id sebagai Kunci Utama.
3. **Tabel `course`** menyimpan data mata kuliah. Tabel ini menggunakan id sebagai Kunci Utama dan memiliki satu Kunci Asing (Foreign Key) yaitu lecturer_id yang terhubung ke kolom id pada tabel lecturers.

# Struktur Desain Program
Aplikasi ini menggunakan pola arsitektur **Model-View-Controller** (`MVC`) yang membagi tanggung jawab menjadi tiga lapisan fungsional:
1. **Controllers (`Folder controllers/`)**
- **Tujuan:** Menerima request dari `index.php` dan mengelola alur program.
- **Isi:** File seperti `LecturerController.php`. Setiap Controller bertanggung jawab memanggil Model dan menentukan View mana yang akan ditampilkan.
2. **Models (`Folder models/`)**
- **Tujuan:** Bertanggung jawab penuh atas interaksi dengan database (CRUD) dan logika data.
- **Isi:** File seperti `Lecturer.php`, `Department.php`, `Course.php` (untuk logika data), dan `connection.php` (untuk koneksi database).
3. **Views / Templates (`Folder views/templates/`)**
- **Tujuan:** Menyediakan user interface (HTML/CSS) tanpa logika bisnis.
- **Isi:** File `header.php` dan `footer.php` berfungsi sebagai shell HTML lengkap yang menangani Sticky Footer dan link aset. Sementara file seperti `lecturer_list.php` dan `lecturer_form.php` berisi konten spesifik (tabel atau formulir).

# Penjelasan Alur Program
Alur program mengikuti siklus MVC (Request -> Controller -> Model -> View):
1.  **Request Masuk:** Semua permintaan (misalnya `index.php?page=lecturer&action=edit`) diterima oleh **`index.php`**.
2.  **Routing:** `index.php` membaca parameter `page` dan menginisialisasi **Controller** yang sesuai, dan memanggil **Action** (`edit`, `store`, `delete`).
3.  **Aksi Delete (Khusus):** Controller memanggil **Model** untuk menghapus data. Jika terjadi *Foreign Key error*, Model akan menggunakan **`try-catch`** untuk menangkap *exception* dan mengembalikan kode **`1451`** (bukan *crash*).
4.  **Pesan Session:** Controller memeriksa hasil aksi. Jika `1451` atau `false` (gagal), pesan `$_SESSION['error']` diatur. Jika `true` (sukses), `$_SESSION['success']` diatur.
5.  **Redirect & Tampilan:** Setelah memproses data, Controller mengarahkan (*redirect*) kembali ke halaman list. Halaman *list* kemudian menampilkan pesan *alert* yang tersimpan di `$_SESSION` sebelum menghapusnya.

# Cara Menjalankan
**Alur Eksekusi Program**<br>
Setelah server dinyalakan, alur eksekusi adalah sebagai berikut:
1. Akses URL `http://localhost/TP8/index.php` memicu skrip `index.php`.
2. `index.php` mendeteksi tidak adanya parameter `page` dan memuat `LecturerController` dengan action `index` (default).
3. `LecturerController->index()` mengambil data dari Model dan memuat `lecturer_list.php`.
4. `lecturer_list.php` menyertakan `header.php` (membuat tag `<body>` dan memuat CSS) lalu menyertakan `navbar.php` (menampilkan menu), diikuti konten tabel, dan diakhiri dengan `footer.php` (menutup tag dan memuat JS).

# Dokumentasi
https://github.com/user-attachments/assets/9cce095b-a41e-41a0-a9ba-627f46b34794
