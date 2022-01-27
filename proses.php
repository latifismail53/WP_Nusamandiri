<?php
include "config.php";

if (isset($_POST['check'])) {
    $kd = $_POST['kodebarang'];
    $nm = $_POST['namabarang'];
    $jm = $_POST['jumlahbarang'];
    $hr = $_POST['hargabarang'];
    $katbar = $_POST['katbar'];
    $subtotal = $jm * $hr;

    if ($katbar == 'electronic') {
        $diskon = $subtotal * 10 / 100;
        $total = $subtotal - $diskon;
    } elseif ($katbar == 'buku') {
        $diskon = $subtotal * 20 / 100;
        $total = $subtotal - $diskon;
    } elseif ($katbar == 'Music') {
        $diskon = $subtotal * 50 / 100;
        $total = $subtotal - $diskon;
    }
    // $total = $_POST['kodebarang'];
    $sql = mysqli_multi_query($con, "INSERT INTO barang VALUES ('','$kd','$nm','$jm','$hr'); INSERT INTO transaksi VALUES ('','$jm','$subtotal','$diskon','$total');");
    if (!$sql) {
        echo "GAGAL INSERT DATA";
    } else {
        header('location: index.php');
    }
}