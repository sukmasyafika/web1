<?php

include('koneksi.php');

//karena form menggunakan method post kita gunakan $_POST
$username = $_POST['username']; //index didalamnya sesuai dengan input name yang ada di form
$email = $_POST['email'];
$password = hash('MD5', $_POST['password']);

$insert = mysqli_query($conn, "INSERT INTO user SET username='$username', email='$email', password='$password' ");

if ($insert)
    header('Location: login.php');
else
    echo 'Input data gagal'; //jika gagal akan keluar pesan tersebut