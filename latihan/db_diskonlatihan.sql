CREATE DATABASE db_diskonlatihan;
USE db_diskonlatihan;

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

insert into barang (id_barang, nama_barang, harga) values
(1, 'Pensil', 3000),
(2, 'Buku', 8000),
(3, 'Penghapus', 2000);