CREATE DATABASE IF NOT EXISTs buku
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE buku;

CREATE TABLE IF NOT EXISTS buku(
    id INT AUTO_INCREMENT PRIMARY KEY,
    isbn VARCHAR(20) NOT NULL UNIQUE,
    judul VARCHAR(150) NOT NULL,
    penulis VARCHAR(100) NOT NULL,
    penerbit VARCHAR(100) NOT NULL,
    tahun_terbit YEAR NOT NULL,
    kategori VARCHAR(50) NOT NULL,
    stok INT NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO buku
(isbn, judul, penulis, penerbit, tahun_terbit, kategori, stok)
VALUES
('9786024246945', 'Laut Bercerita', 'Leila S. Chudori', 'Kepustakaan Populer Gramedia (KPG)', 2017, 'Novel', 10),
('9786239726201', 'Janji', 'Tere Liye', 'Bentang Pustaka', 2021, 'Novel', 3),
('9789793062792', 'Bumi', 'Tere Liye', 'Gramedia Pustaka Utama', 2014, 'Fantasi', 8);