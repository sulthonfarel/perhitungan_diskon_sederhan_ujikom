<?php
include 'koneksi.php';
$barang = mysqli_query($koneksi, "SELECT * FROM barang");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2>Aplikasi diskon sederhana</h2>
                <form action="proses.php" method="post">
                    <div class="form-group">
                    <p>Pilih barang: </p>
                    <select name="id_barang" id="id_barang" class="form-control">
                    <option value="">--Pilih Barang--</option>
                    <?php while($row = mysqli_fetch_assoc($barang)): ?>
                        <option value="<?= $row['id_barang'] ?>">
                        <?= $row['nama_barang'] ?> 
                        (Rp. <?= number_format($row['harga'], 0, '.', ',')?>)
                        </option>
                        <?php endwhile; ?>
                    </select>
                    <p>Diskon: </p>
                    <input type="number" class="form-control" id="diskon" name="diskon" required>
                    <input type="submit" name="" id="" value="Hitung Diskon" class="btn btn-primary">
                </div>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>        
    </div>
</body>
</html>