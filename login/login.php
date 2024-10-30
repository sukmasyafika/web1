<?php
include 'koneksi.php';

if (isset($_SESSION['username'])) {
  header("Location: ../index.php");
  exit();
}

if (isset($_POST['submit'])) {
  $username = mysqli_real_escape_string($connect, $_POST['username']);
  $password = hash('MD5', $_POST['password']);

  $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
  $result = mysqli_query($connect, $sql);

  if ($result->num_rows > 0) {
    session_start();
    $row = mysqli_fetch_assoc($result);
    $_SESSION['id'] = $row['id_user'];
    $_SESSION['nama'] = $row['nama'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['role'] = $row['role'];

    if ($row['role'] == 1) {
      echo "<script>alert('Berhasil Login Sebagai {$username}'); window.location.href = '../index.php';</script>";
    } elseif ($row['role'] == 2) {
      echo "<script>alert('Berhasil Login Sebagai {$username}'); window.location.href = '../admin/dashboard.php';</script>";
    }
    exit();
  } else {
    echo "<script>alert('Email atau password Anda salah. Silakan coba lagi!'); window.location.href = 'login.php';</script>";
  }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <!-- icons -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <!-- css login -->
  <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

  <div class="container">
    <div class="container-login">
      <img src="../assets/img/login/banner.png" alt="">
      <div class="input">
        <form action="" method="POST">
          <h1 class="heading-login">Login</h1>
          <div class="content">
            <i class='bx bxs-user'></i>
            <input type="username" placeholder="Username" name="username" required>
          </div>
          <div class="content">
            <i class='bx bxs-lock-alt'></i>
            <input type="password" placeholder="Password" name="password" required>
          </div>
          <button name="submit" type="submit" class="btn-login">Login</button>
          <div class="account">
            <p><a href="register.php">Don't have an account? Register</a></p>
          </div>
          <div class="account">
            <p><a href="../index.php">Kembali ke Beranda</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>


</body>

</html>