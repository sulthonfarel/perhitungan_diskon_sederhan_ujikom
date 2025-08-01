<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $harga = $_POST['harga'];
    $diskon = $_POST['diskon'];

    // Validasi input
    if ($diskon >= 100){
        $error = true;
    } else {
        $diskon_amount = $harga * ($diskon/100);
        $harga_after_diskon = $harga - $diskon_amount;
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
                    <div class="alert alert-danger"> Diskon Tidak Boleh Kosong</div>
                    <a href="index.php" class="btn bnt-secondary">Kembali</a>
                <?php else: ?>
                    <h2>Hasil Perhitungan Diskon</h2>
                    <p>Harga Awal: Rp. <?=  number_format($harga, 0, ',', '.')?></p>
                    <p>Diskon: <?= $diskon ?></p>
                    <p>Diskon Amount: Rp. <?=  number_format($diskon_amount, 0, ',', '.')?></p>
                    <p>Harga after diskon: Rp. <?=  number_format($harga_after_diskon, 0, ',', '.')?></p>
                <?php endif; ?>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
</html>