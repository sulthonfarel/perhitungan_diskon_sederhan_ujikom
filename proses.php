<?php
include 'koneksi.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id_barang = $_POST['id_barang'];
    $diskon = $_POST['diskon'];

    // Ambil data barang dari database
    $query = mysqli_query($conn, "SELECT * FROM barang WHERE id_barang='$id_barang'");
    $barang = mysqli_fetch_assoc($query);
    if (!$barang) {
        $error = true;
    } else {
        $harga = $barang['harga'];
        // Validasi input
        if ($diskon >= 100){
            $error = true;
        } else {
            $diskon_amount = $harga * ($diskon/100);
            $harga_after_diskon = $harga - $diskon_amount;
            // Simpan ke tabel transaksi
            $insert = mysqli_query($conn, "INSERT INTO transaksi (id_barang, diskon, harga_setelah_diskon) VALUES ('$id_barang', '$diskon', '$harga_after_diskon')");
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
                    <div class="alert alert-danger"> Terjadi kesalahan atau diskon tidak valid.</div>
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                <?php else: ?>
                    <h2>Hasil Perhitungan Diskon</h2>
                    <p>Nama Barang: <?= htmlspecialchars($barang['nama_barang']) ?></p>
                    <p>Harga Awal: Rp. <?=  number_format($harga, 0, ',', '.')?></p>
                    <p>Diskon: <?= $diskon ?>%</p>
                    <p>Diskon Amount: Rp. <?=  number_format($diskon_amount, 0, ',', '.')?></p>
                    <p>Harga setelah diskon: Rp. <?=  number_format($harga_after_diskon, 0, ',', '.')?></p>
                    <div class="alert alert-success mt-3">Data transaksi berhasil disimpan!</div>
                <?php endif; ?>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
</html>