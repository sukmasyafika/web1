<?php
$connect = mysqli_connect('localhost', 'root', '', 'ss_shop');
if ($connect) {
  // echo "Koneksi Berhasil";
} else {
  echo "Koneksi Gagal";
}
