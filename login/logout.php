<?php
session_start();

if ($_SESSION['role'] == 2) {
  echo "<script>alert('Logout Berhasil'); window.location.href = 'login.php';</script>";
} elseif ($_SESSION['role'] == 1) {
  echo "<script>alert('Logout Berhasil'); window.location.href = '../index.php';</script>";
}

session_unset();
session_destroy();
exit();
