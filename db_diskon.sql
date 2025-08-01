CREATE DATABASE db_diskon;
USE db_diskon;

CREATE TABLE barang (
    id_barang INT AUTO_INCREMENT PRIMARY KEY,
    nama_barang VARCHAR(100),
    harga INT NOT NULL
);

CREATE TABLE transaksi (
    id_transaksi INT AUTO_INCREMENT PRIMARY KEY,
    id_barang INT,
    diskon INT,
    harga_setelah_diskon INT,
    tanggal DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_barang) REFERENCES barang(id_barang)
);