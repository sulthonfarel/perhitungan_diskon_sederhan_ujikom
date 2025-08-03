<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'koneksi.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $diskon = $_POST['diskon'];

    // Validasi input
    if ($diskon >= 100 || $harga <= 0 || empty($nama_barang)){
        $error = true; // Klw diskon 100% atau lebih, atau harga  0, atau nama barang kosong bakal error ke sini
    } else {
        // Klw input valid, lanjutkan, masuk ke sini
        // Insert barang baru
        $insert_barang = mysqli_query($koneksi, "INSERT INTO barang (nama_barang, harga) VALUES ('$nama_barang', '$harga')");
        if ($insert_barang) {
            $id_barang = mysqli_insert_id($koneksi);
            $diskon_amount = $harga * ($diskon/100);
            $harga_after_diskon = $harga - $diskon_amount;
            // Simpan ke tabel transaksi
            $insert_transaksi = mysqli_query($koneksi, "INSERT INTO transaksi (id_barang, diskon, nama_barang, harga_setelah_diskon) VALUES ('$id_barang','$diskon', '$id_barang', '$harga_after_diskon')");
        } else {
            $error = true;
        }
    }
} else {
    header('location:index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Diskon</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger"> Terjadi kesalahan atau data tidak valid.</div>
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                <?php else: ?>
                    <h2>Hasil Perhitungan Diskon</h2>
                    <p>Nama Barang: <?= $nama_barang ?></p>
                    <p>Harga Awal: Rp. <?=  number_format($harga, 0, ',', '.')?></p>
                    <p>Diskon: <?= $diskon ?>%</p>
                    <p>Diskon Amount: Rp. <?=  number_format($diskon_amount, 0, ',', '.')?></p>
                    <p>Harga setelah diskon: Rp. <?=  number_format($harga_after_diskon, 0, ',', '.')?></p>
                    <div class="alert alert-success mt-3">Data barang dan transaksi berhasil disimpan!</div>
                    <input type="button" class="btn btn-primary" value="Kembali" onclick="window.location.href='index.php'">
                    <input type="button" class="btn btn-danger" value="hapus transaksi" onclick="window.location.href='hapus_transaksi.php?id=<?= $id_barang ?>'">
                <?php endif; ?>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
</html>