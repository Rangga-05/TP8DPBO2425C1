-- Buat database
CREATE DATABASE IF NOT EXISTS db_lecturers;
USE db_lecturers;

-- Tabel lecturers
CREATE TABLE lecturers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    nidn VARCHAR(20) NOT NULL,
    phone VARCHAR(20),
    join_date DATE
);

-- Data dummy
INSERT INTO lecturers (name, nidn, phone, join_date) VALUES
('Budi Santoso', '112233', '081234567890', '2020-01-15'),
('Siti Aminah', '223344', '082345678901', '2021-03-10'),
('Dewi Lestari', '334455', '083456789012', '2019-07-23'),
('Rangga Putra', '445566', '084567890123', '2022-02-01');

-- Tabel department
CREATE TABLE department (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    building VARCHAR(50) NOT NULL
);

-- Data dummy
INSERT INTO department (name, building) VALUES
('Informatics', 'Building A'),
('Information Systems', 'Building B'),
('Computer Engineering', 'Building C');

-- Tabel course
CREATE TABLE course (
    id INT AUTO_INCREMENT PRIMARY KEY,
    lecturer_id INT NOT NULL,
    title VARCHAR(100) NOT NULL,
    credit INT NOT NULL,
    semester INT NOT NULL,

    FOREIGN KEY (lecturer_id) REFERENCES lecturers(id)
);

-- Data dummy
INSERT INTO course (lecturer_id, title, credit, semester) VALUES
(1, 'Web Programming', 3, 5),
(1, 'Database Systems', 3, 4),
(2, 'Software Engineering', 4, 6),
(3, 'Computer Networks', 3, 3),
(4, 'Human-Computer Interaction', 2, 2);