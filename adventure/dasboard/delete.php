<?php
include('../login/koneksi.php');

if (isset($_GET['id_produk'])) {
    $id_produk = $_GET['id_produk'];

    $sql = "DELETE FROM cart WHERE id_produk = '$id_produk'";
    if (mysqli_query($conn, $sql)) {

        header("Location: travel.php");
        exit();
    } else {
        echo "Kesalahan saat menghapus: " . mysqli_error($conn);
    }
} else {
    echo "id_produk Tidak Ditemukan";
}
