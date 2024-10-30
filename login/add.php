
<?php

require('koneksi.php');


$nama = $_POST['nama'];
$username = $_POST['username'];
$email = $_POST['email'];
$role = 1;
$password = hash('MD5', $_POST['password']);

$insert = mysqli_query($connect, "INSERT INTO user SET nama='$nama', username='$username', email='$email', password='$password', role='$role' ");

if ($insert)
  echo "<script>alert('Berhasil mmendaftarkan dengan username : {$username}'); window.location.href = 'login.php';</script>";
else
  echo "<script>alert('Gagal mendaftar Silahkan Coba lagi!'); window.location.href = 'register.php';</script>";
?>