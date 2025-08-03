<?php
include 'koneksi.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_transaksi='$id'");
}
header('Location: proses.php');
exit;
?>
